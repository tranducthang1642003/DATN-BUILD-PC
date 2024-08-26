<?php

namespace Modules\Home\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Home\Repositories\HomeRepositoryInterface;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductImage;
use Modules\Brand\Entities\Brand;
use Illuminate\Http\Request;
use Modules\Category\Entities\Category;
use Modules\Blog\Entities\Blogs;
use Modules\Like\Entities\wishlists;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Order\Entities\Orders;
use Modules\Settings\Entities\Menu;
use Modules\Review\Entities\Review; // Import Review


class HomeController extends Controller
{
    protected $homeRepository;

    public function __construct(HomeRepositoryInterface $homeRepository)
    {
        $this->homeRepository = $homeRepository;
    }


    public function index()
    {
        $title ='Trang chủ';
        $categories = $this->homeRepository->getAllProducts();
        $featuredCategories = $this->homeRepository->getFeaturedCategories();
        $saleproduct = $this->homeRepository->getSaleProducts();
        $bestsellingProducts = $this->homeRepository->getMostPurchasedProducts();
        $menuItems = Menu::all();
        $blogs = Blogs::latest()->take(4)->get();
        $likeItem = wishlists::where('user_id', auth()->id())->get();
        // Lấy tất cả bình luận cho các sản phẩm
        $productIds = $bestsellingProducts->pluck('id'); // Lấy danh sách ID sản phẩm
        $reviews = Review::whereIn('product_id', $productIds)->with('user')->get(); // Eager load user

        return view('public.home.layout', compact('categories', 'featuredCategories', 'saleproduct', 'bestsellingProducts', 'menuItems', 'blogs', 'reviews', 'likeItem','title'));
    }
    public function showByCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = Product::where('category_id', $category->id)->get();

        return view('public.home.layout', compact('category', 'products'));
    }

    public function showCategory($slug, Request $request)
    {
        $title ='Danh mục ';

        $category = $this->homeRepository->getCategoryBySlug($slug);
        $products = $this->homeRepository->getProductByProduct($slug);
        $menuItems = Menu::all();
        $likeItem = wishlists::where('user_id', auth()->id())->get();
        $products = $this->applyFilters($products, $request);
        $products = $this->applySorting($products, $request);

        if ($request->has('brand')) {
            $products = $products->where('brand_id', $request->brand);
        }

        $topProducts = $category->products()
            ->where('featured', true)
            ->orderBy('view', 'desc')
            ->take(10)
            ->get();
        $topProducts = $this->loadPrimaryImages($topProducts);

        $brands = Brand::whereIn('id', $products->pluck('brand_id'))->get();
        $products->load('reviews');
        $topProducts->load('reviews');

        return view('public.product.category-product', compact('category', 'brands', 'products', 'topProducts', 'request', 'menuItems', 'likeItem','title'));
    }

    public function show($slug)
    {
        $title = 'Sản phẩm';
        $user = Auth::User();
        $likeItem = wishlists::where('user_id', auth()->id())->get();
        $product = Product::where('slug', $slug)->firstOrFail();
        $primary_image = ProductImage::where('product_id', $product->id)
            ->where('is_primary', 1)
            ->first();
        $secondary_images = ProductImage::where('product_id', $product->id)
            ->where('is_primary', 0)
            ->get();
        $product->primary_image_path = $primary_image ? $primary_image->image_path : null;
        $product->secondary_images = $secondary_images;
        $menuItems = Menu::all();
        return view('public.product.detail-product', compact('product', 'menuItems', 'likeItem','title'));
    }
    public function productShow(Request $request)
    {
        $title ='Sản phẩm';

        $user = Auth::User();
        $likeItem = wishlists::where('user_id', auth()->id())->get();
        $categories = Category::all();
        $productsQuery = Product::query();
        $menuItems = Menu::all();

        $productsQuery = $this->applyFilters($productsQuery, $request);

        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'price_asc':
                    $productsQuery->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $productsQuery->orderBy('price', 'desc');
                    break;
                case 'view':
                    $productsQuery->orderBy('view', 'desc');
                    break;
                case 'alphabetical':
                    $productsQuery->orderBy('product_name', 'asc');
                    break;
                default:
                    $productsQuery->orderBy('created_at', 'desc');
            }
        } else {
            $productsQuery->orderBy('created_at', 'desc');
        }

        // Phân trang
        $products = $productsQuery->paginate(20);

        $minPrice = Product::min('price');
        $maxPrice = Product::max('price');
        $brands = Brand::all();
        $blogs = Blogs::latest()->take(4)->get();
        $products->load('reviews');
        $products = $this->loadPrimaryImages($products);
        $featuredBlogs = Blogs::where('featured', 1)->get();
        if ($request->ajax()) {
            return response()->json([
                'products' => view('public.product.product-list', compact('products', 'likeItem'))->render(),
                'pagination' => (string) $products->links()
            ]);
        }
        return view('public.product.products', compact('categories', 'brands', 'products', 'minPrice', 'maxPrice', 'featuredBlogs', 'menuItems', 'likeItem','title'));
    }
    public function showSearch(Request $request)
    {
        $title ='Tìm kiếm';
        $user = Auth::User();
        $likeItem = wishlists::where('user_id', auth()->id())->get();
        $query = $request->input('query');

        $products = Product::where(function ($q) use ($query) {
            $q->where('product_name', 'like', '%' . $query . '%')
                ->orWhereHas('brand', function ($brandQuery) use ($query) {
                    $brandQuery->where('brand_name', 'like', '%' . $query . '%');
                });
        });

        if ($request->has('brand')) {
            $products = $products->where('brand_id', $request->brand);
        }

        $products = $products->paginate(12);
        $products = $this->applyFilters($products, $request);
        $products = $this->applySorting($products, $request);
        $products = $this->loadPrimaryImages($products);
        $brands = Brand::whereIn('id', $products->pluck('brand_id'))->get();

        $products->load('reviews');
        return view('public.product.search-product', compact('products', 'query', 'brands', 'request', 'likeItem','title'));
    }
    public function suggestions(Request $request)
    {
        $query = $request->input('query');
        $suggestions = Product::where('product_name', 'LIKE', "%{$query}%")->limit(10)->get();
        foreach ($suggestions as $product) {
            $product->primary_image_path = $product->primaryImage()->first()->image_path ?? 'default-image.jpg';
        }
        return response()->json($suggestions);
    }
    private function applyFilters($products, $request)
    {
        if ($request->filled('min_price')) {
            $products = $products->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $products = $products->where('price', '<=', $request->max_price);
        }

        if ($request->filled('brands')) {
            $brands = $request->input('brands');
            $products = $products->whereIn('brand_id', $brands);
        }

        return $products;
    }
    private function applySorting($products, $request)
    {
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'price_asc':
                    $products = $products->sortBy('price');
                    break;
                case 'price_desc':
                    $products = $products->sortByDesc('price');
                    break;
                case 'view':
                    $products = $products->sortByDesc('view');
                    break;
                case 'alphabetical':
                    $products = $products->sortBy('product_name');
                    break;
                default:
                    $products = $products->sortByDesc('created_at');
            }
        } else {
            $products = $products->sortByDesc('created_at');
        }

        return $products;
    }

    private function loadPrimaryImages($products)
    {
        foreach ($products as $product) {
            $primary_image = ProductImage::where('product_id', $product->id)
                ->where('is_primary', 1)
                ->first();
            $product->primary_image_path = $primary_image ? $primary_image->image_path : null;
        }

        return $products;
    }
    public function productShow_sale(Request $request)
    {
        $title ='Sản phẩm';
        $user = Auth::user();
        $likeItem = wishlists::where('user_id', auth()->id())->get();
        $categories = Category::all();
        $menuItems = Menu::all();
        $productsQuery = Product::where('featured', true);
        $productsQuery = $this->applyFilters($productsQuery, $request);
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'hot':
                    $sales = DB::table('order_items')
                        ->select('product_id', DB::raw('SUM(quantity) as total_quantity'))
                        ->groupBy('product_id')
                        ->orderBy('total_quantity', 'desc')
                        ->get();
                    $productIds = $sales->pluck('product_id');
                    $productsQuery->whereIn('id', $productIds);
                    $productsQuery->orderByRaw('FIELD(id, ' . implode(',', $productIds->toArray()) . ')');
                    break;
                case 'price_asc':
                    $productsQuery->orderBy('price', 'asc');
                    break;

                case 'price_desc':
                    $productsQuery->orderBy('price', 'desc');
                    break;
                case 'view':
                    $productsQuery->orderBy('view', 'desc');
                    break;
                case 'alphabetical':
                    $productsQuery->orderBy('product_name', 'asc');
                    break;
                case 'sale':
                    $productsQuery->where('featured', true);
                    break;
                default:
                    $productsQuery->orderBy('created_at', 'desc');
            }
        } else {
            $productsQuery->orderBy('created_at', 'desc');
        }
        $products = $productsQuery->paginate(20);
        $minPrice = Product::min('price');
        $maxPrice = Product::max('price');
        $brands = Brand::all();
        $blogs = Blogs::latest()->take(4)->get();
        $featuredBlogs = Blogs::where('featured', 1)->get();
        $products->load('reviews');
        $products = $this->loadPrimaryImages($products);
        if ($request->ajax()) {
            return response()->json([
                'products' => view('public.product.product-list', compact('products', 'likeItem'))->render(),
                'pagination' => (string) $products->links()
            ]);
        }
        return view('public.product.products', compact('categories', 'brands', 'products','title', 'minPrice', 'maxPrice', 'featuredBlogs', 'menuItems', 'likeItem' ));
    }
}

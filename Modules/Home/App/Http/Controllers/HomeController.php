<?php

namespace Modules\Home\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Category\Entities\Category;
use Modules\Home\Repositories\HomeRepositoryInterface;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductImage;

class HomeController extends Controller
{
    protected $homeRepository;

    public function __construct(HomeRepositoryInterface $homeRepository)
    {
        $this->homeRepository = $homeRepository;
    }

    public function index()
    {
        $categories = $this->homeRepository->getAllProducts();
        $featuredCategories = $this->homeRepository->getFeaturedCategories();
        // $saleproduct=$this->homeRepository->getSaleProducts();
        return view('public.home.layout', compact('categories', 'featuredCategories'));
    }

    public function showCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = $category->products()->get();
        foreach ($products as $product) {
            $primary_image = ProductImage::where('product_id', $product->id)
                ->where('is_primary', 1)
                ->first();
            $product->primary_image_path = $primary_image ? $primary_image->image_path : null;
        }
        $categories = $this->homeRepository->getAllProducts();
        return view('public.product.product', compact('category', 'products'));
    }


    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $primary_image = ProductImage::where('product_id', $product->id)
            ->where('is_primary', 1)
            ->first();
        $secondary_images = ProductImage::where('product_id', $product->id)
            ->where('is_primary', 0)
            ->get();
        $product->primary_image_path = $primary_image ? $primary_image->image_path : null;
        $product->secondary_images = $secondary_images;
        return view('public.product.detail-product', compact('product'));
    }
}

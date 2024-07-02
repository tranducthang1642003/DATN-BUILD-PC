<?php

namespace Modules\Home\App\Http\Controllers;

use App\Http\Controllers\Controller;
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
        $saleproduct = $this->homeRepository->getSaleProducts();
        $bestsellingProducts = $this->homeRepository->getBestsellingProducts();

        return view('public.home.layout', compact('categories', 'featuredCategories', 'saleproduct', 'bestsellingProducts'));
    }

    public function showCategory($slug)
    {

        $category = $this->homeRepository->getCategoryBySlug($slug);
        $products = $this->homeRepository->getProductByProduct($slug);

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

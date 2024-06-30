<?php

namespace Modules\Home\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Category\Entities\Category;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductImage;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();

        foreach ($products as $product) {
            $primary_image = ProductImage::where('product_id', $product->id)
                ->where('is_primary', 1)
                ->first();
            $product->primary_image_path = $primary_image ? $primary_image->image_path : null;
        }

        return view('public.home.layout', compact('categories', 'products'));
    }

    public function showCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        return view('public.product.product', compact('category'));
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

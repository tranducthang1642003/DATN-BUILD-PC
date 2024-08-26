<?php

namespace Modules\Home\Repositories;

use Modules\Category\Entities\Category;
use Modules\Home\Repositories\HomeRepositoryInterface;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductImage;

class HomeRepository implements HomeRepositoryInterface
{
    public function getAllProducts()
    {
        $title = 'Admin - Dashboard';
        $categories = Category::where('is_featured_home', true)
            ->with('products')
            ->get();

        foreach ($categories as $category) {
            foreach ($category->products as $product) {
                $primary_image = ProductImage::where('product_id', $product->id)
                    ->where('is_primary', 1)
                    ->first();
                $product->primary_image_path = $primary_image ? $primary_image->image_path : null;
            }
        }
        return $categories;
    }

    public function getFeaturedCategories()
    {
        return Category::where('featured', true)
            ->with('products')
            ->get();
    }

    public function getSaleProducts()
    {
        $products = Product::where('sale', true)->get();
        foreach ($products as $product) {
            $primary_image = ProductImage::where('product_id', $product->id)
                ->where('is_primary', 1)
                ->first();
            $product->primary_image_path = $primary_image ? $primary_image->image_path : null;
        }
        return $products;
    }

    public function getMostPurchasedProducts($limit = 5)
    {
        $products = Product::select('products.*')
            ->with(['images' => function($query) {
                $query->where('is_primary', 1);
            }])
            ->leftJoin('order_items', 'products.id', '=', 'order_items.product_id')
            ->selectRaw('products.id, products.product_name, products.price, COALESCE(SUM(order_items.quantity), 0) as total_quantity_sold')
            ->groupBy('products.id', 'products.product_name', 'products.price')
            ->orderBy('total_quantity_sold', 'desc')
            ->limit($limit)
            ->get();
        
        foreach ($products as $product) {
            $product->primary_image_path = $product->images->first()->image_path ?? null;
        }
        
        return $products;
    }
    
    

    public function getProductByProduct($slug)
    {
        $category = Category::where('slug', $slug)->where('featured', true)->firstOrFail();
        $products = $category->products;
        foreach ($products as $product) {
            $primary_image = ProductImage::where('product_id', $product->id)
                ->where('is_primary', 1)
                ->first();
            $product->primary_image_path = $primary_image ? $primary_image->image_path : null;
        }
        return $products;
    }

    public function getCategoryBySlug($slug)
    {
        return Category::where('slug', $slug)->firstOrFail();
    }

    public function getProductById($id)
    {
        return Product::find($id);
    }

    public function images()
    {
        foreach ($products as $product) {
            $primary_image = ProductImage::where('product_id', $product->id)
                ->where('is_primary', 1)
                ->first();
            $product->primary_image_path = $primary_image ? $primary_image->image_path : null;
        }
    }

    public function createProduct(array $data)
    {
        return Product::create($data);
    }

    public function updateProduct($id, array $data)
    {
        $product = Product::find($id);
        if ($product) {
            $product->update($data);
            return $product;
        }
        return null;
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if ($product) {
            return $product->delete();
        }
        return false;
    }
}

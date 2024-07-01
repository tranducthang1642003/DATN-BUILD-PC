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


    // public function getSaleProducts()
    // {
    //     return product::where('sale', true)->firstOrFail();
            
    // }


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

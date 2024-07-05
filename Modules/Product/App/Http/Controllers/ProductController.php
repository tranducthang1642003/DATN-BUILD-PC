<?php

namespace Modules\Product\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Product\Entities\Product;
use Modules\Review\Entities\Review;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Implement logic to fetch and display a list of products
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Implement logic to store a new product
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $product = Product::with(['images' => function ($query) {
            $query->orderBy('is_primary', 'desc');
        }])->where('slug', $slug)->firstOrFail();
    
        $primary_image = $product->images->firstWhere('is_primary', 1);
        $secondary_images = $product->images->where('is_primary', 0);
        $product->primary_image_path = $primary_image ? $primary_image->image_path : null;
        $product->secondary_images = $secondary_images ;
     
        $recentlyViewed = session()->get('recently_viewed', []);
    
        if (!in_array($product->id, $recentlyViewed)) {
            if (count($recentlyViewed) >= 5) {
                array_shift($recentlyViewed);
            }
            $recentlyViewed[] = $product->id;
            session()->put('recently_viewed', $recentlyViewed);
        }
    
        $recentlyViewedProducts = Product::with(['images' => function ($query) {
            $query->orderBy('is_primary', 'desc');
        }])
            ->whereIn('id', $recentlyViewed)
            ->get();
    
        // Add primary image path to each recently viewed product
        foreach ($recentlyViewedProducts as $recentlyViewedProduct) {
            $primaryImage = $recentlyViewedProduct->images->firstWhere('is_primary', 1);
            $recentlyViewedProduct->primary_image_path = $primaryImage ? $primaryImage->image_path : null;
        }
    
        $similarProducts = Product::with(['images' => function ($query) {
            $query->orderBy('is_primary', 'desc');
        }])
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(5)
            ->get();
    
        foreach ($similarProducts as $similarProduct) {
            $primaryImage = $similarProduct->images->firstWhere('is_primary', 1);
            $similarProduct->primary_image_path = $primaryImage ? $primaryImage->image_path : null;
        }
    
        $reviews = Review::where('product_id', $product->id)->orderBy('created_at', 'desc')->get();
    
        return view('public.product.detail-product', compact('product', 'recentlyViewedProducts', 'similarProducts', 'reviews','secondary_images'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('product::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        // Implement logic to update an existing product
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Implement logic to delete a product
    }
}

<?php

namespace Modules\Product\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductImage;

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

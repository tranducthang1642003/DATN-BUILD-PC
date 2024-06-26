<?php

namespace Modules\Home\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Category\Entities\Category;
use Modules\Product\Entities\Product;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();  
        $products = Product::all();  // Retrieve all products from the database
    
        // Modify $products to include necessary attributes
        $products = $products->map(function ($product) {
            return [
                'img' => $product->image_path, // Assuming this is the path to product image
                'title' => $product->product_name,
                'old_price' => $product->old_price,
                'discount' => $product->discount,
                'new_price' => $product->new_price,
                'vocher' => $product->vocher,
            ];
        });
    
        return view('public.home.layout', compact('categories', 'products'));
    }
    
    
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('home::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('home::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}

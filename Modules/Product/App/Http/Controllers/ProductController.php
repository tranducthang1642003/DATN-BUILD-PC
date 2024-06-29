<?php

namespace Modules\Product\App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topFeaturedProducts = DB::table('products')->where('featured', true)->orderBy('updated_at', 'desc')->take(10)->get();
        $product = DB::table('products')->limit(20)->orderBy('updated_at', 'desc')->paginate(10);
        $product_images = DB::table('product_images')->get();
        return view('public.product.product', ['product' => $product, 'product_images' => $product_images, 'topFeaturedProducts' => $topFeaturedProducts]);
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
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('product::show');
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

<?php

namespace Modules\DetailProduct\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class DetailProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('public.product.detail-product');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('detailproduct::create');
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
        $product = DB::table('products')->get();
        $products = DB::table('products')->where('id', $id)->first();
        return view('public.product.detail-product', ['id' => $id, 'products' => $products, 'product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('detailproduct::edit');
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

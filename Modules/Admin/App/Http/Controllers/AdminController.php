<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function product()
    {
        return view('admin.product.product');
    }

    public function add_product()
    {
        return view('admin.product.add');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('admin.product.product');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin::product.add');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}

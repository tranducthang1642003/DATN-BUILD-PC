<?php

namespace Modules\About\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Settings\Entities\Menu;
class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Giới thiệu ";
        $menuItems = Menu::all();
        return view('public.about.index' ,compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('about::create');
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
        return view('about::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('about::edit');
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

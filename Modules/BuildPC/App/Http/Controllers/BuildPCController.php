<?php

namespace Modules\BuildPC\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Category\Entities\Category;
use Modules\BuildPC\Repositories\BuildPCRepositoryInterface;


class BuildPCController extends Controller
{

    protected $BuildPCRepository;

    public function __construct(BuildPCRepositoryInterface $BuildPCRepository)
    {
        $this->BuildPCRepository = $BuildPCRepository;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $Productandcategory = $this ->BuildPCRepository->getFeaturedCategories();
        return view('public.buildPC.index',compact('Productandcategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buildpc::create');
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
        return view('buildpc::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('buildpc::edit');
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

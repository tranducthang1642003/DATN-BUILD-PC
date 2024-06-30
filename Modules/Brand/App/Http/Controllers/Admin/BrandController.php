<?php

namespace Modules\Brand\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Brand\Entities\Brand;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $keyword = $request->input('keyword');
        $brandsQuery = Brand::query();
        if ($startDate && $endDate) {
            $brandsQuery->whereBetween('created_at', [$startDate, $endDate]);
        }
        if ($keyword) {
            $brandsQuery->where('name', 'like', '%' . $keyword . '%');
        }
        $brands = $brandsQuery->paginate(10);
        return view('admin.brand.brand', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brand = Brand::All();
        return view('admin.brand.add', compact('brand'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required|string',
            'slug' => 'required|string',
            'featured' => 'required|in:yes,no',
            'status' => 'required|in:1,2,3',
            'description' => 'required|string',
        ]);
        $brand = new Brand();
        $brand->brand_name = $validatedData['brand_name'];
        $brand->slug = Str::slug($validatedData['brand_name'], '-');
        $brand->featured = $validatedData['featured'] === 'yes';
        $brand->status = $validatedData['status'];
        $brand->description = $validatedData['description'];
        if ($brand->save()) {
            return redirect()->route('brand')->with('success', 'Thêm thương hiệu thành công!');
        } else {
            return redirect()->back()->withInput()->with('errors', 'Thêm thương hiệu thất bại!');
        }
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('brand::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required|string',
            'slug' => 'required|string',
            'featured' => 'required|in:yes,no',
            'status' => 'required|in:1,2,3',
            'description' => 'required|string',
        ]);

        $brand = Brand::findOrFail($id);
        $brand->brand_name = $validatedData['brand_name'];
        $brand->slug = $validatedData['slug'];
        $brand->featured = $validatedData['featured'] === 'yes';
        $brand->status = $validatedData['status'];
        $brand->description = $validatedData['description'];
        if ($brand->save()) {
            return redirect()->route('brand')->with('success', 'Chỉnh sửa thương hiệu thành công!');
        } else {
            return redirect()->back()->withInput()->with('errors', 'Chỉnh sửa thương hiệu thất bại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()->route('brand')->with('success', 'Xóa thương hiệu thành công!');
    }
}

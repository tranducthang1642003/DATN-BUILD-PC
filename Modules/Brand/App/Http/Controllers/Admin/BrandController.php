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
    public function index(Request $request)
    {
        $title = 'Admin - Thương hiệu';
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
        return view('admin.brand.brand', compact('brands', 'title'));
    }
    public function create()
    {
        $title = 'Admin - Thương hiệu - Thêm mới';
        $brand = Brand::All();
        return view('admin.brand.add', compact('brand', 'title'));
    }
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
            return redirect()->back()->withInput()->with('error', 'Thêm thương hiệu thất bại!');
        }
    }
    public function show($id)
    {
        return view('brand::show');
    }
    public function edit($id)
    {
        $title = 'Admin - Thương hiệu - Chỉnh sửa';
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand', 'title'));
    }
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
            return redirect()->back()->withInput()->with('error', 'Chỉnh sửa thương hiệu thất bại!');
        }
    }
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()->route('brand')->with('success', 'Xóa thương hiệu thành công!');
    }
}

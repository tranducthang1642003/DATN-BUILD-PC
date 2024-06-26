<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\App\Http\Models\Brands;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $keyword = $request->input('keyword');
        $brandsQuery = brands::query();
        if ($startDate && $endDate) {
            $brandsQuery->whereBetween('created_at', [$startDate, $endDate]);
        }
        if ($keyword) {
            $brandsQuery->where('name', 'like', '%' . $keyword . '%');
        }
        $brands = $brandsQuery->paginate(10);
        return view('admin.brand.brand', compact('brands'));
    }
    public function edit($id)
    {
        $brand = brands::All()->findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }
    public function update_brand(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string',
            'featured' => 'required|in:yes,no',
            'status' => 'required|in:1,2,3',
            'description' => 'required|string',
            'parent_id' => 'required|string',
        ]);
        $brand = brands::findOrFail($id);
        $brand->brand_name = $validatedData['brand_name'];
        $brand->slug = $validatedData['slug'];
        $brand->featured = $validatedData['featured'] === 'yes';
        $brand->status = $validatedData['status'];
        $brand->description = $validatedData['description'];
        $brand->parent_id = $validatedData['parent_id'];
        $brand->save();
        return redirect()->route('brand');
    }

    public function add()
    {
        $brand = brands::All();
        return view('admin.brand.add', compact('brand'));
    }
    public function add_brand(Request $request)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required|string',
            'featured' => 'required|in:yes,no',
            'status' => 'required|in:1,2,3',
            'description' => 'required|string',
        ]);
        $brand = new brands();
        $brand->brand_name = $validatedData['brand_name'];
        $brand->slug = Str::slug($validatedData['brand_name'], '-');
        $brand->featured = $validatedData['featured'] === 'yes';
        $brand->status = $validatedData['status'];
        $brand->description = $validatedData['description'];
        dd($brand);
        if ($brand->save()) {
            return redirect()->route('brand')->with('success', 'Đã thêm danh mục thành công!');
        } else {
            return redirect()->back()->withInput()->withErrors('Thêm danh mục thất bại.');
        }
    }

    public function destroy($id)
    {
        $brand = brands::findOrFail($id);
        $brand->delete();
        return redirect()->route('brand')->with('success', 'brand deleted successfully!');
    }
}

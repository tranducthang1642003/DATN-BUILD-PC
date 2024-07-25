<?php

namespace Modules\Category\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Category\Entities\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $keyword = $request->input('keyword');
        $categoriesQuery = category::query();
        if ($startDate && $endDate) {
            $categoriesQuery->whereBetween('created_at', [$startDate, $endDate]);
        }
        if ($keyword) {
            $categoriesQuery->where('name', 'like', '%' . $keyword . '%');
        }
        $categories = $categoriesQuery->paginate(10);
        return view('admin.category.category', compact('categories'));
    }
    public function create()
    {
        $category = Category::All();
        return view('admin.category.add', compact('category'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|string',
            'image' => 'nullable|mimes:jpg,jpeg,png,bmp|max:2048',
            'featured' => 'required|in:yes,no',
            'is_featured_home' => 'required|in:yes,no',
            'build_pc' => 'required|in:yes,no',
            'status' => 'required|in:1,2,3',
            'description' => 'required|string',
        ]);
        $category = new Category();
        $category->category_name = $validatedData['category_name'];
        $category->slug = Str::slug($request->input('category_name'), '-');
        $category->featured = $validatedData['featured'] === 'yes';
        $category->is_featured_home = $validatedData['is_featured_home'] === 'yes';
        $category->build_pc = $validatedData['build_pc'] === 'yes';
        $category->status = $validatedData['status'];
        $category->description = $validatedData['description'];
        if ($image = $request->file('image')) {
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('image'), $fileName);
            $category->image = 'image/' . $fileName;
        }
        if ($category->save()) {
            return redirect()->route('category')->with('success', 'Đã thêm danh mục thành công!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Thêm danh mục thất bại.');
        }
    }
    public function show($id)
    {
        return view('category::show');
    }
    public function edit($id)
    {
        $category = category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|string',
            'image' => 'nullable|mimes:jpg,jpeg,png,bmp|max:2048',
            'featured' => 'required|in:yes,no',
            'is_featured_home' => 'required|in:yes,no',
            'build_pc' => 'required|in:yes,no',
            'status' => 'required|in:1,2,3',
            'description' => 'required|string',
        ]);
        $category = Category::findOrFail($id);
        $category->category_name = $validatedData['category_name'];
        $category->slug = Str::slug($request->input('category_name'), '-');
        $category->featured = $validatedData['featured'] === 'yes';
        $category->is_featured_home = $validatedData['is_featured_home'] === 'yes';
        $category->build_pc = $validatedData['build_pc'] === 'yes';
        $category->status = $validatedData['status'];
        $category->description = $validatedData['description'];
        if ($image = $request->file('image')) {
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('image'), $fileName);
            $category->image = 'image/' . $fileName;
        }
        if ($category->save()) {
            return redirect()->route('category')->with('success', 'Chỉnh sửa danh mục thành công!');
        } else {
            return redirect()->back()->withInput()->with('errors', 'Chỉnh sửa danh mục thất bại!');
        }
    }
    public function destroy($id)
    {
        $category = category::findOrFail($id);
        $category->delete();
        return redirect()->route('category')->with('success', 'Xóa danh mục thành công!');
    }
}

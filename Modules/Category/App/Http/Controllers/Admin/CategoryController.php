<?php

namespace Modules\Category\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Category\Entities\Category;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::All();
        return view('admin.category.add', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'category_name' => 'required|string',
            'slug' => 'required|string',
            'image' => 'required|mimes:jpg,jpeg,png,bmp|max:2048',
            'featured' => 'required|in:yes,no',
            'status' => 'required|in:1,2,3',
            'description' => 'required|string',
        ]);
        $category = new Category();
        $category->category_name = $validatedData['category_name'];
        $category->slug = $validatedData['slug'];
        $category->featured = $validatedData['featured'] === 'yes';
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
            return redirect()->back()->withInput()->with('errors', 'Thêm danh mục thất bại.');
        }
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('category::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $validatedData = $request->validate([
            'category_name' => 'required|string',
            'slug' => 'required|string',
            'image' => 'mimes:jpg,jpeg,png,bmp|max:2048',
            'featured' => 'required|in:yes,no',
            'status' => 'required|in:1,2,3',
            'description' => 'required|string',
        ]);
        $category = Category::findOrFail($id);
        $category->category_name = $validatedData['category_name'];
        $category->slug = $validatedData['slug'];
        $category->featured = $validatedData['featured'] === 'yes';
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $category = category::findOrFail($id);
        $category->delete();
        return redirect()->route('category')->with('success', 'Xóa danh mục thành công!');
    }
}

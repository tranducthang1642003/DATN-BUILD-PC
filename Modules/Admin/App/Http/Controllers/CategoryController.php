<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\App\Http\Models\Brands;
use Modules\Admin\App\Http\Models\Category;

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
    public function edit($id)
    {
        $category = category::All()->findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }
    public function update_category(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string',
            'featured' => 'required|in:yes,no',
            'status' => 'required|in:1,2,3',
            'description' => 'required|string',
            'parent_id' => 'required|string',
        ]);
        $category = category::findOrFail($id);
        $category->category_name = $validatedData['category_name'];
        $category->slug = $validatedData['slug'];
        $category->featured = $validatedData['featured'] === 'yes';
        $category->status = $validatedData['status'];
        $category->description = $validatedData['description'];
        $category->parent_id = $validatedData['parent_id'];
        $category->save();
        return redirect()->route('category');
    }

    public function add()
    {
        $category = category::All();
        return view('admin.category.add', compact('category'));
    }
    public function add_category(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string',
            'featured' => 'required|in:yes,no',
            'status' => 'required|in:1,2,3',
            'description' => 'required|string',
            'parent_id' => 'required|string',
        ]);
        $category = new Category();
        $category->name = $validatedData['name'];
        $category->slug = $validatedData['slug'];
        $category->featured = $validatedData['featured'] === 'yes';
        $category->status = $validatedData['status'];
        $category->description = $validatedData['description'];
        $category->parent_id = $validatedData['parent_id'];
        if ($category->save()) {
            return redirect()->route('category')->with('success', 'Đã thêm danh mục thành công!');
        } else {
            return redirect()->back()->withInput()->withErrors('Thêm danh mục thất bại.');
        }
    }

    public function destroy($id)
    {
        $category = category::findOrFail($id);
        $category->delete();
        return redirect()->route('category')->with('success', 'category deleted successfully!');
    }
}

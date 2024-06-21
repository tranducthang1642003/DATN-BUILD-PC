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

        // Lọc theo ngày bắt đầu và kết thúc nếu được cung cấp
        if ($startDate && $endDate) {
            $categoriesQuery->whereBetween('created_at', [$startDate, $endDate]);
        }

        // Lọc theo từ khóa nếu được cung cấp
        if ($keyword) {
            $categoriesQuery->where('name', 'like', '%' . $keyword . '%');
        }
        //  Phân trang
        $categories = $categoriesQuery->paginate(10);
        return view('admin.category.category', compact('categories'));
    }
    public function edit($id)
    {
        // Lấy thông tin sản phẩm cần chỉnh sửa từ ID
        $category = category::All()->findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }
    public function update_category(Request $request, $id)
    {
        // Validate dữ liệu đầu vào
        $validatedData = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string',
            'description' => 'required|string',
        ]);

        // Lấy thông tin sản phẩm cần chỉnh sửa từ ID
        $category = category::findOrFail($id);

        // Lưu các thay đổi vào cơ sở dữ liệu
        $category->name = $validatedData['name'];
        $category->slug = $validatedData['slug'];
        $category->description = $validatedData['description'];

        // Lưu hình ảnh mới nếu có
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('category_images', 'public');
            $category->image = $imagePath;
        }

        $category->save();

        // Redirect người dùng đến trang danh sách sản phẩm sau khi chỉnh sửa thành công
        return redirect()->route('category');
    }

    public function add()
    {
        $category = category::All();
        return view('admin.category.add', compact('category'));
    }
    public function add_category(Request $request)
    {
        // Validate dữ liệu đầu vào
        $validatedData = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'id_category' => 'required|exists:categories,id',
            'sale' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => 'nullable|image',
            'id_brand' => 'required|exists:brands,id',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
            'featured' => 'required|in:yes,no',
            'slug' => 'required|string',
            'discount' => 'required|numeric',
            'category_code' => 'required|string',
        ]);

        // Tạo một instance mới của category
        $category = new category();

        // Gán các giá trị từ dữ liệu được xác thực vào các thuộc tính của sản phẩm
        $category->name = $validatedData['name'];
        $category->color = $validatedData['color'];
        $category->price = $validatedData['price'];
        $category->id_category = $validatedData['id_category'];
        $category->sale = $validatedData['sale'];
        $category->quantity = $validatedData['quantity'];
        $category->id_brand = $validatedData['id_brand'];
        $category->short_description = $validatedData['short_description'];
        $category->long_description = $validatedData['long_description'];
        $category->featured = $validatedData['featured'] === 'yes' ? true : false;
        $category->slug = $validatedData['slug'];
        $category->discount = $validatedData['discount'];
        $category->category_code = $validatedData['category_code'];

        // Lưu hình ảnh nếu có
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('category_images', 'public');
            $category->image = $imagePath;
        }

        // Lưu sản phẩm vào cơ sở dữ liệu
        if ($category->save()) {
            // Redirect người dùng đến trang danh sách sản phẩm sau khi thêm thành công
            return redirect()->route('category')->with('success', 'category added successfully!');
        } else {
            // Nếu không thêm được sản phẩm, redirect về form thêm sản phẩm và hiển thị thông báo lỗi
            return redirect()->back()->withInput()->withErrors('Failed to add category.');
        }
    }
    public function destroy($id)
    {
        // Tìm sản phẩm cần xóa từ ID
        $category = category::findOrFail($id);

        // Xóa hình ảnh nếu tồn tại
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        // Xóa sản phẩm từ cơ sở dữ liệu
        $category->delete();

        // Redirect người dùng đến trang danh sách sản phẩm sau khi xóa thành công
        return redirect()->route('category')->with('success', 'category deleted successfully!');
    }
}

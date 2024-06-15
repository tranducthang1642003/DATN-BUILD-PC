<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\App\Http\Models\Brands;
use Modules\Admin\App\Http\Models\Category;
use Modules\Admin\App\Http\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        //  Đếm số lượng theo status
        $statusCounts = [
            '1' => Product::where('status', 1)->count(),
            '2' => Product::where('status', 2)->count(),
            '3' => Product::where('status', 3)->count(),
            '4' => Product::all()->count(),
        ];
        //  kết nối bảng lấy ra name
        $productsQuery = Product::with('brand', 'category', 'image');
        //  Lọc sản phẩm theo status
        $status = $request->input('status');
        if ($status) {
            $productsQuery->where('status', $status);
        }
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $keyword = $request->input('keyword');

        $productsQuery = Product::query();

        // Lọc theo ngày bắt đầu và kết thúc nếu được cung cấp
        if ($startDate && $endDate) {
            $productsQuery->whereBetween('created_at', [$startDate, $endDate]);
        }

        // Lọc theo từ khóa nếu được cung cấp
        if ($keyword) {
            $productsQuery->where('name', 'like', '%' . $keyword . '%');
        }
        //  Phân trang
        $products = $productsQuery->paginate(10);
        return view('admin.product.product', compact('products', 'statusCounts'));
    }
    public function edit($id)
    {
        $brands = Brands::All();
        $categories = Category::all();
        // Lấy thông tin sản phẩm cần chỉnh sửa từ ID
        $product = Product::with('brand', 'category', 'image')->findOrFail($id);
        return view('admin.product.edit', compact('product', 'brands', 'categories'));
    }
    public function update_product(Request $request, $id)
    {
        // Validate dữ liệu đầu vào
        $validatedData = $request->validate([
            'name' => 'required|string',
            'color' => 'required|string',
            'price' => 'required|numeric',
            'id_category' => 'required|string',
            'sale' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => 'nullable|image',
            'id_brand' => 'required|string',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
            'featured' => 'required|in:yes,no',
            'slug' => 'required|string',
            'discount' => 'required|numeric',
            'product_code' => 'required|string',
        ]);

        // Lấy thông tin sản phẩm cần chỉnh sửa từ ID
        $product = Product::findOrFail($id);

        // Lưu các thay đổi vào cơ sở dữ liệu
        $product->name = $validatedData['name'];
        $product->color = $validatedData['color'];
        $product->price = $validatedData['price'];
        $product->id_category = $validatedData['id_category'];
        $product->sale = $validatedData['sale'];
        $product->quantity = $validatedData['quantity'];
        $product->brand()->associate($validatedData['id_brand']);
        $product->short_description = $validatedData['short_description'];
        $product->long_description = $validatedData['long_description'];
        $product->featured = $validatedData['featured'] === 'yes' ? true : false;
        $product->slug = $validatedData['slug'];
        $product->discount = $validatedData['discount'];
        $product->product_code = $validatedData['product_code'];

        // Lưu hình ảnh mới nếu có
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
            $product->image = $imagePath;
        }

        $product->save();

        // Redirect người dùng đến trang danh sách sản phẩm sau khi chỉnh sửa thành công
        return redirect()->route('product');
    }

    public function add()
    {
        $brands = Brands::All();
        $categories = Category::all();
        // Lấy thông tin sản phẩm cần chỉnh sửa từ ID
        $product = Product::with('brand', 'category', 'image');
        return view('admin.product.add', compact('product', 'brands', 'categories'));
    }
    public function add_product(Request $request)
    {
        // Validate dữ liệu đầu vào
        $validatedData = $request->validate([
            'name' => 'required|string',
            'color' => 'required|string',
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
            'product_code' => 'required|string',
        ]);

        // Tạo một instance mới của Product
        $product = new Product();

        // Gán các giá trị từ dữ liệu được xác thực vào các thuộc tính của sản phẩm
        $product->name = $validatedData['name'];
        $product->color = $validatedData['color'];
        $product->price = $validatedData['price'];
        $product->id_category = $validatedData['id_category'];
        $product->sale = $validatedData['sale'];
        $product->quantity = $validatedData['quantity'];
        $product->id_brand = $validatedData['id_brand'];
        $product->short_description = $validatedData['short_description'];
        $product->long_description = $validatedData['long_description'];
        $product->featured = $validatedData['featured'] === 'yes' ? true : false;
        $product->slug = $validatedData['slug'];
        $product->discount = $validatedData['discount'];
        $product->product_code = $validatedData['product_code'];

        // Lưu hình ảnh nếu có
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
            $product->image = $imagePath;
        }

        // Lưu sản phẩm vào cơ sở dữ liệu
        if ($product->save()) {
            // Redirect người dùng đến trang danh sách sản phẩm sau khi thêm thành công
            return redirect()->route('product')->with('success', 'Product added successfully!');
        } else {
            // Nếu không thêm được sản phẩm, redirect về form thêm sản phẩm và hiển thị thông báo lỗi
            return redirect()->back()->withInput()->withErrors('Failed to add product.');
        }
    }
    public function destroy($id)
    {
        // Tìm sản phẩm cần xóa từ ID
        $product = Product::findOrFail($id);

        // Xóa hình ảnh nếu tồn tại
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        // Xóa sản phẩm từ cơ sở dữ liệu
        $product->delete();

        // Redirect người dùng đến trang danh sách sản phẩm sau khi xóa thành công
        return redirect()->route('product')->with('success', 'Product deleted successfully!');
    }
}

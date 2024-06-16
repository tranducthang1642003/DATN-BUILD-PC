<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\App\Http\Models\Brands;
use Modules\Admin\App\Http\Models\Order;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $keyword = $request->input('keyword');

        $ordersQuery = Order::query();

        // Lọc theo ngày bắt đầu và kết thúc nếu được cung cấp
        if ($startDate && $endDate) {
            $ordersQuery->whereBetween('created_at', [$startDate, $endDate]);
        }

        // Lọc theo từ khóa nếu được cung cấp
        if ($keyword) {
            $ordersQuery->where('name', 'like', '%' . $keyword . '%');
        }
        //  Phân trang
        $orders = $ordersQuery->paginate(10);
        return view('admin.order.order', compact('orders'));
    }
    public function edit($id)
    {
        // Lấy thông tin sản phẩm cần chỉnh sửa từ ID
        $order = Order::All()->findOrFail($id);
        return view('admin.order.edit', compact('order'));
    }
    public function update_order(Request $request, $id)
    {
        // Validate dữ liệu đầu vào
        $validatedData = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string',
            'description' => 'required|string',
        ]);

        // Lấy thông tin sản phẩm cần chỉnh sửa từ ID
        $order = Order::findOrFail($id);

        // Lưu các thay đổi vào cơ sở dữ liệu
        $order->name = $validatedData['name'];
        $order->slug = $validatedData['slug'];
        $order->description = $validatedData['description'];

        // Lưu hình ảnh mới nếu có
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('order_images', 'public');
            $order->image = $imagePath;
        }

        $order->save();

        // Redirect người dùng đến trang danh sách sản phẩm sau khi chỉnh sửa thành công
        return redirect()->route('order');
    }

    public function add()
    {
        $order = Order::All();
        return view('admin.order.add', compact('order'));
    }
    public function add_order(Request $request)
    {
        // Validate dữ liệu đầu vào
        $validatedData = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'id_order' => 'required|exists:orders,id',
            'sale' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => 'nullable|image',
            'id_brand' => 'required|exists:brands,id',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
            'featured' => 'required|in:yes,no',
            'slug' => 'required|string',
            'discount' => 'required|numeric',
            'order_code' => 'required|string',
        ]);

        // Tạo một instance mới của order
        $order = new Order();

        // Gán các giá trị từ dữ liệu được xác thực vào các thuộc tính của sản phẩm
        $order->name = $validatedData['name'];
        $order->color = $validatedData['color'];
        $order->price = $validatedData['price'];
        $order->id_order = $validatedData['id_order'];
        $order->sale = $validatedData['sale'];
        $order->quantity = $validatedData['quantity'];
        $order->id_brand = $validatedData['id_brand'];
        $order->short_description = $validatedData['short_description'];
        $order->long_description = $validatedData['long_description'];
        $order->featured = $validatedData['featured'] === 'yes' ? true : false;
        $order->slug = $validatedData['slug'];
        $order->discount = $validatedData['discount'];
        $order->order_code = $validatedData['order_code'];

        // Lưu hình ảnh nếu có
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('order_images', 'public');
            $order->image = $imagePath;
        }

        // Lưu sản phẩm vào cơ sở dữ liệu
        if ($order->save()) {
            // Redirect người dùng đến trang danh sách sản phẩm sau khi thêm thành công
            return redirect()->route('order')->with('success', 'order added successfully!');
        } else {
            // Nếu không thêm được sản phẩm, redirect về form thêm sản phẩm và hiển thị thông báo lỗi
            return redirect()->back()->withInput()->withErrors('Failed to add order.');
        }
    }
    public function destroy($id)
    {
        // Tìm sản phẩm cần xóa từ ID
        $order = Order::findOrFail($id);

        // Xóa hình ảnh nếu tồn tại
        if ($order->image) {
            Storage::disk('public')->delete($order->image);
        }

        // Xóa sản phẩm từ cơ sở dữ liệu
        $order->delete();

        // Redirect người dùng đến trang danh sách sản phẩm sau khi xóa thành công
        return redirect()->route('order')->with('success', 'order deleted successfully!');
    }
}

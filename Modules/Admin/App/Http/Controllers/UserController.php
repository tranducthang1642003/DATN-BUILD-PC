<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\App\Http\Models\Brands;
use Modules\Admin\App\Http\Models\Users;

class userController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $keyword = $request->input('keyword');

        $usersQuery = Users::query();

        // Lọc theo ngày bắt đầu và kết thúc nếu được cung cấp
        if ($startDate && $endDate) {
            $usersQuery->whereBetween('created_at', [$startDate, $endDate]);
        }

        // Lọc theo từ khóa nếu được cung cấp
        if ($keyword) {
            $usersQuery->where('name', 'like', '%' . $keyword . '%');
        }
        //  Phân trang
        $users = $usersQuery->paginate(10);
        return view('admin.user.user', compact('users'));
    }
    public function edit($id)
    {
        // Lấy thông tin sản phẩm cần chỉnh sửa từ ID
        $user = Users::All()->findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }
    public function update_user(Request $request, $id)
    {
        // Validate dữ liệu đầu vào
        $validatedData = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string',
            'description' => 'required|string',
        ]);

        // Lấy thông tin sản phẩm cần chỉnh sửa từ ID
        $user = Users::findOrFail($id);

        // Lưu các thay đổi vào cơ sở dữ liệu
        $user->name = $validatedData['name'];
        $user->slug = $validatedData['slug'];
        $user->description = $validatedData['description'];

        // Lưu hình ảnh mới nếu có
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('user_images', 'public');
            $user->image = $imagePath;
        }

        $user->save();

        // Redirect người dùng đến trang danh sách sản phẩm sau khi chỉnh sửa thành công
        return redirect()->route('user');
    }

    public function add()
    {
        $user = Users::All();
        return view('admin.user.add', compact('user'));
    }
    public function add_user(Request $request)
    {
        // Validate dữ liệu đầu vào
        $validatedData = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'id_user' => 'required|exists:users,id',
            'sale' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => 'nullable|image',
            'id_brand' => 'required|exists:brands,id',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
            'featured' => 'required|in:yes,no',
            'slug' => 'required|string',
            'discount' => 'required|numeric',
            'user_code' => 'required|string',
        ]);

        // Tạo một instance mới của user
        $user = new Users();

        // Gán các giá trị từ dữ liệu được xác thực vào các thuộc tính của sản phẩm
        $user->name = $validatedData['name'];
        $user->color = $validatedData['color'];
        $user->price = $validatedData['price'];
        $user->id_user = $validatedData['id_user'];
        $user->sale = $validatedData['sale'];
        $user->quantity = $validatedData['quantity'];
        $user->id_brand = $validatedData['id_brand'];
        $user->short_description = $validatedData['short_description'];
        $user->long_description = $validatedData['long_description'];
        $user->featured = $validatedData['featured'] === 'yes' ? true : false;
        $user->slug = $validatedData['slug'];
        $user->discount = $validatedData['discount'];
        $user->user_code = $validatedData['user_code'];

        // Lưu hình ảnh nếu có
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('user_images', 'public');
            $user->image = $imagePath;
        }

        // Lưu sản phẩm vào cơ sở dữ liệu
        if ($user->save()) {
            // Redirect người dùng đến trang danh sách sản phẩm sau khi thêm thành công
            return redirect()->route('user')->with('success', 'user added successfully!');
        } else {
            // Nếu không thêm được sản phẩm, redirect về form thêm sản phẩm và hiển thị thông báo lỗi
            return redirect()->back()->withInput()->withErrors('Failed to add user.');
        }
    }
    public function destroy($id)
    {
        // Tìm sản phẩm cần xóa từ ID
        $user = Users::findOrFail($id);

        // Xóa hình ảnh nếu tồn tại
        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }

        // Xóa sản phẩm từ cơ sở dữ liệu
        $user->delete();

        // Redirect người dùng đến trang danh sách sản phẩm sau khi xóa thành công
        return redirect()->route('user')->with('success', 'user deleted successfully!');
    }
}

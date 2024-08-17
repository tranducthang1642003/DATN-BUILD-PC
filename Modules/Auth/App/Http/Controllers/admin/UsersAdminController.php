<?php

namespace Modules\Auth\App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\App\Http\Models\Brands;
use Modules\Auth\Entities\User;

class UsersAdminController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Admin - Người dùng';
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $keyword = $request->input('keyword');
        $usersQuery = User::query();
        if ($startDate && $endDate) {
            $usersQuery->whereBetween('created_at', [$startDate, $endDate]);
        }
        if ($keyword) {
            $usersQuery->where('name', 'like', '%' . $keyword . '%');
        }
        $users = $usersQuery->paginate(10);
        return view('admin.user.user', compact('users', 'title'));
    }
    public function edit($id)
    {
        $title = 'Admin - Người dùng - Chỉnh sửa';
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user', 'title'));
    }
    public function update_user(Request $request, $id)
    {
       
        $validatedData = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'is_activated' => 'required|in:1,0',
        ]);
        try {
            $user = User::findOrFail($id);
            $user->name = $validatedData['username'];
            $user->password = bcrypt($validatedData['password']);
            $user->email = $validatedData['email'];
            $user->phone = $validatedData['phone'];
            $user->address = $validatedData['address'];
            $user->is_activated = $validatedData['is_activated'];
            $user->save();
            return redirect()->route('user')->with('success', 'Đã cập nhật người dùng thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Cập nhật người dùng không thành công: ' . $e->getMessage());
        }
    }
    public function update_user_status(Request $request, User $user)
    {
        $request->validate([
            'active_new' => 'required|in:1,0',
        ]);
        try {
            $user->is_activated = $request->input('active_new');
            $user->save();
            return redirect()->route('user')->with('success', 'Đã cập nhật trạng thái người dùng thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Cập nhật trạng thái không thành công: ' . $e->getMessage());
        }
    }
    public function add()
    {
        $title = 'Admin - Người dùng - Thêm mới';
        $user = User::All();
        return view('admin.user.add', compact('user', 'title'));
    }
    public function add_user(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'is_activated' => 'required|in:1,0',
        ]);
        $user = new User();
        $user->name = $validatedData['username'];
        $user->password = bcrypt($validatedData['password']);
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'];
        $user->address = $validatedData['address'];
        $user->is_activated = $validatedData['is_activated'];
        if ($user->save()) {
            return redirect()->route('user')->with('success', 'Người dùng đã được tạo thành công!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Thêm người dùng thất bại.');
        }
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user')->with('success', 'Xóa người dùng thành công!');
    }
}

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
        return view('admin.user.user', compact('users'));
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
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
        $user = User::findOrFail($id);
        $user->name = $validatedData['username'];
        $user->password = bcrypt($validatedData['password']);
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'];
        $user->address = $validatedData['address'];
        $user->is_activated = $validatedData['is_activated'];
        $user->save();
        return redirect()->route('user');
    }

    public function add()
    {
        $user = User::All();
        return view('admin.user.add', compact('user'));
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
            return redirect()->route('user')->with('success', 'user added successfully!');
        } else {
            return redirect()->back()->withInput()->withErrors('Failed to add user.');
        }
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user')->with('success', 'user deleted successfully!');
    }
}

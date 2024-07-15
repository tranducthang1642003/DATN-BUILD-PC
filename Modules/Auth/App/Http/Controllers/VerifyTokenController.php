<?php

namespace Modules\Auth\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\VerifyToken;
use Illuminate\Support\Facades\Mail;
use Modules\Settings\Entities\Menu;


class VerifyTokenController extends Controller
{
    public function create()
    {
        // Nếu bạn muốn hiển thị form thêm mới token
    }

    public function store(Request $request)
    {
        $request->validate([
            'token' => ['required', 'string'], // Thêm các quy tắc kiểm tra cần thiết
            'email' => ['required', 'email'], // Thêm các quy tắc kiểm tra cần thiết
        ]);

        $verifyToken = VerifyToken::create([
            'token' => $request->input('token'),
            'email' => $request->input('email'),
        ]);

        // Gửi email kích hoạt token (nếu cần)
        // Mail::to($request->input('email'))->send(new WelcomeMail($request->input('email'), $request->input('token')));

        return redirect()->route('verify.token.show')->with('success', 'Token đã được tạo thành công.');
    }

    public function show()
    {
        $menuItems = Menu::all();
        return view('auth\verify-token',compact('menuItems'));
    }
}

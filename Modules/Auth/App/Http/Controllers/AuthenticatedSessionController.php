<?php

namespace Modules\Auth\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Modules\Settings\Entities\Menu;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $title ='Đăng Nhập ';
        $menuItems = Menu::all();

        return view('public.auth.login',compact('menuItems','title'));
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->is_activated == 1) {
                $request->session()->regenerate();
                return redirect()->intended('/');
            } else {
                Auth::logout();
                return back()->withErrors(['email' => 'Your account is not activated.']);
            }
        }
        return back()->withErrors(['email' => 'Invalid credentials.']);
    } 
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

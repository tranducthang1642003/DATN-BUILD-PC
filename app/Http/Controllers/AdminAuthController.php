<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->is_admin) { // Assuming you have an is_admin column in your users table
                return redirect()->intended('/admin');
            } else {
                Auth::logout();

                throw ValidationException::withMessages([
                    'email' => __('You do not have access to the admin panel.'),
                ]);
            }
        }

        return back()->withErrors([
            'email' => __('The provided credentials do not match our records.'),
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}

<?php

namespace Modules\Auth\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Modules\Auth\Entities\User;
use Modules\Auth\Entities\VerifyToken;
use Modules\Auth\Mail\WelcomeMail;

class RegisterController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('public.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $validToken = substr(str_shuffle('0123456789'), 0, 2) . '2022';

        $verifyToken = VerifyToken::create([
            'token' => $validToken,
            'email' => $validatedData['email'],
        ]);

        Mail::to($validatedData['email'])->send(new WelcomeMail($validatedData['email'], $validToken));

        return redirect()->route('verify.token.show');
    }

    public function showVerifyTokenForm()
    {
        return view('auth/verify-token');
    }

    public function verifyToken(Request $request)
    {

        $request->validate([
            'token' => ['required', 'string'],

        ]);

        $token = $request->input('token');
        $verifyToken = VerifyToken::where('token', $token)->first();

        if ($verifyToken) {
            $user = User::where('email', $verifyToken->email)->first();

            if ($user) {

                $user->is_activated = true;
                $user->save();

                $verifyToken->delete();

                return redirect('/')->with('success', 'Your account has been activated successfully.');
            } else {
                return redirect('/')->with('error', 'User not found.');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid token. Please check and try again.');
        }
    }
}

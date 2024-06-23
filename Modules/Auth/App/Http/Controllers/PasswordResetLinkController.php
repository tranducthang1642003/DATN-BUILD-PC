<?php

namespace Modules\Auth\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Modules\Auth\Entities\User;

class PasswordResetLinkController extends Controller
{
    public function create(): View
    {
        return view('public.auth.ForgotPassword');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');
        $status = Password::sendResetLink([
            'email' => $email,
        ]);
        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', __($status));
        }
        throw ValidationException::withMessages([
            'email' => [trans($status)],
        ]);
    }
}

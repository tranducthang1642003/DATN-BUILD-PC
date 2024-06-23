<?php

namespace Modules\Auth\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Modules\Auth\Entities\User; // Assuming User model is in Modules\Auth\Entities namespace

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

        // Send the password reset link
        $status = Password::sendResetLink([
            'email' => $email,
        ]);

        // Check the status and return the appropriate response
        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', __($status));
        }

        // If the status is not 'RESET_LINK_SENT', return with error
        throw ValidationException::withMessages([
            'email' => [trans($status)],
        ]);
    }
}

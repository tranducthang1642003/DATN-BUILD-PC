<?php

use Modules\Auth\App\Http\Controllers\admin\UsersAdminController;
use Modules\Auth\App\Http\Controllers\AuthenticatedSessionController;
use Modules\Auth\App\Http\Controllers\NewPasswordController;
use Modules\Auth\App\Http\Controllers\PasswordResetLinkController;
use Modules\Auth\App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisterController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');

    Route::get('/auth/verify-token/show', [RegisterController::class, 'showVerifyTokenForm'])->name('verify.token.show');
    Route::post('/auth/verify-token/verify', [RegisterController::class, 'verifyToken'])->name('verify.token.verify');
});

Route::middleware('auth')->group(function () {
    // Route::get('verify-email', EmailVerificationPromptController::class)
    //     ->name('verification.notice');

    // Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
    //     ->middleware(['signed', 'throttle:6,1'])
    //     ->name('verification.verify');

    // Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    //     ->middleware('throttle:6,1')
    //     ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/user', [UsersAdminController::class, 'index'])->name('user');
    Route::get('admin/user/add', [UsersAdminController::class, 'add'])->name('add_user');
    Route::post('admin/user/add', [UsersAdminController::class, 'add_user'])->name('add_user');
    Route::get('admin/user/{id}', [UsersAdminController::class, 'show'])->name('show_user');
    Route::get('admin/user/{id}/edit', [UsersAdminController::class, 'edit'])->name('edit_user');
    Route::post('admin/user/{id}/edit', [UsersAdminController::class, 'update_user'])->name('update_user');
    Route::post('admin/user/{user}/edit', [UsersAdminController::class, 'update_user_status'])->name('update_user_status');
    Route::delete('admin/user/{id}', [UsersAdminController::class, 'destroy'])->name('delete_user');
});

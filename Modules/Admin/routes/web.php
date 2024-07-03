<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\App\Http\Controllers\AdminController;
use Modules\Admin\App\Http\Controllers\BrandController;
use Modules\Admin\App\Http\Controllers\CategoryController;
use Modules\Admin\App\Http\Controllers\OrderController;
use Modules\Admin\App\Http\Controllers\UserController;
use Modules\Admin\App\Http\Controllers\ProductController;
use Modules\Admin\App\Http\Controllers\VoucherController;

Route::group(['middleware' => 'admin'], function () {
    Route::get('admin', [AdminController::class, 'index'])->name('admin');


        Route::get('order', [OrderController::class, 'index'])->name('order');
        Route::get('order/add', [OrderController::class, 'add'])->name('add_order');
        Route::post('order/add', [OrderController::class, 'add_product'])->name('add_order');
        Route::get('order/{id}', [OrderController::class, 'show'])->name('show_order');
        Route::get('order/{id}/edit', [OrderController::class, 'edit'])->name('edit_order');
        Route::put('order/{id}/edit', [OrderController::class, 'update_product'])->name('update_order');
        Route::delete('order/{id}', [OrderController::class, 'destroy'])->name('delete_order');

        Route::get('user', [UserController::class, 'index'])->name('user');
        Route::get('user/add', [UserController::class, 'add'])->name('add_user');
        Route::post('user/add', [UserController::class, 'add_user'])->name('add_user');
        Route::get('user/{id}', [UserController::class, 'show'])->name('show_user');
        Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('edit_user');
        Route::put('user/{id}/edit', [UserController::class, 'update_user'])->name('update_user');
        Route::delete('user/{id}', [UserController::class, 'destroy'])->name('delete_user');

        Route::get('voucher', [VoucherController::class, 'index'])->name('voucher');
        Route::get('voucher/add', [VoucherController::class, 'add'])->name('add_voucher');
        Route::post('voucher/add', [VoucherController::class, 'add_voucher'])->name('add_voucher');
        Route::get('voucher/{id}', [VoucherController::class, 'show'])->name('show_voucher');
        Route::get('voucher/{id}/edit', [VoucherController::class, 'edit'])->name('edit_voucher');
        Route::put('voucher/{id}/edit', [VoucherController::class, 'update_voucher'])->name('update_voucher');
        Route::delete('voucher/{id}', [VoucherController::class, 'destroy'])->name('delete_voucher');
    });



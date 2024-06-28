<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\App\Http\Controllers\AdminController;
use Modules\Admin\App\Http\Controllers\BrandController;
use Modules\Admin\App\Http\Controllers\CategoryController;
use Modules\Admin\App\Http\Controllers\OrderController;
use Modules\Admin\App\Http\Controllers\UserController;
use Modules\Admin\App\Http\Controllers\ProductController;
use Modules\Admin\App\Http\Controllers\VoucherController;

Route::group(['admin'], function () {
    Route::get('admin', [AdminController::class, 'index'])->name('admin');
    Route::get('admin/product', [ProductController::class, 'index'])->name('product');
    Route::get('admin/product/add', [ProductController::class, 'add'])->name('add');
    Route::post('admin/product/add', [ProductController::class, 'add_product'])->name('add_product');
    Route::get('admin/product/{id}', [ProductController::class, 'show'])->name('show_product');
    Route::get('admin/product/{id}/edit', [ProductController::class, 'edit'])->name('edit_product');
    Route::put('admin/product/{id}/edit', [ProductController::class, 'update_product'])->name('update_product');
    Route::delete('admin/product/{id}', [ProductController::class, 'destroy'])->name('delete_product');

    Route::get('admin/order', [OrderController::class, 'index'])->name('order');
    Route::get('admin/order/add', [OrderController::class, 'add'])->name('add_order');
    Route::post('admin/order/add', [OrderController::class, 'add_product'])->name('add_order');
    Route::get('admin/order/{id}', [OrderController::class, 'show'])->name('show_order');
    Route::get('admin/order/{id}/edit', [OrderController::class, 'edit'])->name('edit_order');
    Route::put('admin/order/{id}/edit', [OrderController::class, 'update_product'])->name('update_order');
    Route::delete('admin/order/{id}', [OrderController::class, 'destroy'])->name('delete_order');

    Route::get('admin/user', [UserController::class, 'index'])->name('user');
    Route::get('admin/user/add', [UserController::class, 'add'])->name('add_user');
    Route::post('admin/user/add', [UserController::class, 'add_user'])->name('add_user');
    Route::get('admin/user/{id}', [UserController::class, 'show'])->name('show_user');
    Route::get('admin/user/{id}/edit', [UserController::class, 'edit'])->name('edit_user');
    Route::put('admin/user/{id}/edit', [UserController::class, 'update_user'])->name('update_user');
    Route::delete('admin/user/{id}', [UserController::class, 'destroy'])->name('delete_user');

    Route::get('admin/voucher', [VoucherController::class, 'index'])->name('voucher');
    Route::get('admin/voucher/add', [VoucherController::class, 'add'])->name('add_voucher');
    Route::post('admin/voucher/add', [VoucherController::class, 'add_voucher'])->name('add_voucher');
    Route::get('admin/voucher/{id}', [VoucherController::class, 'show'])->name('show_voucher');
    Route::get('admin/voucher/{id}/edit', [VoucherController::class, 'edit'])->name('edit_voucher');
    Route::put('admin/voucher/{id}/edit', [VoucherController::class, 'update_voucher'])->name('update_voucher');
    Route::delete('admin/voucher/{id}', [VoucherController::class, 'destroy'])->name('delete_voucher');
});

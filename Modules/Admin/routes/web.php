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


    Route::get('voucher', [VoucherController::class, 'index'])->name('voucher');
    Route::get('voucher/add', [VoucherController::class, 'add'])->name('add_voucher');
    Route::post('voucher/add', [VoucherController::class, 'add_voucher'])->name('add_voucher');
    Route::get('voucher/{id}', [VoucherController::class, 'show'])->name('show_voucher');
    Route::get('voucher/{id}/edit', [VoucherController::class, 'edit'])->name('edit_voucher');
    Route::put('voucher/{id}/edit', [VoucherController::class, 'update_voucher'])->name('update_voucher');
    Route::delete('voucher/{id}', [VoucherController::class, 'destroy'])->name('delete_voucher');
});

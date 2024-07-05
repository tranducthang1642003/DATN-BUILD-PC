<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\App\Http\Controllers\ProductController;
use Modules\Product\App\Http\Controllers\Admin\ProductControllerAdmin;

Route::group(['middleware' => 'admin'], function () {
    Route::get('product', [ProductController::class, 'index'])->name('product.index');
    Route::get('product/add', [ProductController::class, 'create'])->name('product.create');
    Route::post('product/add', [ProductController::class, 'store'])->name('product.store');
    Route::get('product/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::get('product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('product/{id}/edit', [ProductController::class, 'update'])->name('product.update');
    Route::delete('product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

    // Admin routes
    Route::get('admin/product', [ProductControllerAdmin::class, 'index'])->name('product');
    Route::get('admin/product/add', [ProductControllerAdmin::class, 'add'])->name('add_product');
    Route::post('admin/product/add', [ProductControllerAdmin::class, 'add_product'])->name('add_product');
    Route::get('admin/product/{id}', [ProductControllerAdmin::class, 'show'])->name('show');
    Route::get('admin/product/{id}/edit', [ProductControllerAdmin::class, 'edit'])->name('edit_product');
    Route::put('admin/product/{id}/edit', [ProductControllerAdmin::class, 'update_product'])->name('update_product');
    Route::delete('admin/product/{id}', [ProductControllerAdmin::class, 'destroy'])->name('delete_product');
});

Route::get('product/{slug}', [ProductController::class, 'show'])->name('product.show');

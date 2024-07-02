<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\App\Http\Controllers\ProductController;

Route::group([], function () {
    Route::get('admin/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('admin/product/add', [ProductController::class, 'create'])->name('product.create');
    Route::post('admin/product/add', [ProductController::class, 'store'])->name('product.store');
    Route::get('admin/product/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::get('admin/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('admin/product/{id}/edit', [ProductController::class, 'update'])->name('product.update');
    Route::delete('admin/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
});

Route::get('product/{slug}', [ProductController::class, 'show'])->name('product.show');

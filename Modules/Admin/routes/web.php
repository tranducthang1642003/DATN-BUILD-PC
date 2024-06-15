<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\App\Http\Controllers\AdminController;
use Modules\Admin\App\Http\Controllers\CategoryController;
use Modules\Admin\App\Http\Controllers\ProductController;

Route::group(['admin'], function () {
    Route::get('admin', [AdminController::class, 'index'])->name('admin');
    Route::get('admin/product', [ProductController::class, 'index'])->name('product');
    Route::get('admin/product/add', [ProductController::class, 'add'])->name('add');
    Route::post('admin/product/add', [ProductController::class, 'add_product'])->name('add_product');
    Route::get('admin/product/{id}', [ProductController::class, 'show'])->name('show_product');
    Route::get('admin/product/{id}/edit', [ProductController::class, 'edit'])->name('edit_product');
    Route::put('admin/product/{id}/edit', [ProductController::class, 'update_product'])->name('update_product');
    Route::delete('admin/product/{id}', [ProductController::class, 'destroy'])->name('delete_product');
    Route::get('admin/category', [CategoryController::class, 'index'])->name('category');
    Route::get('admin/category/add', [CategoryController::class, 'add'])->name('add_category');
    Route::post('admin/category/add', [CategoryController::class, 'add_product'])->name('add_category');
    Route::get('admin/category/{id}', [CategoryController::class, 'show'])->name('show_category');
    Route::get('admin/category/{id}/edit', [CategoryController::class, 'edit'])->name('edit_category');
    Route::put('admin/category/{id}/edit', [CategoryController::class, 'update_product'])->name('update_category');
    Route::delete('admin/category/{id}', [CategoryController::class, 'destroy'])->name('delete_category');

});

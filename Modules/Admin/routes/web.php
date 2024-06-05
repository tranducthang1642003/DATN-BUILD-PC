<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([], function () {
    Route::get('admin', [AdminController::class, 'index'])->name('admin');
    Route::get('admin/product', [AdminController::class, 'product'])->name('product');
    Route::get('admin/product/add', [AdminController::class, 'add_product'])->name('add_product');
    Route::get('admin/product/{id}', [AdminController::class, 'show'])->name('show_product');
    Route::get('admin/product/{id}/edit', [AdminController::class, 'edit'])->name('edit_product');
    Route::delete('admin/product/{id}', [AdminController::class, 'destroy'])->name('delete_product');
});

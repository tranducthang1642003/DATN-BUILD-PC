<?php

use Illuminate\Support\Facades\Route;
use Modules\Category\App\Http\Controllers\Admin\CategoryController;

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

Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/category', [CategoryController::class, 'index'])->name('category');
    Route::get('admin/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('admin/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('admin/category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('admin/category/{id}/edit', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('admin/category/{id}', [CategoryController::class, 'destroy'])->name('delete_category');
});

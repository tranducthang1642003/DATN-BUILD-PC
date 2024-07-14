<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\App\Http\Controllers\admin\BlogCategoryController;
use Modules\Blog\App\Http\Controllers\admin\BlogController;

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
    Route::get('admin/blog', [BlogController::class, 'index'])->name('blog');
    Route::get('admin/blog/add', [BlogController::class, 'add'])->name('add_blog');
    Route::post('admin/blog/add', [BlogController::class, 'add_blog'])->name('add_blog');
    Route::get('admin/blog/{id}/edit', [BlogController::class, 'edit'])->name('edit_blog');
    Route::post('admin/blog/{id}/edit', [BlogController::class, 'update_blog'])->name('update_blog');
    Route::delete('admin/blog/{id}', [BlogController::class, 'destroy'])->name('delete_blog');

    // category blog routes
    Route::get('admin/blog/category', [BlogCategoryController::class, 'index'])->name('blog_category');
    Route::get('admin/blog/category/add', [BlogCategoryController::class, 'add'])->name('add_blog_category');
    Route::post('admin/blog/category/add', [BlogCategoryController::class, 'add_blog_category'])->name('add_blog_category');
    Route::get('admin/blog/category/{id}/edit', [BlogCategoryController::class, 'edit'])->name('edit_blog_category');
    Route::post('admin/blog/category/{id}/edit', [BlogCategoryController::class, 'update_blog_category'])->name('update_blog_category');
    Route::delete('admin/blog/category/{id}', [BlogCategoryController::class, 'destroy'])->name('delete_blog_category');

});

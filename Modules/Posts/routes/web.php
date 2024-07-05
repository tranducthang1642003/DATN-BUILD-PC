<?php

use Illuminate\Support\Facades\Route;
use Modules\Posts\App\Http\Controllers\PostsController;

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
    Route::get('admin/post', [PostsController::class, 'index'])->name('post');
    Route::get('admin/post/add', [PostsController::class, 'add'])->name('add_post');
    Route::post('admin/post/add', [PostsController::class, 'add_post'])->name('add_post');
    Route::get('admin/post/{id}', [PostsController::class, 'show'])->name('show_post');
    Route::get('admin/post/{id}/edit', [PostsController::class, 'edit'])->name('edit_post');
    Route::put('admin/post/{id}/edit', [PostsController::class, 'update_post'])->name('update_post');
    Route::delete('admin/post/{id}', [PostsController::class, 'destroy'])->name('delete_post');

});

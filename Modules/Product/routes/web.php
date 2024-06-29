<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\App\Http\Controllers\Admin\ProductController;

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
    Route::get('/', 'ProductController@index');
      Route::get('admin/product', [ProductController::class, 'index'])->name('product');
    Route::get('admin/product/add', [ProductController::class, 'add'])->name('add');
    Route::post('admin/product/add', [ProductController::class, 'add_product'])->name('add_product');
    Route::get('admin/product/{id}', [ProductController::class, 'show'])->name('show_product');
    Route::get('admin/product/{id}/edit', [ProductController::class, 'edit'])->name('edit_product');
    Route::put('admin/product/{id}/edit', [ProductController::class, 'update_product'])->name('update_product');
    Route::delete('admin/product/{id}', [ProductController::class, 'destroy'])->name('delete_product');
});
// Route::prefix('product')->group(function () {
//     Route::get('/', 'ProductController@index');
// });
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');

<?php

use Illuminate\Support\Facades\Route;
use Modules\Brand\App\Http\Controllers\Admin\BrandController;

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
    Route::get('admin/brand', [BrandController::class, 'index'])->name('brand');
    Route::get('admin/brand/add', [BrandController::class, 'create'])->name('brand.create');
    Route::post('admin/brand/add', [BrandController::class, 'store'])->name('brand.store');
    Route::get('admin/brand/{id}/', [BrandController::class, 'edit'])->name('brand.edit');
    Route::put('admin/brand/{id}/edit', [BrandController::class, 'update'])->name('brand.update');
    Route::delete('admin/brand/{id}', [BrandController::class, 'destroy'])->name('delete_brand');
});

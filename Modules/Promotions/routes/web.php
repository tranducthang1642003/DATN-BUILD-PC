<?php

use Illuminate\Support\Facades\Route;
use Modules\Promotions\App\Http\Controllers\admin\promotionControllerAdmin;

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
    Route::get('admin/vouchers', [promotionControllerAdmin::class, 'index'])->name('vouchers.index');
    Route::get('admin/vouchers/create', [promotionControllerAdmin::class, 'create'])->name('vouchers.create');
    Route::post('admin/vouchers', [promotionControllerAdmin::class, 'store'])->name('vouchers.store');
    Route::get('admin/vouchers/{id}/edit', [promotionControllerAdmin::class, 'edit'])->name('vouchers.edit');
    Route::post('admin/vouchers/{id}', [promotionControllerAdmin::class, 'update'])->name('vouchers.update');
    Route::delete('admin/vouchers/delete/{id}', [promotionControllerAdmin::class, 'destroy'])->name('vouchers.destroy');
});

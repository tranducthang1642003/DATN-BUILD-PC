<?php

use Illuminate\Support\Facades\Route;
use Modules\Settings\App\Http\Controllers\Admin\MenuController;
use Modules\Settings\App\Http\Controllers\Admin\SettingController;

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
    Route::get('admin/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::get('admin/settings/create', [SettingController::class, 'create'])->name('settings.create');
    Route::post('admin/settings', [SettingController::class, 'store'])->name('settings.store');
    Route::get('admin/settings/{id}/edit', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('admin/settings/{id}', [SettingController::class, 'update'])->name('settings.update');
    Route::delete('admin/settings/delete/{id}', [SettingController::class, 'destroy'])->name('settings.destroy');

    Route::post('admin/settings/category', [SettingController::class, 'store_category'])->name('settings.category.store');
    Route::post('admin/settings/category/{id}', [SettingController::class, 'update_category'])->name('settings.category.update');
    Route::delete('admin/settings/category/delete/{id}', [SettingController::class, 'destroy_category'])->name('settings.category.destroy');

    Route::get('admin/menu', [MenuController::class, 'index'])->name('menu.index');
    Route::get('admin/menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('admin/menu', [MenuController::class, 'store'])->name('menu.store');
    Route::get('admin/menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::post('admin/menu/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('admin/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
});

<?php

use Illuminate\Support\Facades\Route;
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
    Route::get('admin/setting', [SettingController::class, 'index'])->name('setting');
    Route::get('admin/setting/banner', [SettingController::class, 'index_banner'])->name('banner');
    Route::get('admin/setting/banner/add', [SettingController::class, 'add_banner'])->name('add_banner');
    Route::post('admin/setting/banner/add', [SettingController::class, 'add_banners'])->name('add_banner');
    Route::get('admin/setting/banner/{id}', [SettingController::class, 'show_banner'])->name('show_banner');
    Route::get('admin/setting/banner/{id}/edit', [SettingController::class, 'edit_banner'])->name('edit_banner');
    Route::put('admin/setting/banner/{id}/edit', [SettingController::class, 'update_banner'])->name('update_banner');
    Route::delete('admin/setting/banner/{id}', [SettingController::class, 'destroy_banner'])->name('delete_banner');
});

<?php

use Illuminate\Support\Facades\Route;
use Modules\Settings\App\Http\Controllers\SettingsController;

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
    Route::get('admin/setting', [SettingsController::class, 'index'])->name('setting');
    Route::get('admin/setting/add', [SettingsController::class, 'add'])->name('add_setting');
    Route::post('admin/setting/add', [SettingsController::class, 'add_setting'])->name('add_setting');
    Route::get('admin/setting/{id}', [SettingsController::class, 'show'])->name('show_setting');
    Route::get('admin/setting/{id}/edit', [SettingsController::class, 'edit'])->name('edit_setting');
    Route::put('admin/setting/{id}/edit', [SettingsController::class, 'update_setting'])->name('update_setting');
    Route::delete('admin/setting/{id}', [SettingsController::class, 'destroy'])->name('delete_setting');

});

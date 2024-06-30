<?php

use Illuminate\Support\Facades\Route;
use Modules\Dashboard\App\Http\Controllers\DashboardController;

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

Route::group([], function ()
{
    Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('dashboard/update', [DashboardController::class, 'update'])->name('update');
    Route::post('dashboard/update', [DashboardController::class, 'update_auth'])->name('update_auth');
});

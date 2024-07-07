<?php

use Illuminate\Support\Facades\Route;
use Modules\Like\App\Http\Controllers\LikeController;

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
    Route::get('dashboard/like', [LikeController::class, 'index'])->name('like');
    Route::post('dashboard/like/add',[LikeController::class, 'addlike'])->name('addlike');
    Route::delete('dashboard/like/delete/{id}', [LikeController::class, 'deletelike'])->name('deletelike');
});
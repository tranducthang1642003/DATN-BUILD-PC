<?php

use Illuminate\Support\Facades\Route;
use Modules\Trangchu\App\Http\Controllers\TrangchuController;

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
    Route::resource('trangchu', TrangchuController::class)->names('trangchu');
});

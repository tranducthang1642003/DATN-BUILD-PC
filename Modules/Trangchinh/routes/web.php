<?php

use Illuminate\Support\Facades\Route;
use Modules\Trangchinh\App\Http\Controllers\TrangchinhController;

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
    Route::resource('trangchinh', TrangchinhController::class)->names('trangchinh');
});

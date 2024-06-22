<?php

use Illuminate\Support\Facades\Route;
use Modules\DetailProduct\App\Http\Controllers\DetailProductController;

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

Route::prefix('detailproduct')->group(function () {
    Route::get('/{id}', 'DetailProductController@index');
    Route::get('/{id}', 'DetailProductController@show');
});

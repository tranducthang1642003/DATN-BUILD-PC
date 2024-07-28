<?php

use Illuminate\Support\Facades\Route;
use Modules\BuildPC\App\Http\Controllers\BuildPCController;

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
    Route::get('buildpc', [BuildPCController::class,'index'])->name('buildpc');
    Route::post('/add-component', [BuildPCController::class, 'store'])->name('add-component');
    Route::post('/save-configuration', [BuildPCController::class, 'saveConfiguration'])->name('save-configuration');
    Route::delete('/buildpc/remove/{index}', 'BuildPCController@removeItemFromConfiguration')
    ->name('buildpc.remove');
    Route::post('/cart/add-multiple', [BuildPCController::class, 'addToCartMultiple'])->name('cart.add-multiple');
    Route::get('/buildpc/view/{id}', [BuildPCController::class, 'viewConfiguration'])->name('buildpc.view');
    Route::get('/configuration/download-image/{id}', [BuildPCController::class, 'downloadImage'])->name('configuration.download-image');
    
    Route::get('/buildpc/filter', 'BuildPCController@filter');

});

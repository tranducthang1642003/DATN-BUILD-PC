<?php

use Illuminate\Support\Facades\Route;
use Modules\Review\App\Http\Controllers\ReviewController;

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
    Route::post('/products/{product}/reviews', [ReviewController::class, 'store'])->name('products.reviews.store');
});

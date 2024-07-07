<?php

use Illuminate\Support\Facades\Route;
use Modules\Cart\App\Http\Controllers\CartController;

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
    Route::resource('cart', CartController::class)->names('cart');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/updateQuantity/{id}', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/apply-coupon', [CartController::class, 'applyCoupon'])->name('apply.coupon');

  

});

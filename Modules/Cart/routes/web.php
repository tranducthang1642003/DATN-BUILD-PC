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

Route::group(['middleware' => 'auth'], function () {
    Route::get('cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/updateQuantity/{id}', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/apply-coupon', [CartController::class, 'applyCoupon'])->name('apply.coupon');
    // web.php
    Route::post('/cart/add-to-cart', [CartController::class, 'addToCart'])->name('cart.addToCart');
    Route::get('/cart/get-cart-count', 'CartController@getCartCount')->name('cart.get-count');
    Route::get('/cart-items', [CartController::class, 'getCartItems'])->name('cart.getCartItems');
    // Trong file routes/web.php

    Route::post('/cart/apply-coupon', [CartController::class, 'applyCoupon'])->name('cart.applyCoupon');
});
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');

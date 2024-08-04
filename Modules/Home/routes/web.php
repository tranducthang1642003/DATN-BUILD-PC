<?php

use Modules\Home\App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Modules\Home\App\Http\Controllers\MenuController;


Route::group(['middleware' => 'user'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home'); // Home route
    Route::get('/category/{slug}', [HomeController::class, 'showCategory'])->name('category.show');
    Route::get('/products', [HomeController::class, 'productShow'])->name('productShow');
    Route::get('/product/{slug}', [HomeController::class, 'show'])->name('product.show');
    Route::get('/search', [HomeController::class, 'showSearch'])->name('product.search');
    Route::get('/search/suggestions', [HomeController::class, 'suggestions'])->name('search.suggestions');
    Route::get('/products/category/{slug}', [HomeController::class, 'showByCategory'])->name('products.by.category');

});
// Route::get('/', [MenuController::class, 'index'])->name('menus.index');

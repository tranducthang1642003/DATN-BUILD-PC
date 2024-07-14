<?php
use Modules\Home\App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Modules\Home\App\Http\Controllers\MenuController;


Route::group(['middleware' => 'user'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home'); // Home route
    Route::get('/category/{slug}', [HomeController::class, 'showCategory'])->name('category.show');
    Route::get('/product/{slug}', [HomeController::class, 'show'])->name('product.show');

});
// Route::get('/', [MenuController::class, 'index'])->name('menus.index');

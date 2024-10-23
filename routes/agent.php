<?php

use App\Http\Controllers\Agent\AgentController;
use App\Http\Controllers\Agent\PagesController;
use App\Http\Controllers\Agent\PosController;
use App\Http\Controllers\Agent\ProductController;
use Illuminate\Support\Facades\Route;
Route::middleware(['role:agent'])->group(function () {
    Route::controller(PagesController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        
    });
    Route::controller(PosController::class)->group(function () {
        Route::get('/point-of-sale', 'pos')->name('pos');
        Route::get('/user-info', 'userInfo')->name('user.info');
        Route::post('/check-out', 'addToCart')->name('add.cart');
        Route::post('/order-create', 'orderCreate')->name('create.order');
    });
    Route::controller(AgentController::class)->group(function () {
        
    });
    Route::controller(ProductController::class)->group(function () {
        Route::get('/product', 'product')->name('product');
        Route::get('/create/product', 'productCreate')->name('product.create');
        Route::post('/store/product', 'productStore')->name('product.store');
    });

});
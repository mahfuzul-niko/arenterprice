<?php

use App\Http\Controllers\Agent\PagesController;
use App\Http\Controllers\Agent\PosController;
use Illuminate\Support\Facades\Route;
Route::middleware(['role:agent'])->group(function () {
    Route::controller(PagesController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        
    });
    Route::controller(PosController::class)->group(function () {
        Route::get('/point-of-sale', 'pos')->name('pos');
        Route::get('/user-info', 'userInfo')->name('user.info');
        Route::post('/check-out', 'addToCart')->name('add.cart');
    });
});
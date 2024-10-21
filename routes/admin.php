<?php
use App\Http\Controllers\Admin\PagesController;
use Illuminate\Support\Facades\Route;
Route::middleware(['role:admin'])->group(function () {
    Route::controller(PagesController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/order', 'Order')->name('order');

    });

});
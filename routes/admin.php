<?php
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Agent\CustomerController;
use Illuminate\Support\Facades\Route;
Route::middleware(['role:admin'])->group(function () {
    Route::controller(PagesController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });
    Route::controller(CustomerController::class)->group(function () {
        Route::post('/change/customer/role/{user}', 'changeRole')->name('change.role');
    });

});
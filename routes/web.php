<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileContorller;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::redirect('/', '/login');

Route::get('/home', action: [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::controller(ProfileContorller::class)->group(function () {
        Route::get('/profile/edit', 'profile')->name('edit.profile');
        Route::post('/profile/update', 'profileUpdate')->name('update.profile');
        Route::post('/profile/passwordUpdate', 'passwordUpdate')->name('update.password');

    });
});
Route::middleware(['auth', 'role:agent,admin'])->group(function () {
    Route::controller(OrderController::class)->group(function () {
        Route::get('customer/order', 'Order')->name('customer.order');
        Route::get('customer/order/{unique_id}', 'singleOrder')->name('single.order');
        Route::post('customer/due/clear/{order}', 'makePamente')->name('due.clear');

    });

});
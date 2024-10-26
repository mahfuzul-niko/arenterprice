<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileContorller;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::redirect('/', '/login');

Route::get('/home', action: [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::controller(HomeController::class)->group(function () {
    Route::get('user/order', 'orderList')->name('user.order.list');
    Route::get('user/order/{unique_id}', 'singleOrder')->name('user.order.single');
   

});
Route::middleware('auth')->group(function () {
    Route::controller(ProfileContorller::class)->group(function () {
        Route::get('/profile/edit', 'profile')->name('edit.profile');
        Route::post('/profile/update', 'profileUpdate')->name('update.profile');
        Route::post('/profile/passwordUpdate', 'passwordUpdate')->name('update.password');

    });
});

 Route::get('/mail-view-user', function () {
        return view('mails.order-completed-user');
    });
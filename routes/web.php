<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::redirect('/', '/login');

Route::get('/home', action: [App\Http\Controllers\HomeController::class, 'index'])->name('home');


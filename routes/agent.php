<?php

use App\Http\Controllers\Agent\AgentController;
use App\Http\Controllers\Agent\CustomerController;
use App\Http\Controllers\Agent\PagesController;
use App\Http\Controllers\Agent\PosController;
use App\Http\Controllers\Agent\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
Route::middleware(['role:agent,admin'])->group(function () {
    Route::controller(PagesController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        
    });
    Route::controller(PosController::class)->group(function () {
        Route::get('/point-of-sale', 'pos')->name('pos');
        Route::post('/add-to-cart', 'addToCart')->name('add.cart');
        Route::post('/update-to-cart', 'updateToCart')->name('update.cart');
        Route::post('/remove-from-cart', 'removeFromCart')->name('remove.cart');
        Route::post('/add-paid-price', 'addPaidPrice')->name('add.pament');
        Route::post('/order-create', 'orderCreate')->name('create.order');


        Route::get('/user-info', 'userInfo')->name('user.info');
        // Route::post('/check-out', 'addToCart')->name('add.cart');
    });
    Route::controller(CustomerController::class)->group(function () {
        Route::get('/Customer', 'allCustomer')->name('customer');
        Route::get('/Customer/{id}', 'singleCustomer')->name('single.customer');
    });
    Route::controller(ProductController::class)->group(function () {
        Route::get('/product', 'product')->name('product');
        Route::get('/create/product', 'productCreate')->name('product.create');
        Route::get('/edit/product/{slug}', 'productEdit')->name('product.edit');
        Route::post('/store/product', 'productStore')->name('product.store');
        Route::post('/update/product/{product}', 'productUpdate')->name('product.update');
        Route::DELETE('/update/product/{product}', 'destroy')->name('product.delete');
    });
    Route::controller(OrderController::class)->group(function () {
        Route::get('customer/order', 'Order')->name('customer.order');
        Route::get('customer/order/{unique_id}', 'singleOrder')->name('single.order');
        Route::post('customer/due/clear/{order}', 'makePamente')->name('due.clear');
    });

});
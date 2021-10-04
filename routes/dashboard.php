<?php

use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\OrderController;

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    
    Route::resource('orders', OrderController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('orders.items', ItemController::class);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');
    


});


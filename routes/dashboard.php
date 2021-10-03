<?php

use App\Http\Controllers\Admin\OrderController;

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    
    Route::resource('orders', OrderController::class);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');
    


});


<?php

use Atom\Students\Http\Controllers\AdminController;

Route::group(['prefix' => 'api'], function() {

    Route::get('/arrivals', [AdminController::class, 'arrivals']);
    
    Route::middleware(['auth'])->group (function() {
        Route::post('/arrivals', [AdminController::class, 'newArrival']);
    });
    
    Route::post('/login', [AdminController::class, 'logIn']);
});
<?php

use Atom\Students\Http\Controllers\UserController;

Route::group(['prefix' => 'api'], function() {

    Route::get('/arrivals', [UserController::class, 'arrivals']);
    
    Route::middleware(['auth'])->group (function() {

        Route::get('/myarrivals', [UserController::class, 'myArrivals']);

        Route::post('/arrivals', [UserController::class, 'newArrival']);
    });
    
});
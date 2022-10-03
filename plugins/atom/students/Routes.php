<?php

use Atom\Students\Http\Controllers\AdminController;

Route::get('/api/arrivals', [AdminController::class, 'arrivals']);

Route::post('/api/arrivals', [AdminController::class, 'newArrival']);
<?php

use Atom\Students\Models\Student;
use Carbon\Carbon;
use Atom\Students\Http\Controllers\AdminController;

Route::get('/api/arrivals', [AdminController::class, 'arrivals']);

Route::post('/api/arrivals', [AdminController::class, 'newArrival']);
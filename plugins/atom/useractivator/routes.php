<?php

use Atom\UserActivator\Http\Controllers\ActivationController;

Route::group(['prefix' => 'api'], function() {

    Route::post('/activate', [ActivationController::class, 'activate']);
    
});
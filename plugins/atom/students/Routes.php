<?php

use Atom\Students\Models\Student;

Route::get('/api/get/all', function() {
    return Student::all();
});

Route::get('/api/new-arrival', function() {

    date_default_timezone_set('Europe/Bratislava');
    $datetime = date('Y-m-d H:i:s'); 

    $Student = new Student;
    $Student->fill(input());
    $Student->arrival_date = $datetime;
    $Student->timestamps = $datetime;
    $Student->save(); 

    return "Arivall added $Student";
    
});

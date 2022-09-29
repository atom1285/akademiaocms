<?php

use Atom\Students\Models\Student;

    Student::extend(function($Student) {
        $Student->bindEvent('model.afterSave', function() {
            //tato funkcia sa spusti po pridani noveho prichodu
            
            date_default_timezone_set('Europe/Bratislava');
            $datetime = date('Y-m-d H:i:s'); 

            echo $datetime.'<br>';
        });
    } );
<?php

namespace Atom\FaceRecognition\Classes\Extend;

use Atom\Students\Models\Student;
use Carbon\Carbon;

class StudentExtend{

    public static function afterSave() {

        Student::extend(function($Student) {
            $Student->bindEvent('model.afterSave', function() {
                //tato funkcia sa spusti po pridani noveho prichodu
                
                date_default_timezone_set('Europe/Bratislava');

                echo now().'<br>';
            });
        } );

    }
    
}

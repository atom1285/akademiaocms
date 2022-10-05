<?php

namespace Atom\FaceRecognition\Classes\Extend;

use Atom\Students\Models\Arrival;
use Carbon\Carbon;

class StudentExtend{

    public static function afterSave_echoCurrentDate() {

        Arrival::extend(function($arrival) {
            $arrival->bindEvent('model.afterSave', function() {
                //tato funkcia sa spusti po pridani noveho prichodu
                
                date_default_timezone_set('Europe/Bratislava');

                // echo now().'<br>';
            });
        } );

    }
}
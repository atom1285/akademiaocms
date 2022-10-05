<?php

namespace Atom\Students\Classes\Extend;

use RainLab\User\Models\User;

class UserExtend{

    public static function extendUser_AddArrivals() {
        
        User::extend(function($model) {
            
            // $user->hasOne = [
            //     'firstarrival' => ['Atom\Students\Models\Arrival', 'order' => 'arrival_date'],
            // ];
            
            $model->hasMany['arrivals'] = [
                    'Atom\Students\Models\Arrival', 
                    'order' => 'id desc',
                    'conditions' =>'id = 3'
                ];    
            });
    }
}
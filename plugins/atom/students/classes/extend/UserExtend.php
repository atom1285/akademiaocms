<?php

namespace Atom\Students\Classes\Extend;

use RainLab\User\Models\User;
use Event;

class UserExtend{

    public static function extendUser_AddArrivals() {
        
        User::extend(function($model) {
            
            // $user->hasOne = [
            //     'firstarrival' => ['Atom\Students\Models\Arrival', 'order' => 'arrival_date'],
            // ];
            
            $model->hasMany['arrivals'] = [
                    'Atom\Students\Models\Arrival', 
                    'order' => 'id desc'
                ];    
            });
    }

    public static function extendUser_AddColumns() {

        Event::listen('backend.list.extendColumns', function ($listWidget) {
            
            // Only for the User controller
            if (!$listWidget->getController() instanceof \Rainlab\User\Controllers\Users) {
                return;
            }
            
            // Only for the User model
            if (!$listWidget->model instanceof \Rainlab\User\Models\User) {
                return;
            }
            
            // Add an column
            $listWidget->addColumns([
                'arrival' => [
                    'label' => 'Arrivals',
                    'invisible' => false,
                    'relation' => 'arrivals',
                    'select' => 'arrival_date'
                    ]
                ]);
        });
    }

    public static function extendUser_AddFields() {

        Event::listen('backend.form.extendFields', function ($fieldWidget) {
            
            // Only for the User controller
            if (!$fieldWidget->getController() instanceof \Rainlab\User\Controllers\Users) {
            return;
            }
            
            // Only for the User model
            if (!$fieldWidget->model instanceof \Rainlab\User\Models\User) {
                return;
            }

            // Add an field
            $fieldWidget->addFields([
                    'arrivals' => [
                        'label' => 'Arrivals',
                        'tab' => 'Arrivals',
                        'type' => 'relation',
                        'select' => 'arrival_date'
                    ]
                ]);
        });

    }
}
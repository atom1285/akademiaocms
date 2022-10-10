<?php

namespace Atom\Students\Classes\Extend;

use RainLab\User\Models\User;
use Rainlab\User\Controllers\Users as UsersController;
use Atom\Students\Models\Arrival;
use Event;

class UserExtend{

    public static function extendUser_AddArrivals() {
        
        User::extend(function($model) {
            
            $model->hasMany['arrivals'] = [
                    'Atom\Students\Models\Arrival', 
                    'order' => 'id'
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
            if ($fieldWidget->context == 'preview') {
                $fieldWidget->addFields([
                    'arrivals' => [
                        'label' => 'Arrivals',
                        'type' => 'partial',
                        'path' => '$/atom/students/controllers/students/_field_arrivals_preview.htm',
                        'tab' => 'Arrivals'
                    ]
                ]);
            }
            else {                
                $fieldWidget->addFields([
                    'arrivals' => [
                        'label' => 'Arrivals',
                        'tab' => 'Arrivals',
                        'type' => 'partial',
                        'path' => '$/atom/students/controllers/students/_field_arrivals.htm'
                        ]
                    ]);
                }
        });

    }

    public static function extendUserController_AddRelationManager() {
        UsersController::extend(function($controller) {

            $controller->relationConfig = '$/atom/students/config/config_user_relation.yaml';
            array_push($controller->implement, 'Backend.Behaviors.RelationController');
        });
    }
}
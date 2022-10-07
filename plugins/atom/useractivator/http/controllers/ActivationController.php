<?php

namespace Atom\UserActivator\Http\Controllers;

use Carbon\Carbon;
use RainLab\User\Models\User;

class ActivationController {

    function activate() {

        $user = User::where('email', post('email'))->first();

        if ($user && $user->activation_code == post('code')) {
            $user->is_activated = true;
            $user->activated_at = Carbon::now();
            $user->save();

            return 'user has been activated';
        }
        elseif ($user) {
            return 'activation code is not correct';
        }
        else {
            return 'user not found';
        }
    }

}
<?php

namespace Atom\UserActivator\Http\Controllers;

use Carbon\Carbon;
use RainLab\User\Models\User;
use ApplicationException;

class ActivationController {

    function activate() {

        $user = User::where('email', post('email'))->firstOrFail();

        if ($user->activation_code != post('code')) {
            throw new ApplicationException("Activation code incorrect");
            return;
        }

        $user->is_activated = true;
        $user->activated_at = now();
        $user->save();

        return 'user has been activated';
        
    }

}
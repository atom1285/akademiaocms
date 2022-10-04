<?php
namespace Atom\Students\Http\Controllers;

use Illuminate\Routing\Controller;
use Atom\Students\Models\Student;
use Carbon\Carbon;
use Rainlab\User\Facades\Auth;
use LibUser\Userapi\Models\User;

class AdminController extends Controller 
{

    public function arrivals() {
        return Student::all();
    }

    public function newArrival() {
        
        // Auth::authenticate([
        //     'login' => 'admin@admin.ad',
        //     'password' => 'admin123'
        // ]);

        return auth()->user;

        $Student = new Student;
        $Student->fill(post());
        $Student->user_id = $user->id;
        $Student->arrival_date = now();
        $Student->timestamps = now();
        $Student->save(); 

        return $Student;
    } 

    public function logIn() {
        $user = Auth::authenticate([
            'login' => post('login'),
            'password' => post('password')
        ], true);
        Auth::login($user, true);

        return $user;
    }
}
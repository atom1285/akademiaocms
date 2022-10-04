<?php
namespace Atom\Students\Http\Controllers;

use Illuminate\Routing\Controller;
use Atom\Students\Models\Student;
use Carbon\Carbon;
use Rainlab\User\Facades\Auth;
use LibUser\Userapi\Models\User;
use Atom\Students\Http\Resources\UserResource;

class UserController extends Controller 
{

    public function arrivals() {
        return Student::all();
    }
    
    public function myArrivals() {
        Event::fire('UserRequestedArrivals');
        
        $data = Student::where('user_id', auth()->user()->id)->orderBy('id')->get();
        return $data;
    }

    public function newArrival() {

        $Student = new Student;
        $Student->fill(post());
        $Student->user_id = auth()->user()->id;
        $Student->arrival_date = now();
        $Student->timestamps = now();
        $Student->save(); 

        return $Student;
    }
}
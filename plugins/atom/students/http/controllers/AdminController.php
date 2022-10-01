<?php
namespace Atom\Students\Http\Controllers;

use Illuminate\Routing\Controller;
use Atom\Students\Models\Student;
use Carbon\Carbon;

class AdminController extends Controller 
{

    public function hello() {
        return 'hello there';
    }

    public function arrivals() {
        return Student::all();
    }

    public function newArrival() {

        $Student = new Student;
        $Student->fill(post());
        $Student->arrival_date = now();
        $Student->timestamps = now();
        $Student->save(); 

        return $Student;
    } 

}
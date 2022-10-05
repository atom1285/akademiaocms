<?php
namespace Atom\Students\Http\Controllers;

use Illuminate\Routing\Controller;
use Atom\Students\Models\Arrival;
use Carbon\Carbon;
use Rainlab\User\Facades\Auth;
use LibUser\Userapi\Models\User;
use Atom\Students\Http\Resources\UserResource;
use Event;

class UserController extends Controller 
{

    public function arrivals() {

        return UserResource::collection( Arrival::all() );
    }
    
    public function myArrivals() {
        
        Event::fire('UserRequestedArrivals');
        
        $data = Arrival::where('user_id', auth()->user()->id)->orderBy('id')->get();

        return UserResource::collection( $data );
    }

    public function newArrival() {

        $Arrival = new Arrival;
        $Arrival->name = post('name');
        $Arrival->user = auth()->user();
        $Arrival->arrival_date = now();
        $Arrival->timestamps = now();

        $Arrival->save(); 
        
        return UserResource::make( $Arrival );
    }
}
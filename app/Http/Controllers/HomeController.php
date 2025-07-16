<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        $events = Event::get();
        if(Auth::check()){
            $user = Auth::user();
            return view("pages.home.home", [
                "user"=> $user,
                "events"=> $events
            ]);
        }


        return view("pages.home.home",[
            "events"=> $events
        ]);

        
    }
}

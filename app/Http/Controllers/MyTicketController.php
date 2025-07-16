<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyTicketController extends Controller
{
    public function index(){
        return view("pages.myticket.myticket");
    }

    public function ticketOwner(){
        return view("pages.myticket.detail");
    }
}

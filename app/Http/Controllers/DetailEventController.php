<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailEventController extends Controller
{
    public function index(){
        return view("pages.datail-event.detail");
    }
}

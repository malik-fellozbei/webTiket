<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){
        return view("pages.checkout.payment");
    }

    public function paymentSuccess(){
        return view("pages.checkout.payment-success");
    }

    public function paymentFailed(){
        return view("pages.checkout.payment-failed");
    }
}

<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyTicketController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;


// Public Route
Route::get("/", [HomeController::class,"index"])->name('home');
Route::get("/blog", [BlogController::class,"index"])->name('blog');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.detail');
Route::get("/event", [EventController::class,"index"])->name('event');
Route::get('/event/{event:slug}', [EventController::class, 'show'])->name('event.detail');
Route::get('/event/{event:slug}/tickets', [TicketController::class, 'index'])->name('ticket.index');


Route::middleware('auth')->group(function () {
    Route::get("/myticket", [MyTicketController::class,"index"])->name('myticket');
    Route::get("/ticket-owner", [MyTicketController::class,"ticketOwner"])->name('ticket-owner');
    Route::get("/checkout", [CheckoutController::class,"index"])->name('checkout');
    Route::get("/payment-success", [CheckoutController::class,"paymentSuccess"])->name('payment-success');
    Route::get("/payment-failed", [CheckoutController::class,"paymentFailed"])->name('payment-failed');
    
});

// Auth Route
Route::get("/login", [AuthController::class, 'login'])->name("login");
Route::get("/register", [AuthController::class, 'register'])->name("register");
Route::get("/logout", [AuthController::class, 'logout'])->name("logout");
Route::post("/authenticate", [AuthController::class,"authenticate"])->name("loginAccount");
Route::post("/createAccount", [AuthController::class,"createAccount"])->name("createAccount");




<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function authenticate(Request $request): RedirectResponse
    {
        // Get request and validate
        $cridential = $request->validate([
            "email" => ['required', 'email:dns'],
            "password" => ['required'],
        ]);

        // Check cridential
        if (Auth::attempt($cridential)) {
            $request->session()->regenerate();
            return redirect()->route('home')
                ->with('toast', ['message' => 'Login success<br>Welcome', 'type' => 'success']);
        }

        // if error return back with messages
        return back()->with('toast', ['message' => 'Account not found<br>please check your email and password', 'type' => 'danger']);
    }

    public function register()
    {
        return view("auth.register");
    }

    public function createAccount(Request $request): RedirectResponse
    {
        $cridential = $request->validate([
            "name"     => ["required", "string", 'min:3'],
            "email"    => ['required', 'email:dns', 'unique:users,email'],
            "password" => ['required', 'min:8', 'confirmed'],
        ]);

        $user =  User::create([
            'name' => $cridential['name'],
            'email' => $cridential['email'],
            'password' => bcrypt($cridential['password']),
        ]);

        Auth::login($user);

        return redirect()->route('home')
            ->with('toast', ['message' => 'Account created<br>Welcome', 'type' => 'success']);
    }

    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('home')
        ->with('toast', ['message' => 'logout success', 'type' => 'success']);
    }
}

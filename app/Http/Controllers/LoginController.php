<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate (Request $req){
        $credentials = $req->only(['username', 'email', 'password']);

        if(Auth::attempt($credentials)){
            $req->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withErrors(['email' => 'Email atau password salah!']);
    }

    public function logout(Request $req){
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect()->route('home');
    }
}
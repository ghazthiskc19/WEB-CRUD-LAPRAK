<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate (Request $req){
        $req->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:3'],
        ]);

        $credentials = $req->only(['username', 'email', 'password']);

        if(Auth::attempt($credentials)){
            $req->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withInput()->withErrors(['login' => 'Username, email, atau password salah!']);
    }

    public function logout(Request $req){
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect()->route('home');
    }
}
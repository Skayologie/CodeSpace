<?php

namespace App\Http\Controllers\Auth;

class AuthController
{
    public function register(){
        return view("auth.register");
    }
    public function login(){
        return view('auth.login');
    }
    public function forgetpassword(){
        return view('auth.forgot-password');
    }

    public function logout(){
        session()->remove("user");
        return redirect()->to("login.index");
    }
}

<?php

namespace App\Http\Controllers\Auth;

class PasswordController
{
    public function index(){
        return view('auth.forgot-password');
    }
}

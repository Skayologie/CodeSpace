<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

class LoginController
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        $data = $request->input();
        try{

        }catch
    }
}

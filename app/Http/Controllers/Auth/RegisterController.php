<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;

class RegisterController
{
    public function index(){
        return view("auth.register");
    }
    public function store(RegisterUserRequest $request){
        $data = $request->validated();
        $data["bio"] = "Bio";
        try {
            $password = $data["password"];
            $Hashedpassword = password_hash($password,PASSWORD_ARGON2ID);
            $data["password"] = $Hashedpassword;
            User::create($data);
            return redirect()->to(route("login.index"))->with('success',"Account has created successfully .");
        }catch(\Exception $e){
            return redirect()->to(route("register.index"))->with('error',$e->getMessage());
        }
    }
}

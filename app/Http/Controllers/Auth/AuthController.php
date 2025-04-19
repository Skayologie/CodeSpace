<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use DateTime;

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

    public function CheckToken($token){
        try {
            $user = User::where("token_verification","=",$token)->first();
            if ($user != null){
                $now = (new DateTime())->format('Y-m-d H:i:s');
                $user->update([
                    "email_verified_at"=>$now,
                    "token_verification"=>null,
                ]);
                return redirect()->to(route("login.index"))->with('success',"Account has validated successfully . Now we can enjoy together !) ");
            }else{
                return redirect()->to(route("login.index"))->with('error',"Token invalid !");

            }
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }

    public function logout(){
        session()->remove("user");
        session()->remove("role");
        return redirect()->to(route("login.index"));
    }
}

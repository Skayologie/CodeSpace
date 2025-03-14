<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        $data = $request->input();
        try{
            $result = User::where("email","=",$data['email'])->first();
            if ($result){
                $Hashedpassword = $result->password;
                $password = $data["password"];
                $verifyPassword = password_verify($password,$Hashedpassword);
                if ($verifyPassword){
                    dd("You are a good user ");
                }else{
                    return redirect()->to(route("login.index"))->with('error',"Incorrect Password , Do you want to change password ?? ");
                }
            }else{
                return redirect()->to(route("login.index"))->with('error',"No account registred with this email , Do you want to create account ?? ");
            }
        }catch(\Exception $e){
            return redirect()->to(route("login.index"))->with('error',$e->getMessage());
        }
    }
}

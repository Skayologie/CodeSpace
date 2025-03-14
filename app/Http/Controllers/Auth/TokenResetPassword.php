<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;

class TokenResetPassword
{
    public function index(){
        if (session()->has("tokenChangePassword")){
            return view('auth.tokenVerification');
        }
        return redirect()->to(route("login.index"));
    }
    public function CheckTokenCompatibility(Request $request){
        $data = $request->validate([
           'tokenVerification'=>'string|required|min:8|max:8'
        ]);
        try {
            $token = $data["tokenVerification"];
            $result = User::where("remember_token","=",$token)->first();
            if ($result != null){
                session(['tokenChangePassword' => $token]);
                return redirect()->to(route("Password.updateThePassword"));
            }else{
                return back()->with('error',"The Token Is Invalid !");
            }
        }catch(\Exception $e){
            return redirect()->to(route("ResetPass.index"))->with('error',$e->getMessage());

        }
    }

}

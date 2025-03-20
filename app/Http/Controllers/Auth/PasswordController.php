<?php

namespace App\Http\Controllers\Auth;

use App\Mail\PasswordChangedNotification;
use App\Mail\SendTokenResetPassword;
use App\Models\User;
use App\Repository\Eloquent\PasswordRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PasswordController
{
    protected $PasswordRepository;
    public function __construct(PasswordRepository $PasswordRepository){
        $this->PasswordRepository = $PasswordRepository;
    }

    public function index(){
        return view('auth.forgot-password');
    }

    public function changingThePassword(Request $request){
        $token = $this->PasswordRepository->check_session_for_token();
        $data = $request->validate([
            "password"=>"string|required|min:8",
            "passwordConfirm"=>"string|required|min:8"
        ]);
        try {
            if ($token != null){
                if ($data["password"] != $data["passwordConfirm"]){
                    return back()->with('error','The Password doesnt match !');
                }else{
                    $password = $data["password"];
                    $result = $this->PasswordRepository->get_with_token($token);
                    if ($result != null){
                        $hashedPassword = $this->PasswordRepository->hashPassword($password);
                        $updated = $this->PasswordRepository->update_password($result,$hashedPassword);
                        if ($updated){
                            $email = env("DEFAULT_RECEIVER") === null ? $result["email"] : env("DEFAULT_RECEIVER");
                            Mail::to($email)->send(new PasswordChangedNotification());
                            session()->remove("tokenChangePassword");
                            return redirect()->to(route("login.index"))->with("success","The Password has been updated successfully !");
                        }else{
                            return back()->with("error","Failed to update the password !");
                        }
                    }else{
                        return redirect()->to(route("login.index"))->with("error","Page Not Accessible !");
                    }
                }
            }else{
                return redirect()->to(route("login.index"))->with("error","Page Not Accessible !");
            }
        }catch(\Exception $e){
            return back()->with("error",$e->getMessage());
        }
    }

    public function store(Request $request){
        $data = $request->validate([
            "email"=>"email|required"
        ]);
        try {
            $tokenResetPassword = $this->randomPassword();
            $result = $this->PasswordRepository->get_by_email($data["email"]);
            if ($result){
                $this->PasswordRepository->update_token($result , $tokenResetPassword);
                $email = env("DEFAULT_RECEIVER") === null ? $result["email"] : env("DEFAULT_RECEIVER");
                Mail::to($email)->send(new SendTokenResetPassword($tokenResetPassword));
                session()->put("tokenChangePassword",$tokenResetPassword);
                return redirect()->to(route("ResetPass.index"))->with('success',"We Send The Code Token To Your Email .");
            }else{
                return redirect()->to(route("forget_password.index"))->with('error',"This email is not exist");
            }
        }catch(\Exception $e){
            return redirect()->to(route("forget_password.index"))->with('error',$e->getMessage());
        }
    }



    public function updateThePassword(){
        if (session()->has("tokenChangePassword")){
            return view("auth.confirm-password");
        }
        return redirect()->to(route("login.index"));
    }

    public function  randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
}

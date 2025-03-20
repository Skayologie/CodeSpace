<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Traits\Hashable;
use Illuminate\Support\Facades\Hash;

class PasswordRepository
{
    use Hashable;

    public function check_session_for_token() : null | string
    {
        return session()->get('tokenChangePassword');
    }

    public function get_with_token($token) : null | object
    {
        return User::where("remember_token","=",$token)->first();
    }
    public function update_password(User $user,$password )
    {
        return $user->update([
            "password"=>$password,
            "remember_token"=>null
        ]);
    }

    public function get_by_email($email){
        return User::where("email","=",$email)->first();
    }

    public function update_token(User $user , $tokenResetPassword){
        return $user->update([
            "remember_token"=>$tokenResetPassword
        ]);
    }
}

<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\Contracts\LoginInterface;
use Illuminate\Support\Facades\Hash;

class LoginRepository implements LoginInterface
{

    public function findByEmail($email)
    {
        return User::where("email","=",$email)->first();
    }

    public function verifyPassword($password, User $user)
    {
        return Hash::check($password,$user->password);
    }
}

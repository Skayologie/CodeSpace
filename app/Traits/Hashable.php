<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

trait Hashable
{
    public function hashPassword($password){
        return Hash::make($password);
    }
    public function verifyPassword($password, User $user)
    {
        return Hash::check($password,$user->password);
    }
}

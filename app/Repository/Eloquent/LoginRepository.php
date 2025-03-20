<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\Contracts\LoginInterface;
use App\Traits\Hashable;
use Illuminate\Support\Facades\Hash;

class LoginRepository implements LoginInterface
{
    use Hashable;

    public function findByEmail($email)
    {
        return User::where("email","=",$email)->first();
    }

}

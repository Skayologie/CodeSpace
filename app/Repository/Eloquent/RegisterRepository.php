<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\Contracts\LoginInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterRepository
{

    public function hashPassword($password){
        return Hash::make($password);
    }
    public function create(array $data){
        return User::create($data);
    }

    public function assignRole($user_id,$role_id){
        DB::table('user_has_role')->insert([
            'user_id' => $user_id,
            'role_id' => $role_id,
        ]);
    }
}

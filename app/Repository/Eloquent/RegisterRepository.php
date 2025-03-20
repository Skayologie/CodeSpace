<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\Contracts\LoginInterface;
use App\Traits\Hashable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterRepository
{
    use Hashable;

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

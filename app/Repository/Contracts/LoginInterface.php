<?php

namespace App\Repository\Contracts;

use App\Models\User;

interface LoginInterface
{
    public function findByEmail($email);
    public function verifyPassword($password , User $user);
}

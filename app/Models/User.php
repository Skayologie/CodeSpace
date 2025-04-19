<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    protected $table = "users";
    protected $fillable = [
        "username",
        "email",
        "password",
        "profilePicture",
        "bio",
        "github",
        "linkedin",
        "twitter",
        "remember_token",
        "token_verification",
        "email_verified_at"
    ];

    public function roles(){
        return $this->belongsToMany(Role::class,"user_has_role");
    }
}

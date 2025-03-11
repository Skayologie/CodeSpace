<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetRequest extends Model
{
    /** @use HasFactory<\Database\Factories\PasswordResetRequestFactory> */
    use HasFactory;
    protected $fillable = [
        "email",
        "token",
        "expires_at"
    ];

}

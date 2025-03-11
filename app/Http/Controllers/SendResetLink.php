<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PasswordResetRequest;

class SendResetLink extends Controller
{
    //
    public function sendResetLink(Request $request){
        // $data = $request->validate(['email' => 'required|email|exists:users,email']);

        // Generate a token
        // $token = Str::random(60);
        echo("hello");
        // Store the reset request in your custom table
        PasswordResetRequest::updateOrCreate(
            ['email' => $request->email],
            ['token' => $token, 'expires_at' => Carbon::now()->addMinutes(30)]
        );
    
        // Send the reset link (you can use a notification here)
        // return response()->json(['message' => 'Reset link sent'], 200);

    }
}

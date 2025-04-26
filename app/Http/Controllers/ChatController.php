<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    //
    public function index(){
        return view('Chat.index');
    }
    public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        $user = auth()->user();

        event(new MessageSent());

        return ['status' => 'Message Sent!'];
    }
}

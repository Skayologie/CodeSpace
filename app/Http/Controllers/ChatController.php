<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    //
    public function index(){
        $UserID = session("user")->id;
        $conversations = Message::where(function ($query) use ($UserID) {
            $query->where('sender_id', $UserID)
                ->orWhere('receiver_id', $UserID);
        })
            ->join('users', function($join) use ($UserID) {
                $join->on('users.id', '=', DB::raw("CASE WHEN messages.sender_id = $UserID THEN messages.receiver_id ELSE messages.sender_id END"));
            })
            ->selectRaw('
    users.id as friend_id,
    users.username as friend_username,
    users.profilePicture as profile_picture,
    (
        SELECT content FROM messages m2
        WHERE (m2.sender_id = users.id AND m2.receiver_id = ?)
           OR (m2.sender_id = ? AND m2.receiver_id = users.id)
        ORDER BY m2.created_at DESC
        LIMIT 1
    ) as last_message_content,
    MAX(messages.created_at) as last_message_at
', [$UserID, $UserID])
            ->groupBy('users.id', 'users.username','users.profilePicture')
            ->orderBy('last_message_at', 'desc')
            ->get();
        return view('Chat.index',[
            "conversations"=>$conversations
        ]);
    }
    public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        $user = auth()->user();


        return ['status' => 'Message Sent!'];
    }
    public function show($friendId){
        $UserID = session('user')->id;
        $friend = User::findOrFail($friendId);
        $conversations = Message::where(function ($query) use ($UserID) {
            $query->where('sender_id', $UserID)
                ->orWhere('receiver_id', $UserID);
        })
            ->join('users', function($join) use ($UserID) {
                $join->on('users.id', '=', \DB::raw("CASE WHEN messages.sender_id = $UserID THEN messages.receiver_id ELSE messages.sender_id END"));
            })
            ->selectRaw('
    users.id as friend_id,
    users.username as friend_username,
    users.profilePicture as profile_picture,
    (
        SELECT content FROM messages m2
        WHERE (m2.sender_id = users.id AND m2.receiver_id = ?)
           OR (m2.sender_id = ? AND m2.receiver_id = users.id)
        ORDER BY m2.created_at DESC
        LIMIT 1
    ) as last_message_content,
    MAX(messages.created_at) as last_message_at
', [$UserID, $UserID])
            ->groupBy('users.id', 'users.username','users.profilePicture')
            ->orderBy('last_message_at', 'desc')
            ->get();
        $messages = Message::where(function($query) use ($UserID, $friendId) {
            $query->where('sender_id', $UserID)
                ->where('receiver_id', $friendId);
        })->orWhere(function($query) use ($UserID, $friendId) {
            $query->where('sender_id', $friendId)
                ->where('receiver_id', $UserID);
        })->orderBy('created_at', 'asc')->get();

        return view('Chat.chat',[
            "messages"=>$messages,
            "conversations"=>$conversations,
            "friend"=>$friend
        ]);

    }
}

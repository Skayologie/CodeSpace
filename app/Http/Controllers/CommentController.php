<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request,$post_id)
    {
        //
        try {
            $user_id = session()->get('user')->id;
            $data = $request->validated();
            $data["post_id"] = $post_id;
            $data["user_id"] = $user_id;
            Comment::create($data);
            return response()->json([
                "message"=>"Your Comment has been sent successfully"
            ]);

        }catch(\Exception $exception){
            return response()->json($exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
        try{
            if ($comment){
                $comment->delete();
                return response()->json([
                    "message"=>"Comment has been deleted successfully"
                ]);
            }else{
                return response()->json([
                    "message"=>"Comment not found"
                ]);
            }

        }catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }
}

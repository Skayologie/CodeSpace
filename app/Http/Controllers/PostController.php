<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Services\PostService;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private PostService $postService;
    public function __construct(PostService $postService){
        $this->postService = $postService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $Categories = Category::all();
        return view("Post.index",[
            "Categories"=>$Categories
        ]);
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
    public function store(StorePostRequest $request)
    {
        //
        try {
            $data = $request->validated();
            $result = $this->postService->StoreService($data);
//            if ($result){
//                return redirect()->to(route("/"))->with("success","Post has been created successfully .");
//            }else{
//                return redirect()->to(route("Post.index"))->with("error","Failed , The Post hasn't created , Try again .");
//            }
            dd($data);
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($username,$postId)
    {
        //
        try {
            $posts = Post::all();
            return view("Post.SinglePost",[
                "posts"=>$posts
            ]);
        }catch(\Exception $e){

        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}

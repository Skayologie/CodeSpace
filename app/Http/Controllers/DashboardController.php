<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($type)
    {
        if ($type === "topPosts"){
            $Get_Top_Posts = DB::select('SELECT categories.name AS categoryName , users.* , posts.*  FROM `posts` JOIN users ON users.id = posts.userId JOIN categories ON categories.id = posts.categoryID WHERE posts.status = "published" ORDER BY views DESC, reactions DESC, up_votes DESC LIMIT 5');
            return view("Admin.tables.".$type,[
                'data'=>$Get_Top_Posts
            ]);
        }elseif ($type === "topUsers"){
            $Get_Top_Users = DB::select('SELECT
                users.id AS userId,
                users.username,
                COUNT(posts.id) AS TotalPost,
                MAX(posts.views) AS MaxViews,
                users.created_at
                FROM posts
                JOIN users ON users.id = posts.userId
                GROUP BY users.id, users.username, users.created_at
                ORDER BY MaxViews DESC, TotalPost DESC
                LIMIT 5');
            return view("Admin.tables.".$type,[
                'data'=>$Get_Top_Users
            ]);
        }
    }

    public function Active_Users_Monthly(){
        try {

            $queryResult = DB::select("SELECT COUNT(id) UsersActive , Month(users.last_login_at) AS Month FROM `users` WHERE users.last_login_at IS NOT NULL GROUP BY Month");
            return response()->json($queryResult);
        }catch(\Exception $e){
            return response()->json([
               "message"=>$e->getMessage()
            ]);
        }
    }

    public function Get_Categories_Stats(){
        try {
            $queryResult = DB::select("SELECT  COUNT(posts.categoryID) AS Count, categories.name
FROM `posts`
JOIN `categories` ON posts.categoryID = categories.id
GROUP BY posts.categoryID, categories.name
ORDER BY Count DESC LIMIT 6");
            return response()->json($queryResult);
        }catch(\Exception $e){
            return response()->json([
                "message"=>$e->getMessage()
            ]);
        }
    }

    public function Get_Top_Posts(){
        return response()->json([
            'content' => File::get(resource_path("tables/forms/tag.blade.php"))
        ]);
    }
}

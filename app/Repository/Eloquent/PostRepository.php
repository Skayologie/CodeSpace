<?php

namespace App\Repository\Eloquent;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class PostRepository
{
    public function Store_tags(Post $post , $tags){
        try {
            $count = 0;
            foreach ($tags as $tag){
                DB::table('post_tags')->insert([
                    'post_id' => $post->id,
                    'tag_id' => $tag,
                ]);
                $count++;
            }
            if (count($tags) === $count){
                return true;
            }else{
                return false;
            }
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
    public function StorePost($data){
        try {
            $type = ($_GET["Type"] === "content-texte") ? "text" :
                (($_GET["Type"] === "content-image") ? "image" :
                    (($_GET["Type"] === "content-link") ? "lien" : "null"));
            $post = Post::create([
                "userId"=>session()->get("user")->id,
                "title"=>$data["title"],
                "content"=>$data["content"],
                "categoryID"=>$data["category"],
                "type"=>$type,
                "views"=>0,
                "down_votes"=>0,
                "up_votes"=>0,
                "reactions"=>0
            ]);
            return $post;
        }catch(\Exception $e){
            return false;
        }
    }
}

<?php

namespace App\Repository\Eloquent;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class PostRepository
{
    public function Store_tags(Post $post , $tags){
        try {
            foreach ($tags as $tag){
                DB::table('post_tags')->insert([
                    'post_id' => $post->id,
                    'tag_id' => $tag,
                ]);
            }
            return true;
        }catch(\Exception $e){
            return false;
        }
    }
    public function StorePost($request){
        try {
            Post::create();
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}

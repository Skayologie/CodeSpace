<?php


namespace App\Services;


use App\Models\Post;
use App\Repository\Eloquent\PostRepository;

class PostService
{
    private PostRepository $postRepository;
    public function __construct(PostRepository $postRepository){
        $this->postRepository = $postRepository;
    }

    public function Get_tags($data){
        $exploded = explode(",",$data["allTags"]);
        $tags = [];
        foreach ($exploded as $number){
            if ($number != ""){
                $tags[] = $number;
            }
        }
        return $tags;
    }

    public function Store_tags(Post $post ,$tags){
        return $this->postRepository->Store_tags($post,$tags);
    }

    public function StoreService(Post $post , $data){
        $tags = $this->Get_tags($data);
        $this->Store_tags($post,$tags);
    }
}

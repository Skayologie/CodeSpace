<?php


namespace App\Services;


use App\Models\Post;
use App\Repository\Contracts\PostInterface;
use App\Repository\Eloquent\PostRepository;

class PostService
{
    protected PostInterface $postRepository;
    public function __construct(PostInterface $IPostRepository){
        $this->postRepository = $IPostRepository;
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

    public function StoreService($data){
        try {
            $post = $this->postRepository->StorePost($data);
            if ($post){
                $tags = $this->Get_tags($data);
                $addTags = $this->postRepository->Store_tags($post,$tags);
                if ($addTags){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }catch(\Exception $e){
            return $e->getMessage();
        }

    }
}

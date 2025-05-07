<?php

namespace App\Repository\Contracts;

use App\Models\Post;

interface PostInterface
{
    public function Store_tags(Post $post , $tags);
    public function StorePost($data);
}

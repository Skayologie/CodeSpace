<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = "comments";
    protected $fillable = [
        "post_id",
        "user_id",
        "comment",
    ];
    public function user(){
        return $this->hasOne(User::class,"id","user_id");
    }
    public function post(){
        return $this->hasOne(Post::class,"id","post_id");
    }
}

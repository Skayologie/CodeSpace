<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    protected $table = "posts";
    protected $fillable = [
        "title",
        "content",
        "multimedia",
        "categoryID",
        "userId",
        "views",
        "reactions",
        "down_votes",
        "up_votes",
    ];
    public function user(){
        return $this->hasOne(User::class,"id","userId");
    }
    public function comments(){
        return $this->hasMany(Comment::class,"post_id","id");
    }
}

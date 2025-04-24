<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CommunityMembers extends Pivot
{
    protected $table = "community_members";
    protected $fillable = [
        "communityID",
        "userId",
        "role",
        "status"
    ];
    public function user(){
        return $this->hasOne(User::class,"id","userId");
    }
    public function communities() {
        return $this->belongsToMany(Community::class, 'Communities', 'userID', 'communityID');
    }
}

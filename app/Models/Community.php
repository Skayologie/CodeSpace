<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    /** @use HasFactory<\Database\Factories\CommunityFactory> */
    use HasFactory;
    protected $fillable = [
        "name",
        "description",
        "banner",
        "icon",
        "type",
        "community_rules",
        "status"
    ];


    public function themes()
    {
        return $this->belongsToMany(Theme::class, 'community_theme', 'communityID', 'ThemeID')
            ->using(CommunityTheme::class);
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'community_members', "communityID",'userId');
    }
}

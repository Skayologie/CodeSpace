<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityTheme extends Model
{
    //
    protected $table = "community_theme";
    protected $fillable = [
        "communityID",
        "ThemeID"
    ];
}

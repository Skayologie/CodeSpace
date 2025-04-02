<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    /** @use HasFactory<\Database\Factories\ThemeFactory> */
    use HasFactory;
    protected $table = "themes";
    protected $fillable = [
        "name",
        "parent",
    ];

    public function subthemes()
    {
        return $this->hasMany(Theme::class, 'parent');
    }

    public function parentTheme()
    {
        return $this->belongsTo(Theme::class, 'parent');
    }
}

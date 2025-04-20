<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ExploreController extends Controller
{
    //
    public function getCommunities(){
        return view("User.Pages.Explore",[
            "Themes"=>Theme::where("parent","=",null)->paginate(5),
            "Communities"=>Community::all(),
        ]);
    }
    public function paginationThemes(){
        return response()->json(Theme::where("parent","=",null)->paginate(5));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\CommunityMembers;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ExploreController extends Controller
{
    //
    public function index(){
        return view("Explore.index",[
            "Themes"=>Theme::where("parent","=",null)->paginate(6),
            "Communities"=>Community::withCount('members')->orderByDesc('members_count')->get(),
        ]);
    }
    public function getCommunities(){
        return view("User.Pages.Explore",[
            "Themes"=>Theme::where("parent","=",null)->paginate(6),
            "Communities"=>Community::withCount('members')->orderByDesc('members_count')->get(),
        ]);
    }
    public function paginationThemes(){
        return response()->json(Theme::where("parent","=",null)->paginate(5));
    }
}

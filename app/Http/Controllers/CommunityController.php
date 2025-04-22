<?php

namespace App\Http\Controllers;

use App\Mail\sendInviteRoleMail;
use App\Models\Community;
use App\Models\Communitymembers;
use App\Http\Requests\StoreCommunityRequest;
use App\Http\Requests\UpdateCommunityRequest;
use App\Models\CommunityTheme;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->json([
            'content' => File::get(resource_path("views/forms/community.blade.php"))
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommunityRequest $request)
    {
        try {
            $data = $request->validated();
            $CommunityThemes = $request->input()["CommunityThemes"];
            $user_id = Session::get("user")->id;
            $community = Community::insertGetId($data);
            CommunityMembers::create([
                "communityID"=>$community,
                "userId"=>$user_id,
                "role"=>"owner",
            ]);
            foreach ($CommunityThemes as $item){
                CommunityTheme::create([
                    "communityID"=>$community,
                    "ThemeID"=>$item
                ]);
            }
            return response()->json([
                "message"=>"Your Community Has Been Created Successfully !"
            ],200);
        }catch (\Exception $e){
            return response()->json([
                "message"=>$e->getMessage()
            ],200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($community)
    {
        //
        $hasReponsable = false;
        $community = Community::findOrFail($community);
        $responsables = CommunityMembers::where("communityID",$community->id)->get();
        foreach ($responsables as $responsable){
            if ($responsable->user->id === \session()->get("user")->id){
                $hasReponsable = true;
                break;
            }else{
                $hasReponsable = false;
            }
        }
        return view("User.Pages.CommunitySinglePage",[
            "Community"=>$community,
            "responsables"=>$responsables,
            "hasReponsable"=>$hasReponsable
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommunityMembers $community)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommunityRequest $request, CommunityMembers $community)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommunityMembers $community)
    {
        //
    }

    public function rejoindre($communityID,$userID){
        try {
            $typeCommunity = (Community::findOrFail($communityID))->type;
            if ($typeCommunity === "public"){
                CommunityMembers::create([
                    "communityID"=>$communityID,
                    "userId"=>$userID,
                ]);
                return response()->json([
                    "message"=>"You are a member in this community community"
                ]);
            }else{

            }

        }catch(\Exception $e){
            return response()->json([
                "message"=>$e->getMessage()
            ]);
        }
    }

    public function inviteForm(){
        return response()->json([
            'content' => File::get(resource_path("views/forms/inviteModo.blade.php"))
        ]);
    }
    public function SendInvite($CommunityID,$UserID,$role){
        try {
            $localUserID = session()->get('user')["id"];
            $Community = Community::findOrFail($CommunityID);
            $responsables = CommunityMembers::where("communityID",$CommunityID)->get();
            foreach ($responsables as $responsable){
                if ($localUserID === $responsable["userId"]){
                    $User = User::findOrFail($UserID);
                    Mail::to($User["email"])->send(new sendInviteRoleMail($User->username,$Community->name,$role,$CommunityID,$UserID));
                    CommunityMembers::create([
                        "communityID"=>$CommunityID,
                        "userId"=>$UserID,
                        "role"=>$role,
                        "status"=>"invited"
                    ]);
                    return response()->json([
                        "message"=>"Invite has been sent to the user successfully"
                    ]);
                }else{
                    return response()->json([
                        "message"=>"You don't have right ro send invite"
                    ]);
                }
            }

        }catch (\Exception $e){
            return response()->json([
                "message"=>$e->getMessage()
            ]);
        }
    }
    public function CheckInvite($CommunityID,$UserID,$role){
        try {
            $Community = CommunityMembers::where("CommunityID",$CommunityID)->where("UserID",$UserID)->where("status","invited")->first();
            if ($Community){
                $Community->update([
                    "status"=>null
                ]);
                return response()->json([
                    "message"=>"You have been confirmed the invitation successfully !"
                ]);
            }else{
                return response()->json([
                    "message"=>"The invitation is not valid"
                ]);
            }
        }catch (\Exception $e){
            return response()->json([
                "message"=>$e->getMessage()
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\sendInviteRoleMail;
use App\Models\Community;
use App\Models\Communitymembers;
use App\Http\Requests\StoreCommunityRequest;
use App\Http\Requests\UpdateCommunityRequest;
use App\Models\CommunityTheme;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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
            if ($request->hasFile('icon') && $request->file('icon')->isValid() || $request->hasFile('banner') && $request->file('banner')->isValid() ) {
                $communityIcon = $request->file('icon');
                $communityBanner = $request->file('banner');

                $Iconfilename = $data["name"].'_'. uniqid() . '.' . $communityIcon->getClientOriginalExtension();
                $Bannerfilename = $data["name"].'_'. uniqid() . '.' . $communityBanner->getClientOriginalExtension();

                $communityIcon->move(public_path('CommunityIcons'), $Iconfilename);
                $communityBanner->move(public_path('CommunityBanners'), $Bannerfilename);

                $iconPath   = '../../../../../CommunityIcons/' . $Iconfilename;
                $bannerPath = '../../../../../CommunityBanners/' . $Bannerfilename;

            } else {
                // Handle error or default image
                $iconPath   = 'CommunityIcons/default.png';
                $bannerPath = 'CommunityBanners/default.png';
            }
            $data["icon"] = $iconPath;
            $data["banner"] = $bannerPath;

            $community = Community::insertGetId($data);
            CommunityMembers::create([
                "communityID"=>$community,
                "userId"=>$user_id,
                "role"=>"owner",
                "status"=>"regularUser",
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
        return view("Community.index",[
            "Community"=>$community,
            "responsables"=>$responsables,
            "hasReponsable"=>$hasReponsable,
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

    public function rejoindre($communityID){
        try {
            $userID = \session()->get("user")->id;
            $typeCommunity = (Community::findOrFail($communityID))->type;
            if ($typeCommunity === "public"){
                CommunityMembers::create([
                    "communityID"=>$communityID,
                    "userId"=>$userID,
                    "role"=>"user",
                    'status'=>"regularUser"
                ]);
                return response()->json([
                    "message"=>"You are a member in this community !"
                ]);
            }else if ($typeCommunity === "private"){
                CommunityMembers::create([
                    "communityID"=>$communityID,
                    "userId"=>$userID,
                    "role"=>"user",
                    'status'=>"pending"
                ]);
                return response()->json([
                    "message"=>"Your request has been sent successfully to the administrator !"
                ]);
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
                        "message"=>$localUserID
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
    public function SearchCommunity($nameQuery){
        try {
            $localUserId = \session()->get('user')->id;
            $result = DB::table('communities')
                ->leftJoin('community_members', 'communities.id', '=', 'community_members.communityID')
                ->where('communities.name', 'like', "%{$nameQuery}%")
                ->where('community_members.userId',  $localUserId)
                ->select('communities.id', 'communities.name', DB::raw('COUNT(community_members.id) as member_count'))
                ->groupBy('communities.id', 'communities.name')
                ->get();
            return response()->json($result);

        }catch (\Exception $e){
            return response()->json([
                "message"=>$e->getMessage()
            ]);
        }
    }
    public function listCommunityDispo(){
        try {
            $userID = session("user")->id;
            $communities = CommunityMembers::join('communities', 'community_members.communityID', '=', 'communities.id')->where("userId",$userID)->where("status","regularUser")->get();
            return response()->json($communities);
        }catch(\Exception $e){
            return response()->json([
                "message"=>$e->getMessage()
            ]);
        }
    }
}

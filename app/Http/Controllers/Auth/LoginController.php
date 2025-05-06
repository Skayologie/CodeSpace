<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Repository\Eloquent\LoginRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class LoginController
{
    protected $LoginRepository;

    public function __construct(LoginRepository $LoginRepository){
        $this->LoginRepository = $LoginRepository;
    }
    public function index(){
        return view('auth.login');
    }

    public function store(LoginRequest $request){
        $data = $request->validated();
        try{
            $user = $this->LoginRepository->findByEmail($data["email"]);
            if ($user){
                $verifyPassword = $this->LoginRepository->verifyPassword($data["password"],$user);
                if ($verifyPassword){
                    session()->put("user",$user);
                    session()->put("role",$user->roles[0]->name);
                    return redirect()->to(route("dashboard"));
                }else{
                    return redirect()->to(route("login.index"))->with('error',"Incorrect Password , Do you want to change password ?? ");
                }
            }else{
                return redirect()->to(route("login.index"))->with('error',"No account registred with this email , Do you want to create account ?? ");
            }
        }catch(\Exception $e){
            return redirect()->to(route("login.index"))->with('error',$e->getMessage());
        }
    }


    public function github(){
        return Socialite::driver('github')->redirect();
    }
    public function githubRedirect(){
        $user = Socialite::driver("github")->user();
        $user = User::firstOrCreate([
            "email"=>$user->getEmail()
        ],[
            "username"=>$user->getName(),
            "email"=>$user->getEmail(),
            "password"=>Hash::make(Str::password()),
            "profilePicture"=>$user->getAvatar(),
            "bio"=>"bio",
        ]);
        session()->put("user",$user);
        session()->put("role","user");
        return redirect()->to(route("/"));
    }



    public function google(){
        return Socialite::driver('google')->redirect();
    }
    public function googleRedirect(){
        $user = Socialite::driver("google")->user();
        $randomNumber = rand(0, 1400);
        $url = "https://dummyjson.com/quotes/".$randomNumber;
        $response = file_get_contents($url);
        $quoteData = json_decode($response, true);
        $user = User::firstOrCreate([
            "email"=>$user->getEmail()
        ],[
            "username"=>$user->getName(),
            "email"=>$user->getEmail(),
            "password"=>Hash::make(Str::password()),
            "profilePicture"=>$user->getAvatar(),
            "bio"=>$quoteData['quote'],
        ]);
        session()->put("user",$user);
        session()->put("role","user");
        return redirect()->to(route("/"));
    }
}

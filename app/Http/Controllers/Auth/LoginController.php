<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Repository\Eloquent\LoginRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
}

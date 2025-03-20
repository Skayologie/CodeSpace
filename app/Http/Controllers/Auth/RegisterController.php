<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\RegisterUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Repository\Eloquent\RegisterRepository;
use Illuminate\Support\Facades\DB;

class RegisterController
{
    protected $RegisterRepository;
    public function __construct(RegisterRepository $RegisterRepository)
    {
        $this->RegisterRepository = $RegisterRepository;
    }

    public function index(){
        return view("auth.register");
    }
    public function store(RegisterUserRequest $request){
        $data = $request->validated();
        $data["bio"] = "Bio";
        try {
            $password = $data["password"];
            $Hashedpassword = $this->RegisterRepository->hashPassword($password);
            $data["password"] = $Hashedpassword;
            $register = $this->RegisterRepository->create($data);
            if ($register){
                $this->RegisterRepository->assignRole($register->id,2);
            }
            return redirect()->to(route("login.index"))->with('success',"Account has created successfully .");
        }catch(\Exception $e){
            return redirect()->to(route("register.index"))->with('error',$e->getMessage());
        }
    }
}

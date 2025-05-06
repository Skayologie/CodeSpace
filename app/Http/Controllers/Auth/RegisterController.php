<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Str;

use App\Http\Requests\RegisterUserRequest;
use App\Mail\SendConfirmationMail;
use App\Models\Role;
use App\Models\User;
use App\Repository\Eloquent\RegisterRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
        $randomNumber = rand(0, 1400);
        $url = "https://dummyjson.com/quotes/".$randomNumber;
        $response = file_get_contents($url);
        $quoteData = json_decode($response, true);
        $data["bio"] = $quoteData['quote'];

        try {
            $tokenVerify = Str::random(10);
            $password = $data["password"];
            $Hashedpassword = $this->RegisterRepository->hashPassword($password);
            $data["password"] = $Hashedpassword;
            $data["token_verification"] = $tokenVerify;
            $data["profilePicture"] = "https://ui-avatars.com/api/?background=ff4500&color=fff&name=".$data["username"];
            $register = $this->RegisterRepository->create($data);
            if ($register){
                $this->RegisterRepository->assignRole($register->id,2);
                $SendConfirmationMail = new SendConfirmationMail($tokenVerify);
                Mail::to($data["email"])->send($SendConfirmationMail);
            }
            return redirect()->to(route("login.index"))->with('success',"Account has created successfully . Please confirm you email first !");
        }catch(\Exception $e){
            return redirect()->to(route("register.index"))->with('error',$e->getMessage());
        }
    }
}

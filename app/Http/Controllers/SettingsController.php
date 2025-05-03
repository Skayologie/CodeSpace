<?php

namespace App\Http\Controllers;

use App\Mail\SendChangeEmailVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $id = session("user")->id;
        $user = User::findOrFail($id);
        return view("Settings.index",[
            "user"=>$user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function SendChangeEmail(){
        try {
            $userMail = session("user")->email;
            Mail::to($userMail)->send(new SendChangeEmailVerification());
            return response()->json();
        }catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }
}

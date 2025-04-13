<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function Active_Users_Monthly(){
        try {
            $queryResult = DB::select("SELECT COUNT(id) UsersActive , Month(users.last_login_at) AS Month FROM `users` WHERE users.last_login_at IS NOT NULL GROUP BY Month");
            return response()->json($queryResult);
        }catch(\Exception $e){
            return response()->json([
               "message"=>$e->getMessage()
            ]);
        }
    }
}

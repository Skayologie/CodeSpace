<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next , $role): Response
    {

        $User_Role = session()->get("role");
        $Auth = session()->get("user");
        if ($Auth == "null" || $User_Role != $role){
            abort("403");
        }
        return $next($request);
    }
}

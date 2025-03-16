<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use Illuminate\View\View;

class UserHompage extends Component
{
    /**
     * Get the view / contents that represents the component.
     */

    public $auth;

    public function __construct()
    {
        $user = session()->get("user");
        if ($user != null){
            $this->auth = "true";
        }else{
            $this->auth = "false";
        }
    }
    public function render(): View
    {
        return view('layouts.userHomepage');
    }
}

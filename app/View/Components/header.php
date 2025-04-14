<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class header extends Component
{
    public $auth;
    public $user;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
        $user = session()->get("user");
        if ($user != null){
            $this->auth = "true";
            $this->user = $user;
        }else{
            $this->auth = "false";
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header');
    }
}

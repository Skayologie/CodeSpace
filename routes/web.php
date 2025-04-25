<?php

use App\Http\Controllers\Auth\AuthController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

require base_path('routes/auth.php');
require base_path('routes/admin.php');
require base_path('routes/user.php');

Route::get('/', function () {
        return redirect()->to(route('user.Homepage'));
})->name("/");

Route::get('/Home', function () {
    if (session()->get("role") === "admin") {
        return redirect()->to(route("admin.Dashboard"));
    }
    $posts = Post::orderBy('created_at', 'desc')->get();
    return view("Homepage.index",[
        "posts"=>$posts
    ]);
})->name('user.Homepage');

Route::get("/logout", [AuthController::class, "logout"])
    ->name("auth.logout")
    ->middleware("auth");



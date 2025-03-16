<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

require base_path('routes/auth.php');
require base_path('routes/admin.php');
require base_path('routes/user.php');

Route::get('/', function () {
    $role = session()->get("role");
    if ($role === "admin") {
        return redirect()->to(route('admin.Dashboard'));
    } elseif ($role === "user") {
        return redirect()->to(route('user.Homepage'));
    } else {
        return redirect()->to(route('user.Homepage'));
    }
})->name("/");

Route::get('/Home', function () {
    if (session()->get("role") === "admin") {
        return redirect()->to(route("admin.Dashboard"));
    }
    return view('Homepage.index');
})->name('user.Homepage');

Route::get("/logout", [AuthController::class, "logout"])
    ->name("auth.logout")
    ->middleware("auth");



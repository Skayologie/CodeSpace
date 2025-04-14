<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\TokenResetPassword;


Route::middleware("notAuth")->group(function () {
    Route::resource('/register', RegisterController::class);
    Route::resource('/login', LoginController::class);

    Route::get('github', [LoginController::class,'github'])->name("loginGithub");
    Route::get('github/redirect', [LoginController::class,'githubRedirect'])->name("loginRedirect");

    Route::get('google', [LoginController::class,'google'])->name("loginGoogle");
    Route::get('google/redirect', [LoginController::class,'googleRedirect'])->name("googleRedirect");


    Route::resource('/forget_password', PasswordController::class);

    Route::get('/forgetPassword/CheckToken', [PasswordController::class, "CheckToken"])
        ->name("Password.checkToken");

    Route::get('/forgetPassword/updatePassword', [PasswordController::class, "updateThePassword"])
        ->name('Password.updateThePassword');

    Route::post('/forgetPassword/updatePassword', [PasswordController::class, "changingThePassword"])
        ->name('Password.changingThePassword');

    Route::get('/CheckToken', [TokenResetPassword::class, "index"])
        ->name("ResetPass.index");

    Route::post('/CheckToken/CheckTokenCompatibility', [TokenResetPassword::class, "CheckTokenCompatibility"])
        ->name("ResetPass.CheckTokenCompatibility");
});

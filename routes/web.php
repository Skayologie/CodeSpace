<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\TokenResetPassword;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendResetLink;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategorieController;

Route::get('/token',function(){
    return array("csrf"=>csrf_token());
});

Route::get('/', function () {
    return view('Admin.index');
})->name('admin.dashboard');

/**
 *Authentification
 */

Route::resource('/register',RegisterController::class);
Route::resource('/login',LoginController::class);
Route::resource('/forget_password', PasswordController::class);
Route::get('/forgetPassword/CheckToken', [PasswordController::class, "CheckToken"])->name("Password.checkToken");

Route::get('/forgetPassword/updatePassword', [PasswordController::class,"updateThePassword"])->name('Password.updateThePassword');
Route::post('/forgetPassword/updatePassword', [PasswordController::class,"changingThePassword"])->name('Password.changingThePassword');

Route::get('/CheckToken', [TokenResetPassword::class,"index"])->name("ResetPass.index");
Route::post('/CheckToken/CheckTokenCompatibility', [TokenResetPassword::class,"CheckTokenCompatibility"])->name("ResetPass.CheckTokenCompatibility");


Route::resource('/Post', PostController::class);

Route::resource('/Categorie', CategorieController::class);

Route::resource('/Tag', TagController::class);

Route::resource('/Profile', ProfileController::class);


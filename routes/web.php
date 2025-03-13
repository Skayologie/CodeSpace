<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::get('/forget_password', [AuthController::class,"forgetpassword"])->name("auth.forgotPassword");


Route::resource('/Post', PostController::class);

Route::resource('/Categorie', CategorieController::class);

Route::resource('/Tag', TagController::class);

Route::resource('/Profile', ProfileController::class);


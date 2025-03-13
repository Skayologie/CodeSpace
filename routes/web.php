<?php

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

Route::get('/login', function () {
    return view('auth.login');
})->name("auth.login");

Route::get('/register', function () {
    return view('auth.register');
})->name("auth.register");

Route::get('/forget_password', function () {
    return view('auth.forgot-password');
})->name("auth.forgotPassword");

Route::post('/password/reset',[SendResetLink::class,'sendResetLink'])->name('password.reset');

Route::resource('/Post', PostController::class);

Route::resource('/Categorie', CategorieController::class);

Route::resource('/Tag', TagController::class);

Route::resource('/Profile', ProfileController::class);


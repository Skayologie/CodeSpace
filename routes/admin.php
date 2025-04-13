<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ThemeController;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;

Route::middleware(["auth", "role:admin"])->group(function () {
    Route::get('/Dashboard', function () {
        $statsData = [
            "registeredUsers"=>\Illuminate\Support\Facades\DB::selectOne("SELECT COUNT(*) AS registeredUsers FROM users WHERE deleted_at IS null AND email_verified_at IS NOT null")->registeredUsers,
            "activeUsers"=>\Illuminate\Support\Facades\DB::selectOne("SELECT COUNT(*) AS activeUsers FROM `users` WHERE users.last_login_at > NOW() - INTERVAL 1 HOUR")->activeUsers,
            "totalPosts"=>\Illuminate\Support\Facades\DB::selectOne("SELECT COUNT(*) AS totalPosts FROM `posts` WHERE status = 'published'")->totalPosts,
            "totalCommunities"=>158
        ];
        return view('Admin.index',$statsData);
    })->name('admin.Dashboard');

    Route::resource('/Categorie', CategoryController::class);
    Route::resource('/Tag', TagController::class);
    Route::resource('/Theme', ThemeController::class);
    Route::get('/AllThemes', [ThemeController::class,"getAllThemes"]);
});

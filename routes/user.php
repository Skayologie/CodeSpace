<?php

use App\Http\Controllers\CommunityController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;




Route::middleware(["auth", "role:user"])->group(function () {
    Route::resource('/Post', PostController::class);
    Route::resource('/Profile', ProfileController::class);
    Route::resource('/Community', CommunityController::class);
    Route::get('/AllThemes', [ThemeController::class,"getAllThemes"]);
    Route::get('/Explore/Communities',[ExploreController::class,"getCommunities"]);
    Route::get("Tag/Search/{text}",[TagController::class,"tag_search"]);
});
Route::get('/Explore/Communities/paginate',[ExploreController::class,"paginationThemes"]);

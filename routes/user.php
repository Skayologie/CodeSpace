<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;




Route::middleware(["auth", "role:user"])->group(function () {
    Route::resource('/Post', PostController::class);
    Route::resource('/Profile', ProfileController::class);

    Route::get("Tag/Search/{text}",[TagController::class,"tag_search"]);
});

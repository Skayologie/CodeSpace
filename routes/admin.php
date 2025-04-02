<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ThemeController;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;

Route::middleware(["auth", "role:admin"])->group(function () {
    Route::get('/Dashboard', function () {
        return view('Admin.index');
    })->name('admin.Dashboard');

    Route::resource('/Categorie', CategorieController::class);
    Route::resource('/Tag', TagController::class);
    Route::resource('/Theme', ThemeController::class);
});

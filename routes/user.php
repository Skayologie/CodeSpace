<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;




Route::middleware(["auth", "role:user"])->group(function () {
    Route::resource('/Post', PostController::class);

    Route::resource('/Chat', ChatController::class);

    Route::resource('/Profile', ProfileController::class);
    Route::resource('/Community', CommunityController::class);
    Route::get('/Explore/Community/{id}', [CommunityController::class, 'show'])->name("Explore.community");
    Route::resource('/Explore',ExploreController::class);
    Route::get('/AllThemes', [ThemeController::class,"getAllThemes"]);
//    Route::get('/Explore/Communities',[ExploreController::class,"getCommunities"]);
    Route::get("Tag/Search/{text}",[TagController::class,"tag_search"]);

    Route::get("Community/join/{communityID}",[CommunityController::class,"rejoindre"]);
    Route::get("Communities/listAllMyCommunities",[CommunityController::class,"listCommunityDispo"]);

    Route::get("ManageCommunity/inviteModo",[CommunityController::class,"inviteForm"]);
    Route::get("ManageCommunity/SendInviteToCommunity/{CommunityID}/{UserID}/{role}",[CommunityController::class,"SendInvite"]);
    Route::get("ManageCommunity/CheckInvitation/{CommunityID}/{UserID}/{role}",[CommunityController::class,"CheckInvite"]);

    Route::get("Users/Search/{nameQuery}",[UserController::class,"SearchUsers"]);
    Route::get("Communities/Search/{nameQuery}",[CommunityController::class,"SearchCommunity"]);

    Route::get('/r/${username}/Post/${postId}', [PostController::class,"show"]);

});
Route::get('/Explore/Communities/paginate',[ExploreController::class,"paginationThemes"]);

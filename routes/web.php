<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\FollowController;

Auth::routes(); //認証機能を使用する。
Route::get("/dashboard", [TopController::class, "goTop"])->name('dashboard');
Route::get("/library", [LibraryController::class, "goLibrary"])->name('library');
Route::get("/favorite", [FavoriteController::class, "goFavorite"])->name('favorite');
Route::get("/search", [SearchController::class, "goSearch"])->name('search');
Route::get("/upload", [UploadController::class, "goUpload"])->name('upload');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/app', function () { return view('app'); });

Route::get("/{userId}", [UserController::class, "goUser"])->name('user/{userId}');
Route::get("/album/{albumId}", [AlbumController::class, "albumDetail"])->name('album');

/* Route::get('/songs/{songId}/check', [LikeController::class, "check"])->name('like.check'); */
Route::post('/songs/{songId}/song_likes', [LikeController::class, "like"])->name('like');
Route::post('/artists/{artistId}/follows', [FollowController::class, "follow"])->name('follow');
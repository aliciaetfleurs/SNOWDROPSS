<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\DAO\AlbumDAO;
use App\Models\Song;
use App\Models\SongLike;
use App\Http\Controllers\Controller;

class FavoriteController extends Controller{

    use SoftDeletes;

    public function goFavorite(Request $request) {
        $templatePath = "favorite";
        $assign = [];

        $db = DB::connection()->getPdo();
        $AlbumDAO = new AlbumDAO($db);
        if(!empty(Auth::User()->id)){
            // $assign["songLikes"] = User::find(Auth::User()->id)->songLikes;
            $user_id = Auth::User()->id;

            $AlbumList = $AlbumDAO->findAllFavorite($user_id);
            $assign["albumList"] = $AlbumList;

            $songIdArray = [];
            $songLikes = User::find($user_id)->songLikes;
            foreach($songLikes as $songLike){
                $songIdArray[] = $songLike["song_id"];
            }
            $assign["songIdArray"] = $songIdArray;
        }

        return view($templatePath, $assign);
    }
}
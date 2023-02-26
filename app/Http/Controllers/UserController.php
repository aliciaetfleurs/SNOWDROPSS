<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Albums;
use App\Functions;
use App\Entity\Album;
use App\Entity\Artist;
use App\Entity\Genre;
use App\DAO\UserDAO;
use App\DAO\AlbumDAO;
use App\DAO\GenreDAO;
use App\Http\Controllers\Controller;


class UserController extends Controller {

    public function goUser(Request $request, int $userId) {
        $templatePath = "user";
        $assign = [];         

        $db = DB::connection()->getPdo();
        $albumDAO = new AlbumDAO($db);
        $userDAO = new userDAO($db);

        $albumList = $albumDAO->findByPK($userId);
        $userList = $userDAO->findByPK($userId);
        $liveList = $userDAO->findLiveSchdule($userId);

        $assign["albumList"] = $albumList;
        $assign["userList"] = $userList;
        $assign["liveList"] = $liveList;

        if(!empty(Auth::User()->id)){
            $user_id = Auth::User()->id;
            $songIdArray = [];
            $songLikes = User::find($user_id)->songLikes;
            foreach($songLikes as $songLike){
                $songIdArray[] = $songLike["song_id"];
            }
            $assign["songIdArray"] = $songIdArray;
        }

        if(!empty(Auth::User()->id)){
            $user_id = Auth::User()->id;
            $artistIdArray = [];
            $follows = User::find($user_id)->follows;
            foreach($follows as $follow){
                $artistIdArray[] = $follow["artist_id"];
            }
            $assign["artistIdArray"] = $artistIdArray;
        }
        
        return view($templatePath, $assign);
    }
}

?>
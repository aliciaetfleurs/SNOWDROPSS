<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Functions;
use App\Entity\Album;
use App\Entity\Artist;
use App\Entity\Genre;
use App\DAO\AlbumDAO;
use App\DAO\ArtistDAO;
use App\DAO\GenreDAO;
use App\Http\Controllers\Controller;


class SearchController extends Controller {
   /**
     * トップ画面表示処理
     */
    public function goSearch(Request $request) {
        $templatePath = "search";
        $assign = [];
        $searchText = $request->input("searchText");

        $db = DB::connection()->getPdo();
        $albumDAO = new AlbumDAO($db);
        $artistDAO = new ArtistDAO($db);
        $genreDAO = new GenreDAO($db);
        $albumList = $albumDAO->findSearch($searchText);
        $artistList = $artistDAO->findAllTop();
        $genreList = $genreDAO->findAll();
        $assign["albumList"] = $albumList;
        $assign["artistList"] = $artistList;
        $assign["genreList"] = $genreList;

        if(!empty(Auth::User()->id)){
            $user_id = Auth::User()->id;
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

?>
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Functions;
use App\Entity\Album;
use App\Entity\Artist;
use App\Entity\Genre;
use App\DAO\AlbumDAO;
use App\DAO\ArtistDAO;
use App\DAO\GenreDAO;
use App\Http\Controllers\Controller;


class ArtistController extends Controller {
   /**
     * トップ画面表示処理
     */
    public function goArtists(Request $request) {
        $templatePath = "artists";
        $assign = [];            

        $db = DB::connection()->getPdo();
        $albumDAO = new AlbumDAO($db);
        $artistDAO = new ArtistDAO($db);
        $genreDAO = new GenreDAO($db);
        $albumList = $albumDAO->findAll();
        $artistList = $artistDAO->findAll();
        $genreList = $genreDAO->findAll();
        $assign["albumList"] = $albumList;
        $assign["artistList"] = $artistList;
        $assign["genreList"] = $genreList;

        return view($templatePath, $assign);
    }
}

?>
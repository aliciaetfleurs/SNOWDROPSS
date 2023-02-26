<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Albums;
use App\Functions;
use App\Entity\Album;
use App\Entity\Artist;
use App\Entity\Genre;
use App\DAO\AlbumDAO;
use App\DAO\ArtistDAO;
use App\DAO\GenreDAO;
use App\Http\Controllers\Controller;


class AlbumController extends Controller {

    /**
     * アルバム詳細画面表示
     */
    public function albumDetail(Request $request, int $albumId) {
        $templatePath = "album";
        $assign = [];            

        $db = DB::connection()->getPdo();
        $albumDAO = new AlbumDAO($db);
        $artistDAO = new ArtistDAO($db);
        $genreDAO = new GenreDAO($db);
        $album = $albumDAO->findByPK($albumId);
        $artistList = $artistDAO->findAll();
        $genreList = $genreDAO->findAll();
        $assign["album"] = $album;
        $assign["artistList"] = $artistList;
        $assign["genreList"] = $genreList;

        return view($templatePath, $assign);
    }
}

?>
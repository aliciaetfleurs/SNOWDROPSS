<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\SongLike;
use App\Functions;
use App\Entity\Information;
use App\Models\Albums;
use App\Entity\Album;
use App\Entity\Genre;
use App\DAO\InformationDAO;
use App\DAO\AlbumDAO;
use App\DAO\UserDAO;
use App\DAO\GenreDAO;
use App\Http\Controllers\Controller;
use Hamcrest\Arrays\IsArray;

use function Psy\debug;

class UploadController extends Controller {
   /**
    * トップ画面表示処理
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /* public function index()
    {
        return view('/');
    } */

    
    public function goUpload(Request $request) {
        $templatePath = "upload";
        $assign = [];            

        $db = DB::connection()->getPdo();
        $infoDAO = new InformationDAO($db);
        $albumDAO = new AlbumDAO($db);
        $userDAO = new UserDAO($db);
        $genreDAO = new GenreDAO($db);
        
        $albumList = $albumDAO->findAllTop();
        $genreList = $genreDAO->findAll();

        $assign["albumList"] = $albumList;
        $assign["genreList"] = $genreList;
        
        if(!empty(Auth::User()->id)){
            // $assign["songLikes"] = User::find(Auth::User()->id)->songLikes;
            $user_id = Auth::User()->id;
            $songIdArray = [];
            $songLikes = User::find($user_id)->songLikes;
            foreach($songLikes as $songLike){
                $songIdArray[] = $songLike["song_id"];
            }
            $assign["songIdArray"] = $songIdArray;
        }
        // :song_like_id="{{$songLike->id}}"

        return view($templatePath, $assign);
    }
}

?>
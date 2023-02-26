<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\DAO\LibraryDAO;
use App\Http\Controllers\Controller;


class LibraryController extends Controller {
   /**
     * トップ画面表示処理
     */
    public function goLibrary(Request $request) {
        $templatePath = "library";
        $assign = [];            
        $id = Auth::id();

        $db = DB::connection()->getPdo();
        $LibraryDAO = new LibraryDAO($db);
        $LibraryList = $LibraryDAO->findAll();
        $assign["LibraryList"] = $LibraryList;

        return view($templatePath, $assign);
    }
}

?>
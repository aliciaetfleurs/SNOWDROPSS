<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\DAO\FollowDAO;
use App\Models\Follow;
use App\Http\Controllers\Controller;

class FollowController extends Controller{

    use SoftDeletes;

    public function follow(Request $request) {
        $user = Auth::user();
        $db = DB::connection()->getPdo();
        $FollowDAO = new FollowDAO($db);

        $artistId = $request->artist_id;
        $isFollow = $request->isFollow;
        $createdAt = date("Y-m-d H:i:s");
        $updatedAt = date("Y-m-d H:i:s");

        if($isFollow){
            // trueのときDBのartist_idのいいねを削除する
            $FollowDAO->delete($artistId, (int)$user->id);
        }else{
            // いいねの情報をDBに挿入する
            $FollowDAO->add(1, $artistId, (int)$user->id, $createdAt, $updatedAt);
            
            Follow::firstOrCreate([
                "artist_id" => $artistId,
                "user_id" => (int)$user->id,
            ]);
        }
    }
}
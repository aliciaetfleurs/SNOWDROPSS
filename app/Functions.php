<?php

function isLikeCheck($songLikes,$songId){
    $flg = 0;
    foreach ($songLikes as $songLike) {
        if($songLike["song_id"] == $song_id) {
            $flg++;
        }
    }
    if($flg > 0) {
        song-like-comp ture;
    }else {
        song-like-comp false;
    }
}
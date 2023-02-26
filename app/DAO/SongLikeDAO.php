<?php

namespace App\DAO;

use PDO;
use App\Entity\SongLike;

/**
 * SongLikesテーブルへのデータ操作クラス。
 */
class SongLikeDAO {
    /**
     * @var PDO DB接続オブジェクト
     */
    private PDO $db;

    /**
     * コンストラクタ
     *
     * @param PDO $db DB接続オブジェクト
     */
    public function __construct(PDO $db) {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->db = $db;
    }

    /**
     * 全アルバム情報検索
     *
     * @return array 全部門情報が格納された連想配列
     * キーは部門番号、値はSongLikesエンティティオブジェクト
     */
    public function findAll(): ?SongLike {
        $sql = "SELECT 
        songs.id, 
        songs.name, 
        songs.composer, 
        songs.track_number, 
        songs.disc_number, 
        songs.explicit, 
        songs.lyrics, 
        songs.genre_id, 
        songs.artist_id, 
        songs.date, 
        songs.file_name, 
        songs.ext, 
        genres.name AS genres_name, 
        users.name AS artists_name 
        FROM songs 
        LEFT JOIN users ON songs.artist_id = users.id 
        LEFT JOIN genres ON songs.genre_id = genres.id 
        WHERE songs.id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        $song = null;
        if($result && $row = $stmt->fetch()) {
            $idDb = $row["id"];
            $songLikeName = $row["name"];
            $songLikeComposer = $row["composer"];
            $songLikeTrackNumber = $row["track_number"];
            $songLikeDiscNumber = $row["disc_number"];
            $songLikeExplicit = $row["explicit"];
            $songLikeImg = $row["img"];
            $songLikeType = $row["type"];
            $songLikeGenreName = $row["genres_name"];
            $songLikeArtistName = $row["artists_name"];
            $fileName = $row["file_name"];
            $fileExt = $row["ext"];
    
            $song = new SongLike();
            $song->setId($idDb);
            $song->setSongLikeName($songName);
            $song->setSongLikeDate($songDate);            
            $song->setSongLikeTrackTotal($songTrackTotal);            
            $song->setSongLikeDiscTotal($songDiscTotal);            
            $song->setSongLikeExplicit($songExplicit);
            $song->setSongLikeImg($songImg);
            $song->setSongLikeType($songType);
            $song->setGenreName($songGenreName);
            $song->setUserName($songArtistName);
            $song->setFileName($fileName);
            $song->setFileExt($fileExt);
        }
        return $song;
    }
}
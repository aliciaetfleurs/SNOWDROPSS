<?php

namespace App\DAO;

use PDO;
use App\Entity\Song;

/**
 * SongLikesテーブルへのデータ操作クラス。
 */
class SongDAO {
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
    public function findByPK(int $id): ?Song {
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
        songs.album_id, 
        songs.date,
        songs.file_name,
        songs.ext,
        genres.name AS genres_name,
        users.name AS artists_name
        FROM songs
        LEFT JOIN users ON songs.artist_id = users.id 
        LEFT JOIN genres ON songs.genre_id = genres.id 
        WHERE songs.artist_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        $song = null;
        if($result && $row = $stmt->fetch()) {
            $idDb = $row["id"];
            $songName = $row["name"];
            $songDate = $row["date"];
            $songTrackNumber = $row["track_number"];
            $songDiscNumber = $row["disc_number"];
            $songExplicit = $row["explicit"];
            $songGenreId = $row["genres_id"];
            $songArtistId = $row["artists_id"];
            $songAlbumId = $row["album_id"];
            $fileName = $row["file_name"];
            $fileExt = $row["ext"];
    
            $song = new Song();
            $song->setId($idDb);
            $song->setSongName($songName);
            $song->setSongDate($songDate);
            $song->setSongTrackNumber($songTrackNumber);
            $song->setSongDiscNumber($songDiscNumber);          
            $song->setSongExplicit($songExplicit);
            $song->setGenreId($songGenreId);
            $song->setArtistId($songArtistId);
            $song->setAlbumId($songAlbumId);
            $song->setFileName($fileName);
            $song->setFileExt($fileExt);
        }
        return $song;
    }
}
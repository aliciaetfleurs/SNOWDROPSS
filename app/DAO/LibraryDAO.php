<?php

namespace App\DAO;

use PDO;
use App\Entity\Album;

/**
 * Librarysテーブルへのデータ操作クラス。
 */
class LibraryDAO {
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
     * キーは部門番号、値はalbumsエンティティオブジェクト
     */
    public function findAll($id): array {
        $sql = 
            "SELECT 
            albums.id, 
            albums.name,
            albums.date, 
            albums.explicit, 
            albums.img, 
            albums.type,             
            users.name AS users_name,
		    songs.name AS songs_name,
            songs.file_name,
            songs.ext
            FROM likes 
		    LEFT JOIN albums ON likes.user_id = albums.artist_id
            LEFT JOIN songs ON albums.id = songs.album_id
		    LEFT JOIN users ON likes.user_id = users.id
		    WHERE likes.user_id = :id";
        /* if($type != null){
            $sql . " WHERE type = " . $type;
        } */
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        $albumList = [];
        while($row = $stmt->fetch()) {
            $idDb = $row["id"];
            $albumName = $row["name"];
            $albumDate = $row["date"];
            $albumExplicit = $row["explicit"];
            $albumImg = $row["img"];
            $albumType = $row["type"];
            $albumArtistName = $row["artists_name"];
            $fileName = $row["file_name"];
            $fileExt = $row["ext"];
    
            $album = new Album();
            $album->setId($idDb);
            $album->setAlbumName($albumName);
            $album->setAlbumDate($albumDate);            
            $album->setAlbumExplicit($albumExplicit);
            $album->setAlbumImg($albumImg);
            $album->setAlbumType($albumType);
            $album->setUserName($albumArtistName);
            $album->setFileName($fileName);
            $album->setFileExt($fileExt);
            $albumList[$idDb] = $album;
        }
        return $albumList;
    }
}
<?php

namespace App\DAO;

use PDO;
use App\Entity\Album;

/**
 * Albumsテーブルへのデータ操作クラス。
 */
class AlbumDAO {
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
    public function findAllFavorite(int $user_id): array {
        $sql = "SELECT 
            albums.id, 
            albums.name,
            albums.date, 
            albums.explicit, 
            albums.img, 
            albums.type,            
            users.name AS artists_name,
            songs.id AS song_id,
            songs.file_name,
            songs.ext
            FROM albums 
            LEFT JOIN users ON albums.artist_id = users.id
            LEFT JOIN songs ON albums.id = songs.album_id
            LEFT JOIN song_likes ON songs.id = song_likes.song_id
            WHERE song_likes.user_id = :id";
        /* if($type != null){
            $sql . " WHERE type = " . $type;
        } */
        $stmt = $this->db->prepare($sql);    
        $stmt->bindValue(":id", $user_id, PDO::PARAM_INT);
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
            $songId = $row["song_id"];
    
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
            $album->setSongId($songId);
            $albumList[$idDb] = $album;
        }
        return $albumList;
    }

    public function findAllTop(): array {
        $sql = "SELECT 
        albums.id, 
        albums.name,
        albums.date, 
        albums.explicit, 
        albums.img, 
        albums.type,            
        albums.artist_id AS albums_artist_id,
        users.name AS artists_name,
        songs.id AS song_id,
        songs.file_name,
        songs.ext,
        songs.artist_id
        FROM albums 
        LEFT JOIN users ON albums.artist_id = users.id
        LEFT JOIN songs ON albums.id = songs.album_id";
        $stmt = $this->db->prepare($sql);
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
            $songId = $row["song_id"];
            $albumArtistId = $row["albums_artist_id"];
            
    
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
            $album->setSongId($songId);
            $album->setAlbumArtistId($albumArtistId);
            $albumList[$idDb] = $album;
        }
        return $albumList;
    }

    public function findByPK(int $id): array{
        $sql = "SELECT 
        albums.id, 
        albums.name,
        albums.date, 
        albums.explicit, 
        albums.img, 
        albums.type,            
        albums.artist_id AS albums_artist_id,
        users.name AS artists_name,
        songs.id AS song_id,
        songs.file_name,
        songs.ext
        FROM albums 
        LEFT JOIN users ON albums.artist_id = users.id
        LEFT JOIN songs ON albums.id = songs.album_id
        WHERE albums.artist_id = :id";
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
            $songId = $row["song_id"];
            $albumArtistId = $row["albums_artist_id"];
    
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
            $album->setSongId($songId);
            $album->setAlbumArtistId($albumArtistId);
            $albumList[$idDb] = $album;
        }
        return $albumList;
    }

    public function findNew(): array {
        $sql = "SELECT 
            albums.id, 
            albums.name, 
            albums.date, 
            albums.explicit, 
            albums.img, 
            genres.name AS genres_name, 
            users.name AS artists_name,
            songs.file_name,
            songs.ext
            FROM albums 
            LEFT JOIN users ON albums.artist_id = users.id 
            LEFT JOIN genres ON albums.genre_id = genres.id
            LEFT JOIN songs ON albums.id = songs.album_id
            ORDER BY albums.date DESC";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute();
        $albumNewList = [];
        while($row = $stmt->fetch()) {
            $idDb = $row["id"];
            $albumNewName = $row["name"];
            $albumNewDate = $row["date"];
            $albumNewExplicit = $row["explicit"];
            $albumNewImg = $row["img"];
            $albumNewGenreName = $row["genres_name"];
            $albumNewArtistName = $row["artists_name"];
            $fileName = $row["file_name"];
            $fileExt = $row["ext"];

            $albumNew = new Album();
            $albumNew->setId($idDb);
            $albumNew->setAlbumName($albumNewName);
            $albumNew->setAlbumDate($albumNewDate);            
            $albumNew->setAlbumExplicit($albumNewExplicit);
            $albumNew->setAlbumImg($albumNewImg);
            $albumNew->setGenreName($albumNewGenreName);
            $albumNew->setUserName($albumNewArtistName);
            $albumNew->setFileName($fileName);
            $albumNew->setFileExt($fileExt);
            $albumNewList[$idDb] = $albumNew;
        }
        return $albumNewList;
    }

    public function findSearch($search): array {
        $sql = "SELECT 
            albums.id, 
            albums.name,
            albums.date, 
            albums.track_total, 
            albums.disc_total, 
            albums.explicit, 
            albums.img, 
            albums.type,  
            users.name AS artists_name, 
            genres.name AS genres_name,
            songs.file_name,
            songs.ext
            FROM albums 
            LEFT JOIN users ON albums.artist_id = users.id 
            LEFT JOIN genres ON albums.genre_id = genres.id
            LEFT JOIN songs ON albums.id = songs.album_id
            LEFT JOIN song_likes ON songs.id = song_likes.song_id
            WHERE albums.name LIKE '%" . $search . "%'";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute();
        $albumList = [];
        while($row = $stmt->fetch()) {
            $idDb = $row["id"];
            $albumName = $row["name"];
            $albumDate = $row["date"];
            $albumTrackTotal = $row["track_total"];
            $albumDiscTotal = $row["disc_total"];
            $albumExplicit = $row["explicit"];
            $albumImg = $row["img"];
            $albumType = $row["type"];
            $albumGenreName = $row["genres_name"];
            $albumArtistName = $row["artists_name"];
            $fileName = $row["file_name"];
            $fileExt = $row["ext"];
    
            $album = new Album();
            $album->setId($idDb);
            $album->setAlbumName($albumName);
            $album->setAlbumDate($albumDate);            
            $album->setAlbumTrackTotal($albumTrackTotal);            
            $album->setAlbumDiscTotal($albumDiscTotal);            
            $album->setAlbumExplicit($albumExplicit);
            $album->setAlbumImg($albumImg);
            $album->setAlbumType($albumType);
            $album->setGenreName($albumGenreName);
            $album->setUserName($albumArtistName);
            $album->setFileName($fileName);
            $album->setFileExt($fileExt);
            $album->setSearchValue($search);
            $albumList[$idDb] = $album;
        }
        return $albumList;
    }

    public function findAll(): array {
        $sql = "SELECT 
            albums.id, 
            albums.name,
            albums.date, 
            albums.track_total, 
            albums.disc_total, 
            albums.explicit, 
            albums.img, 
            albums.type,  
            users.name AS artists_name, 
            genres.name AS genres_name,
            songs.file_name,
            songs.ext,
            songs.artist_id
            FROM albums 
            LEFT JOIN users ON albums.artist_id = users.id 
            LEFT JOIN genres ON albums.genre_id = genres.id
            LEFT JOIN songs ON albums.id = songs.album_id";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute();
        $albumList = [];
        while($row = $stmt->fetch()) {
            $idDb = $row["id"];
            $albumName = $row["name"];
            $albumDate = $row["date"];
            $albumTrackTotal = $row["track_total"];
            $albumDiscTotal = $row["disc_total"];
            $albumExplicit = $row["explicit"];
            $albumImg = $row["img"];
            $albumType = $row["type"];
            $albumGenreName = $row["genres_name"];
            $albumUserName = $row["artists_name"];
            $fileName = $row["file_name"];
            $fileExt = $row["ext"];
            $artistId = $row["artist_id"];

            $album = new Album();
            $album->setId($idDb);
            $album->setAlbumName($albumName);
            $album->setAlbumDate($albumDate);            
            $album->setAlbumTrackTotal($albumTrackTotal);            
            $album->setAlbumDiscTotal($albumDiscTotal);            
            $album->setAlbumExplicit($albumExplicit);
            $album->setAlbumImg($albumImg);
            $album->setAlbumType($albumType);
            $album->setGenreName($albumGenreName);
            $album->setUserName($albumUserName);
            $album->setFileName($fileName);
            $album->setFileExt($fileExt);
            $album->setArtistId($artistId);
            $albumList[$idDb] = $album;
        }
        return $albumList;
    }
}



?>
<?php

namespace App\DAO;

use PDO;
use App\Entity\Artist;

/**
 * Artistsテーブルへのデータ操作クラス。
 */
class ArtistDAO {
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
     * キーは部門番号、値はartistsエンティティオブジェクト
     */
    public function findAllTop(): array {
        $sql = "SELECT id, name FROM artists";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute();
        $artistList = [];
        while($row = $stmt->fetch()) {
            $idDb = $row["id"];
            $artistName = $row["name"];
    
            $artist = new Artist();
            $artist->setId($idDb);
            $artist->setArtistName($artistName);
            $artistList[$idDb] = $artist;
        }
        return $artistList;
    }

    public function findAll(): array {
        $sql = "SELECT id, name, img, information FROM artists";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute();
        $artistList = [];
        while($row = $stmt->fetch()) {
            $idDb = $row["id"];
            $artistName = $row["name"];
            $artistImg = $row["img"];
            $artistInfo = $row["information"];
    
            $artist = new Artist();
            $artist->setId($idDb);
            $artist->setArtistName($artistName);
            $artist->setArtistImg($artistImg);
            $artist->setArtistInfo($artistInfo);
            $artistList[$idDb] = $artist;
        }
        return $artistList;
    }
    
    public function findArtists(): array {
        $sql = "SELECT id, name, img FROM artists";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute();
        $artistList = [];
        while($row = $stmt->fetch()) {
            $idDb = $row["id"];
            $artistName = $row["name"];
            $artistImg = $row["img"];
    
            $artist = new Artist();
            $artist->setId($idDb);
            $artist->setArtistName($artistName);
            $artist->setArtistImg($artistImg);
            $artistList[$idDb] = $artist;
        }
        return $artistList;
    }
}

?>
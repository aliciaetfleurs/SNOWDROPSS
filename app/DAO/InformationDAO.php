<?php

namespace App\DAO;

use PDO;
use App\Entity\Information;

/**
 * Informationテーブルへのデータ操作クラス。
 */
class InformationDAO {
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
     * 全お知らせ情報検索
     *
     * @return array 全お知らせ情報が格納された連想配列。キーはお知らせ番号、値はinfomationsエンティティオブジェクト。
     */
    public function findAllTop(): array {
        $sql = "SELECT
            informations.id, 
            informations.title, 
            informations.date, 
            informations.img,
            artists.name AS artists_name,
            genres.name AS genres_name
            FROM informations
            LEFT JOIN artists ON informations.artist_id = artists.id
            LEFT JOIN genres ON informations.genre_id = genres.id";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute();
        $infoList = [];
        while($row = $stmt->fetch()) {
            $idDb = $row["id"];
            $infoTitle = $row["title"];
            $infoImg = $row["img"];
            $infoDate = $row["date"];
            $infoArtistName = $row["artists_name"];
            $infoGenreName = $row["genres_name"];
    
            $info = new Information();
            $info->setId($idDb);
            $info->setInfoTitle($infoTitle);
            $info->setInfoImg($infoImg);
            $info->setInfoDate($infoDate);
            $info->setInfoArtistName($infoArtistName);
            $info->setInfoGenreName($infoGenreName);

            $infoList[$idDb] = $info;
        }
        return $infoList;
    }

    /**
     * 最新お知らせ情報検索
     *
     * @return array 最新お知らせ情報が格納された連想配列。キーはお知らせ番号、値はinfomationsエンティティオブジェクト
     */
    public function findNew(): array {
        $sql = "SELECT TOP (5) informations.id, informations.title, informations.img, informations.date, artists.name AS artists_name FROM informations LEFT JOIN artists ON informations.artist_id = artists.id ORDER BY date DESC";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute();
        $infoNewList = [];
        while($row = $stmt->fetch()) {
            $idDb = $row["id"];
            $infoTitle = $row["title"];
            $infoImg = $row["img"];
            $infoDate = $row["date"];
            $infoArtistName = $row["artists_name"];
    
            $infoNew = new Information();
            $infoNew->setId($idDb);
            $infoNew->setInfoTitle($infoTitle);
            $infoNew->setInfoImg($infoImg);
            $infoNew->setInfoDate($infoDate);
            $infoNew->setInfoArtistName($infoArtistName);

            $infoNewList[$idDb] = $infoNew;
        }
        return $infoNewList;
    }
}

?>
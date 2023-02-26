<?php

namespace App\DAO;

use PDO;
use App\Entity\Genre;

/**
 * Genresテーブルへのデータ操作クラス。
 */
class GenreDAO {
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
     * 全ジャンル情報検索
     *
     * @return array 全部門情報が格納された連想配列
     * キーは部門番号、値はartistsエンティティオブジェクト
     */
    public function findAll(): array {
        $sql = "SELECT id, name FROM genres";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute();
        $genreList = [];
        while($row = $stmt->fetch()) {
            $idDb = $row["id"];
            $genreName = $row["name"];
    
            $genre = new Genre();
            $genre->setId($idDb);
            $genre->setGenreName($genreName);
            $genreList[$idDb] = $genre;
        }
        return $genreList;
    }

}

?>
<?php

namespace App\DAO;

use PDO;
use App\Entity\Follow;

/**
 * Followsテーブルへのデータ操作クラス。
 */
class FollowDAO {
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

    public function delete($artist_id, $user_id) {
        $sql = "DELETE FROM follows WHERE artist_id = :artist_id AND user_id = :user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":artist_id", $artist_id, PDO::PARAM_INT);
        $stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);
        $result = $stmt->execute();
        return $result;
    }
    public function add($id, $artist_id, $user_id, $created_at, $updated_at) {
        $sql = "INSERT INTO follows (id, artist_id, user_id, created_at, updated_at) VALUES (:id, :artist_id, :user_id, :created_at, :updated_at)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $artist_id, PDO::PARAM_INT);
        $stmt->bindValue(":artist_id", $artist_id, PDO::PARAM_INT);
        $stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);
        $stmt->bindValue(":created_at", $created_at, PDO::PARAM_STR);
        $stmt->bindValue(":updated_at", $updated_at, PDO::PARAM_STR);
        $result = $stmt->execute();
        return $result;
    }
}

?>
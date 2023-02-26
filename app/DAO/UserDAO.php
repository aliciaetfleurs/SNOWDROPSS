<?php

namespace App\DAO;

use PDO;
use App\Entity\User;

/**
 * usersテーブルへのデータ操作クラス。
 */
class UserDAO {
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
     * キーは部門番号、値はusersエンティティオブジェクト
     */
    public function findByPK($id): array {
        $sql = "SELECT * FROM users WHERE users.id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        $userList = [];
        while($row = $stmt->fetch()) {
            $idDb = $row["id"];
            $userName = $row["name"];
            $primaryImg = $row["primary_img"];
            $secondaryImg = $row["secondary_img"];
    
            $user = new user();
            $user->setId($idDb);
            $user->setUserName($userName);
            $user->setPrimaryImg($primaryImg);
            $user->setSecondaryImg($secondaryImg);
            $userList[$idDb] = $user;
        }
        return $userList;
    }
}

?>
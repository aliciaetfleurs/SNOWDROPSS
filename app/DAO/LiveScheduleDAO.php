<?php

namespace App\DAO;

use PDO;
use App\Entity\LiveSchedule;

/**
 * LiveSchedulesテーブルへのデータ操作クラス。
 */
class LiveScheduleDAO {
    
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

    public function findLiveSchedule(int $follow_user_id, int $user_id): array{
        $sql = "SELECT 
        live_schedules.name,
        live_schedules.place,   
        live_schedules.start_time,            
        live_schedules.end_time,            
        live_schedules.artist_id,
        users.primary_img
        users.name AS user_name,
        FROM live_schedules 
        LEFT JOIN users ON live_schedules.artist_id = users.id
        LEFT JOIN follows ON follows.artist_id = users.id
        WHERE live_schedules.artist_id = :follow_user_id
        AND follows.user_id = :user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":follow_user_id", $follow_user_id, PDO::PARAM_INT);
        $stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);
        $result = $stmt->execute();
        $liveList = [];
        while($row = $stmt->fetch()) {
            $idDb = $row["id"];
            $liveName = $row["user_name"];
            $livePlace = $row["place"];
            $liveStartTime = $row["start_time"];
            $liveEndTime = $row["end_time"];
            $liveArtistId = $row["artist_id"];
            $userPrimaryImg = $row["primary_img"];
            $userName = $row["user_name"];            
    
            $live = new LiveSchedule();
            $live->setId($idDb);
            $live->setLiveName($liveName);
            $live->setLivePlace($livePlace);            
            $live->setLiveStartTime($liveStartTime);
            $live->setLiveEndTime($liveEndTime);
            $live->setLiveArtistId($liveArtistId);
            $live->setUserPrimaryImg($userPrimaryImg);
            $live->setUserName($userName);
            $liveList[$idDb] = $live;
        }
        return $liveList;
    }
}



?>
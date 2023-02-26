<?php

namespace App\Entity;

class LiveSchedule {
    /**
     * ID
     */
    private ?int $id = null;
    /**
     * ライブ名
     */
    private ?string $liveName = "";
    /**
     * ライブ場所
     */
    private ?string $livePlace = "";
    /**
     * ライブタイプ
     */
    private ?int $liveType = null;
    /**
     * ライブ開始時間
     */
    private ?string $liveStartTime = "";
    /**
     * ライブ終了時間
     */
    private ?string $liveEndTime = "";
    /**
     * ライブアーティストID
     */
    private ?int $liveArtistId = null;
    /**
     * フォローユーザーID
     */
    private ?string $userPrimaryImg = "";
    /**
     * フォローユーザーID
     */
    private ?string $userName = "";
    

    //以下アクセサメソッド。

    public function getId(): ?int {
        return $this->id;
    }
    public function setId(?int $id): void {
        $this->id = $id;
    }
    public function getLiveName(): ?string {
        return $this->liveName;
    }
    public function setLiveName(?string $liveName): void {
        $this->liveName = $liveName;
    }
    public function getLivePlace(): ?string {
        return $this->livePlace;
    }
    public function setLivePlace(?string $livePlace): void {
        $this->livePlace = $livePlace;
    }
    public function getLiveType(): ?int {
        return $this->liveType;
    }
    public function setLiveType(?int $liveType): void {
        $this->liveType = $liveType;
    }
    public function getLiveStartTime(): ?string {
        return $this->liveStartTime;
    }
    public function setLiveStartTime(?string $liveStartTime): void {
        $this->liveStartTime = $liveStartTime;
    }
    public function getLiveEndTime(): ?string {
        return $this->liveEndTime;
    }
    public function setLiveEndTime(?string $liveEndTime): void {
        $this->liveEndTime = $liveEndTime;
    }
    public function getLiveArtistId(): ?int {
        return $this->liveArtistId;
    }
    public function setLiveArtistId(?int $liveArtistId): void {
        $this->liveArtistId = $liveArtistId;
    }
    public function getUserPrimaryImg(): ?string {
        return $this->userPrimaryImg;
    }
    public function setUserPrimaryImg(?string $userPrimaryImg): void {
        $this->userPrimaryImg = $userPrimaryImg;
    }
    public function getUserName(): ?string {
        return $this->userName;
    }
    public function setUserName(?string $userName): void {
        $this->userName = $userName;
    }
}

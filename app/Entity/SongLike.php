<?php

namespace App\Entity;

class SongLike {
    /**
     * ID
     */
    private ?int $id = null;
    /**
     * ソングID
     */
    private ?int $songId = null;
    /**
     * ユーザーID
     */
    private ?int $userId = null;
    /**
     * 作成日
     */
    private ?string $createdAt = "";
    /**
     * 更新日
     */
    private ?string $updatedAt = "";


    // アクセサメソッド
    public function getId(): ?int {
        return $this->id;
    }
    public function setId(?int $id): void {
        $this->id = $id;
    }
    public function getSongId(): ?int {
        return $this->songId;
    }
    public function setSongId(?int $songId): void {
        $this->songId = $songId;
    }
    public function getUserId(): ?int {
        return $this->userId;
    }
    public function setUserId(?int $userId): void {
        $this->userId = $userId;
    }
    public function getCreatedAt(): ?string {
        return $this->createdAt;
    }
    public function setCreatedAt(?string $createdAt): void {
        $this->createdAt = $createdAt;
    }
    public function getUpdatedAt(): ?string {
        return $this->updatedAt;
    }
    public function setUpdatedAt(?string $updatedAt): void {
        $this->updatedAt = $updatedAt;
    }
    
}

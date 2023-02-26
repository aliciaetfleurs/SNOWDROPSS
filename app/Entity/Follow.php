<?php

namespace App\Entity;

class Follow {
    /**
     * ID
     */
    private ?int $id = null;
    /**
     * フォローしたユーザーID
     */
    private ?int $artistId = null;
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
    /**
     * 削除日
     */
    private ?string $deletedAt = "";

    
    //以下アクセサメソッド。
    public function getId(): ?int {
        return $this->id;
    }
    public function setId(?int $id): void {
        $this->id = $id;
    }
    public function getArtistId(): ?int {
        return $this->artistId;
    }
    public function setArtistId(?int $artistId): void {
        $this->artistId = $artistId;
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
    public function getDeletedAt(): ?string {
        return $this->deletedAt;
    }
    public function setDeletedAt(?string $deletedAt): void {
        $this->deletedAt = $deletedAt;
    }
}

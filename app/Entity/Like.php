<?php

namespace App\Entity;

class Like {
    /**
     * ID
     */
    private ?int $id = null;
    /**
     * ユーザーID
     */
    private ?int $userId = null;
    /**
     * ソングID
     */
    private ?int $songId = null;
    /**
     * アルバムID
     */
    private ?int $albumId = null;
    /**
     * プレイリストID
     */
    private ?int $playlistId = null;
    /**
     * 更新日
     */
    private ?string $updatedAt = "";
    

    //以下アクセサメソッド。

    public function getId(): ?int {
        return $this->id;
    }
    public function setId(?int $id): void {
        $this->id = $id;
    }
    public function getUserId(): ?int {
        return $this->userId;
    }
    public function setUserId(?int $userId): void {
        $this->userId = $userId;
    }
    public function getSongId(): ?int {
        return $this->songId;
    }
    public function setSongId(?int $songId): void {
        $this->songId = $songId;
    }
    public function getAlbumId(): ?int {
        return $this->albumId;
    }
    public function setAlbumId(?int $albumId): void {
        $this->albumId = $albumId;
    }
    public function getPlaylistId(): ?int {
        return $this->playlistId;
    }
    public function setPlaylistId(?int $playlistId): void {
        $this->playlistId = $playlistId;
    }
    public function getUpdatedAt(): ?string {
        return $this->updatedAt;
    }
    public function setUpdatedAt(?string $updatedAt): void {
        $this->updatedAt = $updatedAt;
    }
}

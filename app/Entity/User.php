<?php

namespace App\Entity;

class User {
    /**
     * ID
     */
    private ?int $id = null;
    /**
     * アーティスト名
     */
    private ?string $userName = "";
    /**
     * アイコン
     */
    private ?string $primaryFile = "";
    /**
     * ヘッダー
     */
    private ?string $secondaryFile = "";
    

    //以下アクセサメソッド。

    public function getId(): ?int {
        return $this->id;
    }
    public function setId(?int $id): void {
        $this->id = $id;
    }
    public function getUserName(): ?string {
        return $this->userName;
    }
    public function setUserName(?string $userName): void {
        $this->userName = $userName;
    }
    public function getPrimaryImg(): ?string {
        return $this->primaryFile;
    }
    public function setPrimaryImg(?string $primaryFile): void {
        $this->primaryFile = $primaryFile;
    }
    public function getSecondaryImg(): ?string {
        return $this->secondaryFile;
    }
    public function setSecondaryImg(?string $secondaryFile): void {
        $this->secondaryFile = $secondaryFile;
    }
}

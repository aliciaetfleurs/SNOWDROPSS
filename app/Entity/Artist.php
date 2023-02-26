<?php

namespace App\Entity;

class Artist {
    /**
     * ID
     */
    private ?int $id = null;
    /**
     * アーティスト名
     */
    private ?string $artistName = "";
    /**
     * アーティスト情報
     */
    private ?string $artistInfo = "";
    /**
     * アーティストイメージ
     */
    private ?string $artistImg = "";
    

    //以下アクセサメソッド。

    public function getId(): ?int {
        return $this->id;
    }
    public function setId(?int $id): void {
        $this->id = $id;
    }
    public function getArtistName(): ?string {
        return $this->artistName;
    }
    public function setArtistName(?string $artistName): void {
        $this->artistName = $artistName;
    }
    public function getArtistInfo(): ?string {
        return $this->artistInfo;
    }
    public function setArtistInfo(?string $artistInfo): void {
        $this->artistInfo = $artistInfo;
    }
    public function getArtistImg(): ?string {
        return $this->artistImg;
    }
    public function setArtistImg(?string $artistImg): void {
        $this->artistImg = $artistImg;
    }
}

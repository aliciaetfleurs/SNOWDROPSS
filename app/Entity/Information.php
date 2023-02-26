<?php

namespace App\Entity;

class Information {
    /**
     * ID
     */
    private ?int $id = null;
    /**
     * お知らせタイトル
     */
    private ?string $infoTitle = "";
    /**
     * お知らせイメージ
     */
    private ?string $infoImg = "";
    /**
     * お知らせ内容
     */
    private ?string $infoContent = "";
    /**
     * 投稿日
     */
    private ?string $infoDate = "";
    /**
     * アーティスト
     */
    private ?string $infoArtistName = "";
    /**
     * ジャンル
     */
    private ?string $infoGenreName = "";
    


    //以下アクセサメソッド。

    public function getId(): ?int {
        return $this->id;
    }
    public function setId(?int $id): void {
        $this->id = $id;
    }
    public function getInfoTitle(): ?string {
        return $this->infoTitle;
    }
    public function setInfoTitle(?string $infoTitle): void {
        $this->infoTitle = $infoTitle;
    }
    public function getInfoImg(): ?string {
        return $this->infoImg;
    }
    public function setInfoImg(?string $infoImg): void {
        $this->infoImg = $infoImg;
    }
    public function getInfoContent(): ?string {
        return $this->infoContent;
    }
    public function setInfoContent(?string $infoContent): void {
        $this->infoContent = $infoContent;
    }
    public function getInfoDate(): ?string {
        return $this->infoDate;
    }
    public function setInfoDate(?string $infoDate): void {
        $this->infoDate = $infoDate;
    }
    public function getInfoArtistName(): ?string {
        return $this->infoArtistName;
    }
    public function setInfoArtistName(?string $infoArtistName): void {
        $this->infoArtistName = $infoArtistName;
    }
    public function getInfoGenreName(): ?string {
        return $this->infoGenreName;
    }
    public function setInfoGenreName(?string $infoGenreName): void {
        $this->infoGenreName = $infoGenreName;
    }
}

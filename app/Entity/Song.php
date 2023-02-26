<?php

namespace App\Entity;

class Song {
    /**
     * ID
     */
    private ?int $id = null;
    /**
     * アルバム名
     */
    private ?string $songName = "";
    /**
     * 作曲者
     */
    private ?string $songComposer = "";
    /**
     * リリース日
     */
    private ?string $songDate = "";
    /**
     * トラック数
     */
    private ?int $songTrackNumber = null;
    /**
     * ディスク数
     */
    private ?int $songDiscNumber = null;
    /**
     * 表現
     */
    private ?int $songExplicit = null;
    /**
     * 歌詞
     */
    private ?string $songLyrics = "";
    /**
     * ジャンル
     */
    private ?string $songGenreId = null;
    /**
     * アルバムID
     */ 
    private ?int $songArtistId = null;
    /**
     * アルバムID
     */
    private ?int $songAlbumId = null;
    /**
     * ファイルネーム
     */
    private ?string $fileName = "";
    /**
     * ファイル拡張子
     */
    private ?string $fileExt = "";



    //以下アクセサメソッド。

    public function getId(): ?int {
        return $this->id;
    }
    public function setId(?int $id): void {
        $this->id = $id;
    }
    public function getSongName(): ?string {
        return $this->songName;
    }
    public function setSongName(?string $songName): void {
        $this->songName = $songName;
    }
    public function getSongComposer(): ?string {
        return $this->songComposer;
    }
    public function setSongComposer(?string $songComposer): void {
        $this->songComposer = $songComposer;
    }
    public function getSongDate(): ?string {
        return $this->songDate;
    }
    public function setSongDate(?string $songDate): void {
        $this->songDate = $songDate;
    }
    public function getSongTrackNumber(): ?int {
        return $this->songTrackNumber;
    }
    public function setSongTrackNumber(?int $songTrackNumber): void {
        $this->songTrackNumber = $songTrackNumber;
    }
    public function getSongDiscNumber(): ?int {
        return $this->songDiscNumber;
    }
    public function setSongDiscNumber(?int $songDiscNumber): void {
        $this->songDiscNumber = $songDiscNumber;
    }
    public function getSongExplicit(): ?int {
        return $this->songExplicit;
    }
    public function setSongExplicit(?int $songExplicit): void {
        $this->songExplicit = $songExplicit;
    }
    public function getSongLyrics(): ?string {
        return $this->songLyrics;
    }
    public function setSongLyrics(?string $songLyrics): void {
        $this->songLyrics = $songLyrics;
    }
    public function getGenreId(): ?int {
        return $this->songGenreId;
    }
    public function setGenreId(?int $genreId): void {
        $this->songGenreId = $genreId;
    }
    public function getArtistId(): ?int {
        return $this->songArtistId;
    }
    public function setArtistId(?int $songArtistId): void {
        $this->songArtistId = $songArtistId;
    }
    public function getAlbumId(): ?int {
        return $this->songAlbumId;
    }
    public function setAlbumId(?int $songAlbumId): void {
        $this->songAlbumId = $songAlbumId;
    }
    public function getFileName(): ?string {
        return $this->fileName;
    }
    public function setFileName(?string $fileName): void {
        $this->fileName = $fileName;
    }
    public function getFileExt(): ?string {
        return $this->fileExt;
    }
    public function setFileExt(?string $fileExt): void {
        $this->fileExt = $fileExt;
    }
}

<?php

namespace App\Entity;

class Album {
    /**
     * ID
     */
    private ?int $id = null;
    /**
     * アルバム名
     */
    private ?string $albumName = "";
    /**
     * 作曲者
     */
    private ?string $albumComposer = "";
    /**
     * リリース日
     */
    private ?string $albumDate = "";
    /**
     * トラック数
     */
    private ?int $albumTrackTotal = null;
    /**
     * ディスク数
     */
    private ?int $albumDiscTotal = null;
    /**
     * 表現
     */
    private ?int $albumExplicit = null;
    /**
     * アルバムイメージ
     */
    private ?string $albumImg = "";
    /**
     * アルバムタイプ
     */
    private ?int $albumType = null;
    /**
     * アルバムアーティストID
     */
    private ?int $albumArtistId = null;
    /**
     * ジャンルID
     */
    private ?string $genreName = "";
    /**
     * アーティストID
     */
    private ?string $artistName = "";
    /**
     * ファイル名
     */
    private ?string $fileName = "";
    /**
     * ファイル拡張子
     */
    private ?string $fileExt = "";
     /**
     * アルバムの曲ID
     */
    private ?int $artistId = null;
    /**
     * 検索結果(値)
     */
    private ?string $searchValue = "";
    /**
     * アルバムの曲ID
     */
    private ?int $songId = null;



    //以下アクセサメソッド。

    public function getId(): ?int {
        return $this->id;
    }
    public function setId(?int $id): void {
        $this->id = $id;
    }
    public function getAlbumName(): ?string {
        return $this->albumName;
    }
    public function setAlbumName(?string $albumName): void {
        $this->albumName = $albumName;
    }
    public function getAlbumComposer(): ?string {
        return $this->albumComposer;
    }
    public function setAlbumComposer(?string $albumComposer): void {
        $this->albumComposer = $albumComposer;
    }
    public function getAlbumDate(): ?string {
        return $this->albumDate;
    }
    public function setAlbumDate(?string $albumDate): void {
        $this->albumDate = $albumDate;
    }
    public function getAlbumTrackTotal(): ?int {
        return $this->albumTrackTotal;
    }
    public function setAlbumTrackTotal(?int $albumTrackTotal): void {
        $this->albumTrackTotal = $albumTrackTotal;
    }
    public function getAlbumDiscTotal(): ?int {
        return $this->albumDiscTotal;
    }
    public function setAlbumDiscTotal(?int $albumDiscTotal): void {
        $this->albumDiscTotal = $albumDiscTotal;
    }
    public function getAlbumExplicit(): ?int {
        return $this->albumExplicit;
    }
    public function setAlbumExplicit(?int $albumExplicit): void {
        $this->albumExplicit = $albumExplicit;
    }
    public function getAlbumImg(): ?string {
        return $this->albumImg;
    }
    public function setAlbumImg(?string $albumImg): void {
        $this->albumImg = $albumImg;
    }
    public function getAlbumType(): ?int {
        return $this->albumType;
    }
    public function setAlbumType(?int $albumType): void {
        $this->albumType = $albumType;
    }
    public function getAlbumArtistId(): ?int {
        return $this->albumArtistId;
    }
    public function setAlbumArtistId(?int $albumArtistId): void {
        $this->albumArtistId = $albumArtistId;
    }
    public function getGenreName(): ?string {
        return $this->genreName;
    }
    public function setGenreName(?string $genreName): void {
        $this->genreName = $genreName;
    }
    public function getUserName(): ?string {
        return $this->userName;
    }
    public function setUserName(?string $userName): void {
        $this->userName = $userName;
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
    public function getArtistId(): ?int {
        return $this->artistId;
    }
    public function setArtistId(?int $artistId): void {
        $this->artistId = $artistId;
    }
    public function getAlbumExplicitClass(): ?string {
        if($this->albumExplicit == 0 || $this->albumExplicit == null){
            return $this->albumExplicitClass = 'explicitPassive';
        }
        elseif($this->albumExplicit == 1){
            return $this->albumExplicitClass = 'explicitActive';
        }else{
            return false;
        }
    }
    public function getAlbumTypeString(): ?string {
        if($this->albumType == 0){
            return $this->albumTypeString = 'SINGLE';
        }
        elseif($this->albumType == 1){
            return $this->albumTypeString = 'EP';
        }
        elseif($this->albumType == 2){
            return $this->albumTypeString = 'ALBUM';
        }else{
            return false;
        }
    }
    public function getAlbumDateYear(): ?string {
        if(!empty($this->albumDate)){
            return substr($this->albumDate, 0, 4);
        }else{
            return false;
        }
    }
    public function getAlbumDateMonth(): ?string {
        if(!empty($this->albumDate)){
            return substr($this->albumDate, 4, 2);
        }else{
            return false;
        }
    }
    public function getAlbumDateDay(): ?string {
        if(!empty($this->albumDate)){
            return substr($this->albumDate, 6, 2);
        }else{
            return false;
        }
    }
    public function getSearchValue(): ?string {
        return $this->searchValue;
    }
    public function setSearchValue(?string $searchValue): void {
        $this->searchValue = $searchValue;
    }
    public function getSongId(): ?int {
        return $this->songId;
    }
    public function setSongId(?int $songId): void {
        $this->songId = $songId;
    }
}

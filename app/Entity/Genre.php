<?php

namespace App\Entity;

class Genre {
    /**
     * ID
     */
    private ?int $id = null;
    /**
     * アルバム名
     */
    private ?string $genreName = "";
    

    //以下アクセサメソッド。

    public function getId(): ?int {
        return $this->id;
    }
    public function setId(?int $id): void {
        $this->id = $id;
    }
    public function getGenreName(): ?string {
        return $this->genreName;
    }
    public function setGenreName(?string $genreName): void {
        $this->genreName = $genreName;
    }
}

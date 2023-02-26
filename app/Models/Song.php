<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'song_id',
        'user_id',
    ];

    public function songLikes()
    {
        return $this->hasMany(SongLike::class);
    }

    //後でViewで使う、いいねされているかを判定するメソッド。
    public function isLiked($user_id): bool {
        return $this->likes()->where('user_id', $user_id)->exists();
    }
}

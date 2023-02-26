<?php

namespace App\Models;

use App\Entity\Artist;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes as EloquentSoftDeletes;

class Albums extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'composer',
        'date',
        'track_total',
        'disc_total',
        'explicit',
        'img',
        'ext',
        'genre_id',
        'artist_id'
    ];
}

Albums::find(2)->delete();

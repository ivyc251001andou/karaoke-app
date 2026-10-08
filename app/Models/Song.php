<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Record;
use App\Models\Favorite;

class Song extends Model
{
    protected $fillable = [
        'title',
        'artist',
        'era',
        'genre',
    ];

    public function records()
    {
        return $this->hasMany(Record::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
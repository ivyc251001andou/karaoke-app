<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
        'user_id',
        'song_id',
        'score',
        'comment',
        'sung_at',
    ];

    protected $casts = [
        'sung_at' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function song()
    {
        return $this->belongsTo(Song::class);
    }
}
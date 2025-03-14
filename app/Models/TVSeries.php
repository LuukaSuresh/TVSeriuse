<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TVSeries extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'stream', 'language', 'country', 'genre', 'short_intro', 
        'complete_season', 'is_stream_over', 'image'
    ];
}

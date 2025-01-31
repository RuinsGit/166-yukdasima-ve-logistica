<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeHero extends Model
{
    use HasFactory;

    protected $fillable = [
        'media_type',
        'media_path',
        'alt_az',
        'alt_en',
        'alt_ru',
        'video_title',
        'status'
    ];
} 
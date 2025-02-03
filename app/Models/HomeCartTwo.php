<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeCartTwo extends Model
{
    use HasFactory;

    protected $fillable = [
        'text_az',
        'text_en',
        'text_ru',
        'image_path',
        'alt_az',
        'alt_en',
        'alt_ru',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];
} 
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeCart extends Model
{
    use HasFactory;

    protected $fillable = [
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
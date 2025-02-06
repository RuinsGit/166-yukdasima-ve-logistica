<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_az',
        'name_en',
        'name_ru',
        'image_path',
        'position',
        'status',
        'position_az',
        'position_en',
        'position_ru'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];
} 
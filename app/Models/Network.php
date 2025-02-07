<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_az',
        'name_en',
        'name_ru',
        'address_az',
        'address_en',
        'address_ru',
        'image_path',
        'status',
        'country_code'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];
} 
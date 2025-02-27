<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactPhoto extends Model
{
    protected $fillable = [
        'title_az',
        'title_en',
        'title_ru',
        'image_path',
        'image_alt',
        'status'
    ];
} 
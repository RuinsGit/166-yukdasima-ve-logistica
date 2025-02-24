<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogHero extends Model
{
    protected $fillable = [
        'image_path',
        'alt_az',
        'alt_en',
        'alt_ru',
        'status'
    ];
    public function getAltAttribute()
    {
        return $this->{'alt_' . app()->getLocale()};
    }
    protected $casts = [
        'status' => 'boolean'
    ];
} 
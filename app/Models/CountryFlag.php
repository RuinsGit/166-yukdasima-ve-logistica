<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryFlag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_az',
        'name_en',
        'name_ru',
        'image_path',
        'alt_az',
        'alt_en',
        'alt_ru',
        'status'
    ];
    public function getNameAttribute()
    {
        return $this->{'name_' . app()->getLocale()};
    }
    public function getAltAttribute()
    {
        return $this->{'alt_' . app()->getLocale()};
    }



    protected $casts = [
        'status' => 'boolean'
    ];
} 
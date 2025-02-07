<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_az',
        'name_en',
        'name_ru',
        'number_one',
        'number_two',
        'text_one_az',
        'text_one_en',
        'text_one_ru',
        'text_two_az',
        'text_two_en',
        'text_two_ru',
        'image_path',
        'alt_az',
        'alt_en',
        'alt_ru',
        'status'
    ];
    public function getTextOneAttribute()
    {
        return $this->{'text_one_' . app()->getLocale()};
    }
    public function getTextTwoAttribute()
    {
        return $this->{'text_two_' . app()->getLocale()};
    }
    public function getAltAttribute()
    {
        return $this->{'alt_' . app()->getLocale()};
    }
    protected $casts = [
        'status' => 'boolean'
    ];

} 
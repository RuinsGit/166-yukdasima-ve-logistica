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
        'status',
        'bottom_image_path',
        'bottom_alt_az',
        'bottom_alt_en',
        'bottom_alt_ru'
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
        
    
    public function getNameAttribute()
    {
        return $this->{'name_' . app()->getLocale()};
    }

    protected $casts = [
        'status' => 'boolean'
    ];

    public function getBottomImageAttribute()
    {
        return $this->bottom_image_path ? asset('storage/'.$this->bottom_image_path) : null;
    }

    public function getBottomAltAttribute()
    {
        return $this->{'bottom_alt_'.app()->getLocale()};
    }
} 
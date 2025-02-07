<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurClient extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_image_path',
        'text_az', 'text_en', 'text_ru',
        'description_az', 'description_en', 'description_ru',
        'main_alt_az', 'main_alt_en', 'main_alt_ru',
        'bottom_image1_path', 'bottom_image2_path',
        'bottom1_alt_az', 'bottom1_alt_en', 'bottom1_alt_ru',
        'bottom2_alt_az', 'bottom2_alt_en', 'bottom2_alt_ru',
        'status',
        'meta_title_az', 'meta_title_en', 'meta_title_ru',
        'meta_description_az', 'meta_description_en', 'meta_description_ru'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function getTextAttribute()
    {
        return $this->{"text_".app()->getLocale()};
    }

    public function getDescriptionAttribute()
    {
        return $this->{"description_".app()->getLocale()};
    }

    public function getMainAltAttribute()
    {
        return $this->{"main_alt_".app()->getLocale()};
    }

    public function getBottom1AltAttribute()
    {
        return $this->{"bottom1_alt_".app()->getLocale()};
    }

    public function getBottom2AltAttribute()
    {
        return $this->{"bottom2_alt_".app()->getLocale()};
    }

    public function getMetaTitleAttribute()
    {
        return $this->{"meta_title_".app()->getLocale()};
    }

    public function getMetaDescriptionAttribute()
    {
        return $this->{"meta_description_".app()->getLocale()};
    }
} 
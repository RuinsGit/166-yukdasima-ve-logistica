<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicesHero extends Model
{
    protected $table = 'services_heroes';
    
    protected $fillable = [
        'main_image_path',
        'experience_text_az',
        'experience_text_en',
        'experience_text_ru',
        'experience_description_az',
        'experience_description_en',
        'experience_description_ru',
        'experience_image_path',
        'manager_text_az',
        'manager_text_en',
        'manager_text_ru',
        'manager_description_az',
        'manager_description_en',
        'manager_description_ru',
        'manager_image_path',
        'security_text_az',
        'security_text_en',
        'security_text_ru',
        'security_description_az',
        'security_description_en',
        'security_description_ru',
        'security_image_path',
        'main_image_alt_az',
        'main_image_alt_en',
        'main_image_alt_ru',
        'experience_image_alt_az',
        'experience_image_alt_en',
        'experience_image_alt_ru',
        'manager_image_alt_az',
        'manager_image_alt_en',
        'manager_image_alt_ru',
        'security_image_alt_az',
        'security_image_alt_en',
        'security_image_alt_ru',
        'status'
    ];
    public function getExperienceTextAttribute()
    {
        return $this->{'experience_text_' . app()->getLocale()};
    }
    public function getManagerTextAttribute()
    {
        return $this->{'manager_text_' . app()->getLocale()};
    }
    public function getSecurityTextAttribute()
    {
        return $this->{'security_text_' . app()->getLocale()};
    }
    public function getExperienceDescriptionAttribute()
    {
        return $this->{'experience_description_' . app()->getLocale()};
    }
    public function getManagerDescriptionAttribute()
    {
        return $this->{'manager_description_' . app()->getLocale()};
    }
    public function getSecurityDescriptionAttribute()
    {
        return $this->{'security_description_' . app()->getLocale()};
    }
    public function getMainImageAltAttribute()
    {
        return $this->{'main_image_alt_' . app()->getLocale()};
    }
    public function getExperienceImageAltAttribute()    
    {
        return $this->{'experience_image_alt_' . app()->getLocale()};
    }
    public function getManagerImageAltAttribute()
    {
        return $this->{'manager_image_alt_' . app()->getLocale()};
    }
    public function getSecurityImageAltAttribute()
    {
        return $this->{'security_image_alt_' . app()->getLocale()};
    }
    public function getMainImageAttribute()
    {
        return asset('storage/' . $this->main_image_path);
    }
    public function getExperienceImageAttribute()
    {
        return asset('storage/' . $this->experience_image_path);
    }
    public function getManagerImageAttribute()
    {
        return asset('storage/' . $this->manager_image_path);
    }
    public function getSecurityImageAttribute()
    {
        return asset('storage/' . $this->security_image_path);
    }   
    

    



    protected $casts = [
        'status' => 'boolean'
    ];
} 
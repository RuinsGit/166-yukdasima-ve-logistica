<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_az',
        'name_en',
        'name_ru',
        'text_az',
        'text_en', 
        'text_ru',
        'text_2_az',
        'text_2_en',
        'text_2_ru',
        'description_az',
        'description_en',
        'description_ru',
        'description_2_az',
        'description_2_en',
        'description_2_ru',
        'description_3_az',
        'description_3_en',
        'description_3_ru',
        'image_path',
        'bottom_image_path',
        'multiple_image_path',
        'alt_az',
        'alt_en',
        'alt_ru',
        'bottom_alt_az',
        'bottom_alt_en',
        'bottom_alt_ru',
        'status',
        'slug_az',
        'slug_en',
        'slug_ru',
        'meta_title_az',
        'meta_title_en',
        'meta_title_ru',
        'meta_description_az',
        'meta_description_en',
        'meta_description_ru',
        'tags',
    ];
    public function getNameAttribute()
    {
        return $this->{'name_' . app()->getLocale()};
    }
    public function getTextAttribute()
    {
        return $this->{'text_' . app()->getLocale()};
    }
    public function getText2Attribute()
    {
        return $this->{'text_2_' . app()->getLocale()};
    }
    public function getDescriptionAttribute()
    {
        return $this->{'description_' . app()->getLocale()};
    }

    public function getDescription2Attribute()
    {
        $locale = app()->getLocale();
        // Fallback mekanizması ekleyelim (örneğin İngilizce)
        return $this->{"description_2_$locale"} ?? $this->description_2_en;
    }
    
    public function getDescription3Attribute()
    {
        return $this->{'description_3_' . app()->getLocale()};
    }
    public function getImageAttribute()
    {
        return $this->{'image_path_' . app()->getLocale()};
    }
    public function getBottomImageAttribute()
    {
        return $this->{'bottom_image_path_' . app()->getLocale()};
    }
    public function getAltAttribute()
    {
        return $this->{'alt_' . app()->getLocale()};
    }
    public function getBottomAltAttribute()
    {
        return $this->{'bottom_alt_' . app()->getLocale()};
    }
    public function getSlugAttribute()
    {
        return $this->{'slug_' . app()->getLocale()};
    }
    public function getMetaTitleAttribute()
    {
        return $this->{'meta_title_' . app()->getLocale()};
    }
    public function getMetaDescriptionAttribute()
    {
        return $this->{'meta_description_' . app()->getLocale()};
    }

    protected $casts = [
        'status' => 'boolean',
        'multiple_image_path' => 'array',
        'tags' => 'array'
    ];

    // Tag'leri küçük harfe çeviren accessor
    public function getTagsAttribute($value)
    {
        if (!$value) return [];
        return is_array($value) ? $value : json_decode($value, true);
    }

    // Tag'leri JSON'a çeviren mutator
    public function setTagsAttribute($value)
    {
        $tags = is_array($value) ? $value : [];
        $this->attributes['tags'] = json_encode(
            array_map('strtolower', array_map('trim', $tags))
        );
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug_az = $model->slug_az ?: Str::slug($model->name_az);
            $model->slug_en = $model->slug_en ?: Str::slug($model->name_en);
            $model->slug_ru = $model->slug_ru ?: Str::slug($model->name_ru);
        });
    }

    public function images()
    {
        return $this->hasMany(BlogImage::class, 'blog_id');
    }
} 
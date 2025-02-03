<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_type_id',
        'name_az',
        'name_en',
        'name_ru',
        'text_az',
        'text_en', 
        'text_ru',
        'description_az',
        'description_en',
        'description_ru',
        'image_path',
        'bottom_image_path',
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
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug_az = $model->slug_az ?: Str::slug($model->name_az);
            $model->slug_en = $model->slug_en ?: Str::slug($model->name_en);
            $model->slug_ru = $model->slug_ru ?: Str::slug($model->name_ru);
        });
    }

    public function type()
    {
        return $this->belongsTo(BlogType::class, 'blog_type_id');
    }
} 
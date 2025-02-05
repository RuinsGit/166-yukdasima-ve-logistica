<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_type_id',
        'slug_az',
        'slug_en',
        'slug_ru',
        'name_az',
        'name_en',
        'name_ru',
        'text_az',
        'text_en',
        'text_ru',
        'description_az',
        'description_en',
        'description_ru',
        'image_main',
        'image_main_alt_az',
        'image_main_alt_en',
        'image_main_alt_ru',
        'image_bottom',
        'image_bottom_alt_az',
        'image_bottom_alt_en',
        'image_bottom_alt_ru',
        'description2_az',
        'description2_en',
        'description2_ru',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function type()
    {
        return $this->belongsTo(ServiceType::class, 'service_type_id');
    }
} 
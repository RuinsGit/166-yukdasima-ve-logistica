<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_az', 'name_en', 'name_ru',
        'text_az', 'text_en', 'text_ru',
        'description_az', 'description_en', 'description_ru',
        'image_path',
        'services_number',
        'customer_number',
        'satisfied_number',
        'transportations_number',
        'services_text_az', 'services_text_en', 'services_text_ru',
        'customer_text_az', 'customer_text_en', 'customer_text_ru',
        'satisfied_text_az', 'satisfied_text_en', 'satisfied_text_ru',
        'transportation_text_az', 'transportation_text_en', 'transportation_text_ru',
        'status'
    ];

    public function setImagePathAttribute($value)
    {
        if ($value instanceof \Illuminate\Http\UploadedFile) {
            $this->attributes['image_path'] = $value->store('about', 'public');
        } else {
            $this->attributes['image_path'] = $value;
        }
    }
} 
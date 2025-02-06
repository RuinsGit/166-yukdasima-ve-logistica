<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactData extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_az',
        'title_en',
        'title_ru',
        'text_az',
        'text_en',
        'text_ru',
        'contact_title_az',
        'contact_title_en',
        'contact_title_ru',
        'image_path',
        'status'
    ];
} 
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThemeSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'background_type',
        'background_image',
        'background_color',
        'header_color',
        'sidebar_width',
        'dark_mode',
        'footer_text',
        'footer_bg_color',
        'footer_text_color'
    ];
} 
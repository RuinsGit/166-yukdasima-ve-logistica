<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_az',
        'address_en',
        'address_ru',
        'address_image',
        'mail',
        'mail_image',
        'number',
        'number_image',
        'status'
    ];
} 
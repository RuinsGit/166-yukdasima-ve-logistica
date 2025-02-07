<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_az',
        'name_en',
        'name_ru',
        'address_az',
        'address_en',
        'address_ru',
        'image_path',
        'status',
        'country_code'
    ];

    public function getNameAttribute()
    {
        return $this->{'name_' . app()->getLocale()};
    }

    public function getAddressAttribute()
    {
        return $this->{'address_' . app()->getLocale()};
    }


    protected $casts = [
        'status' => 'boolean'
    ];

} 
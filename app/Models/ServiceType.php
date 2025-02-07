<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_az',
        'name_en',
        'name_ru',
        'image',
        'number',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function getNameAttribute()
    {
        return $this->{'name_'.app()->getLocale()};
    }
} 
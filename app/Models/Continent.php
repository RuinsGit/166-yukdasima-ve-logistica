<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    protected $fillable = ['name_az', 'name_en', 'name_ru', 'status'];

    public function networkSections()
    {
        return $this->hasMany(NetworkSection::class);
    }
} 
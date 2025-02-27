<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NetworkSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'continent_id',
        'ulke_adi_az',
        'ulke_adi_en',
        'ulke_adi_ru',
        'status',
    ];

    public function continent()
    {
        return $this->belongsTo(Continent::class);
    }
}

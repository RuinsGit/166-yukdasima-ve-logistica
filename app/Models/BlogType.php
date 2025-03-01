<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_az',
        'name_en',
        'name_ru',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
} 
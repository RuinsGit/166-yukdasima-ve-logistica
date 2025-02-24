<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogHeroResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'image' => $this->image_path ? asset("storage/{$this->image_path}") : null,
            'alt' => $this->alt,
            'status' => $this->status,
            'created_at' => $this->created_at->format('d.m.Y')
        ];
    }
} 
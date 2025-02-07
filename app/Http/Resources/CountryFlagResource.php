<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryFlagResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => asset("storage/{$this->image_path}"),
            'alt' => $this->alt,
            'status' => $this->status,
            'created_at' => $this->created_at->format('d.m.Y')
        ];
    }
} 
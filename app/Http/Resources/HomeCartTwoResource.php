<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeCartTwoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'text' => $this->text,
            'image' => asset("storage/{$this->image_path}"),
            'alt' => $this->alt,
            'status' => $this->status,
            'created_at' => $this->created_at->format('d.m.Y')
        ];
    }
} 
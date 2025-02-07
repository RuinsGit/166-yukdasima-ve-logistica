<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NetworkResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'image' => $this->image_path ? asset("storage/{$this->image_path}") : null,
            'country_code' => $this->country_code,
            'status' => $this->status,
            'created_at' => $this->created_at->format('d.m.Y H:i')
        ];
    }
} 
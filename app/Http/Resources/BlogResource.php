<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'text' => $this->text,
            'description' => $this->description,
            'image_path' => $this->image_path ? asset("storage/{$this->image_path}") : null,
            'bottom_image_path' => $this->bottom_image_path ? asset("storage/{$this->bottom_image_path}") : null,
            'multiple_image_path' => $this->multiple_image_path ? 
                collect(json_decode($this->multiple_image_path, true))
                    ->map(fn($image) => asset("storage/{$image}"))
                    ->toArray() 
                : [],
            'alt' => $this->alt,
            'bottom_alt' => $this->bottom_alt,
            'slug' => [
                'az' => $this->slug_az,
                'en' => $this->slug_en,
                'ru' => $this->slug_ru
            ],
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'status' => $this->status,
            
            'description_3' => $this->description_3,
            'text_2' => $this->text_2,
            'created_at' => $this->created_at->format('d.m.Y'),
            'updated_at' => $this->updated_at->format('d.m.Y'),
            
        ];
    }
}



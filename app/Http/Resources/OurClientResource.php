<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OurClientResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            
                'text' => $this->text,
                'description' => $this->description,
                'image' => asset("storage/{$this->main_image_path}"),
                'alt' => $this->main_alt,
            
            'bottom_images' => [
                [
                    'image' => asset("storage/{$this->bottom_image1_path}"),
                    'alt' => $this->bottom1_alt,
                    'id' => 1
                ],
                [
                    'image' => asset("storage/{$this->bottom_image2_path}"),
                    'alt' => $this->bottom2_alt,
                    'id' => 2
                ]

            ],
            
                'title' => $this->meta_title,
                'description' => $this->meta_description,
            
            'status' => $this->status,
            'created_at' => $this->created_at->format('d.m.Y H:i')
        ];
    }
} 
<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'text' => $this->text,
            'description' => $this->description,
            'description2' => $this->description2,
            'main_image' => asset("storage/{$this->image_main}"),
            'bottom_image' => asset("storage/{$this->image_bottom}"),
            'main_image_alt' => $this->image_main_alt,
            'bottom_image_alt' => $this->image_bottom_alt,
            'type' => new ServiceTypeResource($this->type),
            'created_at' => $this->created_at->format('d.m.Y H:i')
        ];
    }

} 
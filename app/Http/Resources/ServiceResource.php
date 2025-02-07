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
            
                'main' => asset("storage/{$this->image_main}"),
                'bottom' => asset("storage/{$this->image_bottom}"),
           
            
                'main' => $this->image_main_alt,
                'bottom' => $this->image_bottom_alt,
            
            'type' => new ServiceTypeResource($this->type),
                
                'title' => $this->meta_title,
                'description' => $this->meta_description,
            
            'created_at' => $this->created_at->format('d.m.Y H:i')
        ];
    }

} 
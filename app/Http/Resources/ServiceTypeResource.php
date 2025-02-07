<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceTypeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => asset("storage/{$this->image}"),
            'number' => $this->number,
            'services' => ServiceResource::collection($this->whenLoaded('services'))
        ];
    }
} 
<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactPhotoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->{'title_' . app()->getLocale()},
            'image' => $this->image_path ? asset('storage/' . $this->image_path) : null,
            'image_alt' => $this->image_alt,
            'status' => $this->status
        ];
    }
} 
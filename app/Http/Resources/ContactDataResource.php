<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactDataResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'text' => $this->text,
            'contact_title' => $this->contact_title,
            'image' => $this->image_path ? asset("storage/{$this->image_path}") : null,
            'status' => $this->status,
            'created_at' => $this->created_at->format('d.m.Y')
        ];
    }
} 
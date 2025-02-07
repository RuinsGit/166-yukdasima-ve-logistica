<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactRequestResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'website' => $this->website,
            'comment' => $this->comment,
            'status' => $this->status ? 'Oxundu' : 'Oxunmadı',
            'created_at' => $this->created_at->format('d.m.Y H:i')
        ];
    }

} 
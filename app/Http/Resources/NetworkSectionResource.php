<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NetworkSectionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'country_name' => $this->{'ulke_adi_' . app()->getLocale()},
            'status' => $this->status
        ];
    }
} 
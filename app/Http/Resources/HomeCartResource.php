<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class HomeCartResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'image_url' => asset(Storage::url($this->image_path)),
            'alt' => $this->getAltAttribute(),
            'status' => $this->status
        ];
    }

    protected function getAltAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"alt_$locale"};
    }
} 
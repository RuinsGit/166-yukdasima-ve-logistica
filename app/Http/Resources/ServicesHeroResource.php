<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServicesHeroResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'main_image' => $this->main_image_path ? asset("storage/{$this->main_image_path}") : null,
            'experience_text' => $this->experience_text,
            'experience_description' => $this->experience_description,
            'experience_image' => $this->experience_image_path ? asset("storage/{$this->experience_image_path}") : null,
            'manager_text' => $this->manager_text,
            'manager_description' => $this->manager_description,
            'manager_image' => $this->manager_image_path ? asset("storage/{$this->manager_image_path}") : null,
            'security_text' => $this->security_text,
            'security_description' => $this->security_description,
            'security_image' => $this->security_image_path ? asset("storage/{$this->security_image_path}") : null,
            'main_image_alt' => $this->main_image_alt,
            'experience_image_alt' => $this->experience_image_alt,
            'manager_image_alt' => $this->manager_image_alt,
            'security_image_alt' => $this->security_image_alt,
            'status' => $this->status,
        ];
    }
} 
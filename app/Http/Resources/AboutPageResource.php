<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class AboutPageResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'text' => $this->text,
            'description' => $this->description,
            'image_url' => asset(Storage::url($this->image_path)),




            
                'services' => [
                    'number' => $this->services_number,
                    'text' => $this->services_text,
                ],
                'customers' => [
                    'number' => $this->customer_number,
                    'text' => $this->customer_text,
                ],

                
                'satisfied' => [
                    'number' => $this->satisfied_number,
                    'text' => $this->satisfied_text,
                    

                ],  
                'transportations' => [
                    'number' => $this->transportations_number,
                    'text' => $this->transportation_text,
                

            ],
            'status' => $this->status
        ];
    }
} 
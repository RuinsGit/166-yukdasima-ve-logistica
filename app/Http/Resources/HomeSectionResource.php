<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeSectionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'data' => [
                [
                    'id' => 1,
                    'value' => $this->number_one,
                    'text' => $this->text_one
                ],
                [
                    'id' => 2,
                    'value' => $this->number_two,
                    'text' => $this->text_two
                ],
                [
                    'id' => 3,
                    'title' => $this->name,
                    'image' => asset("storage/{$this->image_path}"),
                    'bottom_image' => asset("storage/{$this->bottom_image_path}"),
                    'alt' => $this->alt,
                    'bottom_alt' => $this->bottom_alt

                ]
            ],
            


        ];
    }   
    
} 
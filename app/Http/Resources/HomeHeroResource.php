<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeHeroResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $response = [
            'id' => $this->id,
            'media_type' => $this->media_type,
            'media_url' => asset("storage/{$this->media_path}"),
            
        ];

        if ($this->media_type === 'image') {
            $response['alt'] = $this->alt;
        } else {
            $response['video_title'] = $this->video_title;
        }

        $response['created_at'] = $this->created_at->format('d.m.Y H:i');
        $response['status'] = $this->status;


        return $response;
    }
} 
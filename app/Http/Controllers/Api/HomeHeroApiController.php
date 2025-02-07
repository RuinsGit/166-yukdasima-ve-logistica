<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HomeHeroResource;
use App\Models\HomeHero;
use Illuminate\Http\Request;

class HomeHeroApiController extends Controller
{
    public function index()
    {
        $heroes = HomeHero::where('status', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return HomeHeroResource::collection($heroes);
    }

    public function show($id)
    {
        try {
            $hero = HomeHero::where('status', true)
                ->findOrFail($id);

            return new HomeHeroResource($hero);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Hero content not found'
            ], 404);
        }
    }
} 
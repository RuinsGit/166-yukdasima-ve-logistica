<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NetworkHeroResource;
use App\Models\NetworkHero;

class NetworkHeroApiController extends Controller
{
    public function index()
    {
        $networkHero = NetworkHero::where('status', true)->first();
        return new NetworkHeroResource($networkHero);
    }

    public function show($id)
    {
        $networkHero = NetworkHero::findOrFail($id);
        return new NetworkHeroResource($networkHero);
    }
} 
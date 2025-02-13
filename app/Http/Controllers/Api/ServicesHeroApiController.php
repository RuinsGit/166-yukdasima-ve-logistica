<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServicesHeroResource;
use App\Models\ServicesHero;
use Illuminate\Http\Request;

class ServicesHeroApiController extends Controller
{
    public function index()
    {
        $servicesHero = ServicesHero::where('status', 1)->first();
        return new ServicesHeroResource($servicesHero);
    }

    public function show($id)
    {
        $servicesHero = ServicesHero::findOrFail($id);
        return new ServicesHeroResource($servicesHero);
    }

    public function toggleStatus($id)
    {
        $servicesHero = ServicesHero::findOrFail($id);
        $servicesHero->status = !$servicesHero->status;
        $servicesHero->save();

        return response()->json([
            'message' => 'Status uğurla yeniləndi.',
            'status' => $servicesHero->status
        ]);
    }
} 
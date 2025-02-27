<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContinentResource;
use App\Models\Continent;
use Illuminate\Http\Request;

class ContinentApiController extends Controller
{
    public function index()
    {
        $continents = Continent::with(['networkSections' => function($query) {
            $query->where('status', 1);
        }])
        ->where('status', 1)
        ->get();

        return ContinentResource::collection($continents);
    }

    public function show($id)
    {
        try {
            $continent = Continent::with(['networkSections' => function($query) {
                $query->where('status', 1);
            }])
            ->where('status', 1)
            ->findOrFail($id);

            return new ContinentResource($continent);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Qitə tapılmadı'
            ], 404);
        }
    }

    public function getCountriesByContinent($id)
    {
        try {
            $continent = Continent::with(['networkSections' => function($query) {
                $query->where('status', 1);
            }])
            ->where('status', 1)
            ->findOrFail($id);

            return NetworkSectionResource::collection($continent->networkSections);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Qitə tapılmadı'
            ], 404);
        }
    }
} 
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceTypeResource;
use App\Models\ServiceType;
use Illuminate\Http\Request;

class ServiceTypeApiController extends Controller
{
    public function index()
    {
        $types = ServiceType::where('status', true)
            ->orderBy('number')
            ->get();

        return ServiceTypeResource::collection($types);
    }

    public function show($id)
    {
        try {
            $type = ServiceType::where('status', true)
                ->with(['services' => function($query) {
                    $query->where('status', true);
                }])
                ->findOrFail($id);

            return new ServiceTypeResource($type);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Service type not found'
            ], 404);
        }
    }
} 
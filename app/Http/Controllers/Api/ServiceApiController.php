<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceApiController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::where('status', true)
            ->when($request->service_type_id, function($query) use ($request) {
                $query->where('service_type_id', $request->service_type_id);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return ServiceResource::collection($services);
    }

    public function show($slug)
    {
        try {
            $service = Service::where('status', true)
                ->where('slug_'.app()->getLocale(), $slug)
                ->firstOrFail();

            return new ServiceResource($service);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Service not found'
            ], 404);
        }
    }
} 
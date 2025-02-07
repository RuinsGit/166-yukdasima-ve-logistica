<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NetworkResource;
use App\Models\Network;
use Illuminate\Http\Request;

class NetworkApiController extends Controller
{
    public function index()
    {
        $networks = Network::where('status', true)
            ->orderBy('name_'.app()->getLocale())
            ->get();

        return NetworkResource::collection($networks);
    }

    public function show($id)
    {
        try {
            $network = Network::where('status', true)
                ->findOrFail($id);

            return new NetworkResource($network);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Network not found'
            ], 404);
        }
    }
} 
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OurClientResource;
use App\Models\OurClient;
use Illuminate\Http\Request;

class OurClientApiController extends Controller
{
    public function index()
    {
        $clients = OurClient::where('status', true)
            ->orderBy('created_at', 'desc')
            ->get();

        if($clients->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No active clients found'
            ], 404);
        }

        return OurClientResource::collection($clients);
    }

    public function show($id)
    {
        try {
            $client = OurClient::where('status', true)
                ->findOrFail($id);

            return new OurClientResource($client);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Client not found'
            ], 404);
        }
    }
} 
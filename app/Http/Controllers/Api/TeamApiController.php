<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamApiController extends Controller
{
    public function index()
    {
        $teams = Team::where('status', true)
            ->orderBy('position_az')
            ->get();

        if($teams->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No active team members found'
            ], 404);
        }

        return TeamResource::collection($teams);
    }

    public function show($id)
    {
        try {
            $team = Team::where('status', true)
                ->findOrFail($id);

            return new TeamResource($team);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Team member not found'
            ], 404);
        }
    }
} 
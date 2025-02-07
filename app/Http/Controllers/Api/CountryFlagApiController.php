<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountryFlagResource;
use App\Models\CountryFlag;
use Illuminate\Http\Request;

class CountryFlagApiController extends Controller
{
    public function index()
    {
        $flags = CountryFlag::where('status', true)->get();
        return CountryFlagResource::collection($flags);
    }

    public function show($id)
    {
        try {
            $flag = CountryFlag::where('status', true)->findOrFail($id);
            return new CountryFlagResource($flag);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Country flag not found'
            ], 404);
        }
    }
} 
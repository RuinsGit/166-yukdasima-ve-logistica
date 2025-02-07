<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HomeSectionResource;
use App\Models\HomeSection;
use Illuminate\Http\Request;

class HomeSectionApiController extends Controller
{
    public function index()
    {
        $section = HomeSection::where('status', true)->first();
        
        if(!$section) {
            return response()->json([
                'status' => 'error',
                'message' => 'Home section not found'
            ], 404);
        }

        return new HomeSectionResource($section);
    }

    public function show($id)
    {
        try {
            $section = HomeSection::where('status', true)
                ->findOrFail($id);

            return new HomeSectionResource($section);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Home section not found'
            ], 404);
        }
    }
} 
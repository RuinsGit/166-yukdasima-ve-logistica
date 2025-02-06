<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AboutPageResource;
use App\Models\AboutPage;
use Illuminate\Http\Request;

class AboutPageApiController extends Controller
{
    public function index()
    {
        $aboutPages = AboutPage::all();
        return AboutPageResource::collection($aboutPages);
    }

    public function show($id)
    {
        try {
            $aboutPage = AboutPage::findOrFail($id);
            return new AboutPageResource($aboutPage);
        } catch (\Exception $e) {
            return response()->json(['message' => 'About page not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'text' => 'required|string',
            'description' => 'required|string',
            'image_path' => 'required|string',
            'services_number' => 'required|integer',
            'services_text' => 'required|string',
            'customer_number' => 'required|integer',
            'customer_text' => 'required|string',
            'satisfied_number' => 'required|integer',
            'satisfied_text' => 'required|string',
            'transportations_number' => 'required|integer',
            'transportation_text' => 'required|string',
            'status' => 'boolean'
        ]);

        $aboutPage = AboutPage::create($validated);
        return new AboutPageResource($aboutPage, 201);
    }

    public function update(Request $request, $id)
    {
        try {
            $aboutPage = AboutPage::findOrFail($id);
            
            $validated = $request->validate([
                'name' => 'sometimes|string|max:255',
                'text' => 'sometimes|string',
                'description' => 'sometimes|string',
                'image_path' => 'sometimes|string',
                'services_number' => 'sometimes|integer',
                'services_text' => 'sometimes|string',
                'customer_number' => 'sometimes|integer',
                'customer_text' => 'sometimes|string',
                'satisfied_number' => 'sometimes|integer',
                'satisfied_text' => 'sometimes|string',
                'transportations_number' => 'sometimes|integer',
                'transportation_text' => 'sometimes|string',
                'status' => 'sometimes|boolean'
            ]);

            $aboutPage->update($validated);
            return new AboutPageResource($aboutPage);
            
        } catch (\Exception $e) {
            return response()->json(['message' => 'About page update failed'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $aboutPage = AboutPage::findOrFail($id);
            $aboutPage->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['message' => 'About page deletion failed'], 500);
        }
    }

    public function toggleStatus($id)
    {
        try {
            $aboutPage = AboutPage::findOrFail($id);
            $aboutPage->update(['status' => !$aboutPage->status]);
            return new AboutPageResource($aboutPage);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Status toggle failed'], 500);
        }
    }
} 
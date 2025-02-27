<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactPhotoResource;
use App\Models\ContactPhoto;
use Illuminate\Http\Request;

class ContactPhotoApiController extends Controller
{
    public function index()
    {
        $contactPhoto = ContactPhoto::where('status', 1)->first();
        
        if (!$contactPhoto) {
            return response()->json([
                'status' => 'error',
                'message' => 'Əlaqə şəkili tapılmadı'
            ], 404);
        }

        return new ContactPhotoResource($contactPhoto);
    }

    public function show($id)
    {
        try {
            $contactPhoto = ContactPhoto::where('status', 1)
                ->findOrFail($id);

            return new ContactPhotoResource($contactPhoto);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Əlaqə şəkili tapılmadı'
            ], 404);
        }
    }
} 
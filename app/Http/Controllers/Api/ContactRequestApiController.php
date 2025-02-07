<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactRequestResource;
use App\Models\ContactRequest;
use Illuminate\Http\Request;

class ContactRequestApiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'comment' => 'required|string|min:10|max:2000'
        ]);

        $contactRequest = ContactRequest::create([
            'email' => $request->email,
            'website' => $request->website,
            'comment' => $request->comment,
            'status' => false 
        ]);

        return new ContactRequestResource($contactRequest);
    }
} 
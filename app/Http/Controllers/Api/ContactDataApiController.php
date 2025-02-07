<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactDataResource;
use App\Models\ContactData;
use Illuminate\Http\Request;

class ContactDataApiController extends Controller
{
    public function index()
    {
        $data = ContactData::where('status', true)->get();
        
        return ContactDataResource::collection($data);
    }
} 
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HomeCartTwoResource;
use App\Models\HomeCartTwo;
use Illuminate\Http\Request;

class HomeCartTwoApiController extends Controller
{
    public function index()
    {
        $cart = HomeCartTwo::where('status', true)->first();
        
        if(!$cart) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        return new HomeCartTwoResource($cart);
    }
} 
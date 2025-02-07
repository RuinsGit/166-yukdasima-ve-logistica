<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HomeCartResource;
use App\Models\HomeCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeCartApiController extends Controller
{
    public function index()
    {
        $carts = HomeCart::where('status', true)->get();
        return HomeCartResource::collection($carts);
    }

    public function show($id)
    {
        try {
            $cart = HomeCart::findOrFail($id);
            return new HomeCartResource($cart);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Cart not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'alt_az' => 'required|string|max:255',
            'alt_en' => 'required|string|max:255',
            'alt_ru' => 'required|string|max:255',
        ]);

        $imagePath = $request->file('image')->store('home_carts', 'public');

        $cart = HomeCart::create([
            'image_path' => $imagePath,
            'alt_az' => $validated['alt_az'],
            'alt_en' => $validated['alt_en'],
            'alt_ru' => $validated['alt_ru'],
            'status' => true
        ]);

        return new HomeCartResource($cart, 201);
    }

    public function update(Request $request, $id)
    {
        try {
            $cart = HomeCart::findOrFail($id);

            $validated = $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
                'alt_az' => 'sometimes|string|max:255',
                'alt_en' => 'sometimes|string|max:255',
                'alt_ru' => 'sometimes|string|max:255',
                'status' => 'sometimes|boolean'
            ]);

            if ($request->hasFile('image')) {
                Storage::disk('public')->delete($cart->image_path);
                $validated['image_path'] = $request->file('image')->store('home_carts', 'public');
            }

            $cart->update($validated);
            return new HomeCartResource($cart);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Cart update failed'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $cart = HomeCart::findOrFail($id);
            Storage::disk('public')->delete($cart->image_path);
            $cart->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Cart deletion failed'], 500);
        }
    }

    public function toggleStatus($id)
    {
        try {
            $cart = HomeCart::findOrFail($id);
            $cart->update(['status' => !$cart->status]);
            return new HomeCartResource($cart);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Status toggle failed'], 500);
        }
    }
} 
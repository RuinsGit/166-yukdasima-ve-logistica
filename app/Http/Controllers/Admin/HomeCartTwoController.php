<?php

namespace App\Http\Controllers\Admin;

use App\Models\HomeCartTwo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HomeCartTwoController extends Controller
{
    public function index()
    {
        $carts = HomeCartTwo::all();
        return view('back.admin.home_cart_twos.index', compact('carts'));
    }

    public function create()
    {
        return view('back.admin.home_cart_twos.create');
    }

    public function store(Request $request)
    {
        if(HomeCartTwo::count() >= 1) {
            return redirect()->back()->with('error', 'Yalnız 1 bölmə əlavə etmək mümkündür');
        }

        $request->validate([
            'text_az' => 'required|string',
            'text_en' => 'required|string',
            'text_ru' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'alt_az' => 'required|string|max:255',
            'alt_en' => 'required|string|max:255',
            'alt_ru' => 'required|string|max:255',
        ]);

        $imagePath = $request->file('image')->store('home_cart_twos', 'public');

        HomeCartTwo::create([
            'text_az' => $request->text_az,
            'text_en' => $request->text_en,
            'text_ru' => $request->text_ru,
            'image_path' => $imagePath,
            'alt_az' => $request->alt_az,
            'alt_en' => $request->alt_en,
            'alt_ru' => $request->alt_ru,
            'status' => true
        ]);

        return redirect()->route('back.pages.home-cart-twos.index')->with('success', 'Yeni kart uğurla əlavə edildi');
    }

    public function edit(HomeCartTwo $homeCartTwo)
    {
        return view('back.admin.home_cart_twos.edit', compact('homeCartTwo'));
    }

    public function update(Request $request, HomeCartTwo $homeCartTwo)
    {
        if(HomeCartTwo::count() > 1) {
            return redirect()->back()->with('error', 'Yalnız 1 bölməyə icazə verilir');
        }

        $request->validate([
            'text_az' => 'required|string',
            'text_en' => 'required|string',
            'text_ru' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'alt_az' => 'required|string|max:255',
            'alt_en' => 'required|string|max:255',
            'alt_ru' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($homeCartTwo->image_path);
            $imagePath = $request->file('image')->store('home_cart_twos', 'public');
            $homeCartTwo->image_path = $imagePath;
        }

        $homeCartTwo->update($request->except('image'));

        return redirect()->route('back.pages.home-cart-twos.index')->with('success', 'Kart uğurla yeniləndi');
    }

    public function destroy(HomeCartTwo $homeCartTwo)
    {
        Storage::disk('public')->delete($homeCartTwo->image_path);
        $homeCartTwo->delete();
        return redirect()->back()->with('success', 'Kart uğurla silindi');
    }

    public function toggleStatus($id)
    {
        $cart = HomeCartTwo::findOrFail($id);
        $cart->status = !$cart->status;
        $cart->save();
        return redirect()->back()->with('success', 'Status uğurla dəyişdirildi');
    }
} 
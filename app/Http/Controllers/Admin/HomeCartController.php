<?php

namespace App\Http\Controllers\Admin;

use App\Models\HomeCart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HomeCartController extends Controller
{
    public function index()
    {
        $carts = HomeCart::all();
        return view('back.admin.home_carts.index', compact('carts'));
    }

    public function create()
    {
        return view('back.admin.home_carts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'alt_az' => 'required|string|max:255',
            'alt_en' => 'required|string|max:255',
            'alt_ru' => 'required|string|max:255',
        ]);

        $imagePath = $request->file('image')->store('home_carts', 'public');

        HomeCart::create([
            'image_path' => $imagePath,
            'alt_az' => $request->alt_az,
            'alt_en' => $request->alt_en,
            'alt_ru' => $request->alt_ru,
            'status' => true
        ]);

        return redirect()->route('back.pages.home-carts.index')->with('success', 'Yeni kart uğurla əlavə edildi');
    }

    public function edit(HomeCart $homeCart)
    {
        return view('back.admin.home_carts.edit', compact('homeCart'));
    }

    public function update(Request $request, HomeCart $homeCart)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'alt_az' => 'required|string|max:255',
            'alt_en' => 'required|string|max:255',
            'alt_ru' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($homeCart->image_path);
            $imagePath = $request->file('image')->store('home_carts', 'public');
            $homeCart->image_path = $imagePath;
        }

        $homeCart->update([
            'alt_az' => $request->alt_az,
            'alt_en' => $request->alt_en,
            'alt_ru' => $request->alt_ru,
        ]);

        return redirect()->route('back.pages.home-carts.index')->with('success', 'Kart uğurla yeniləndi');
    }

    public function destroy(HomeCart $homeCart)
    {
        if(Storage::disk('public')->exists($homeCart->image_path)) {
            Storage::disk('public')->delete($homeCart->image_path);
        }
        $homeCart->delete();
        return redirect()->back()->with('success', 'Kart uğurla silindi');
    }
    public function toggleStatus($id)
    {
        $homeCart = HomeCart::find($id);
        $homeCart->status = !$homeCart->status;
        $homeCart->save();
        return redirect()->back()->with('success', 'Kart statusu uğurla dəyişdirildi');
    }
} 
<?php

namespace App\Http\Controllers\Admin;

use App\Models\NetworkHero;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class NetworkHeroController extends Controller
{
    public function index()
    {
       
        $networkHero = NetworkHero::first();
        return view('back.admin.network-hero.index', compact('networkHero'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'alt_az' => 'nullable|string|max:255',
            'alt_en' => 'nullable|string|max:255',
            'alt_ru' => 'nullable|string|max:255',
        ]);

        $networkHero = NetworkHero::firstOrNew();
        
        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // Eski resmi sil
            if ($networkHero->image_path && Storage::disk('public')->exists($networkHero->image_path)) {
                Storage::disk('public')->delete($networkHero->image_path);
            }
            // Yeni resmi yükle
            $data['image_path'] = $request->file('image')->store('network-hero', 'public');
        }

        $networkHero->fill($data);
        $networkHero->save();

        return redirect()->back()->with('success', 'Network hero başarıyla güncellendi!');
    }

    public function toggleStatus()
    {
        $networkHero = NetworkHero::first();
        if ($networkHero) {
            $networkHero->status = !$networkHero->status;
            $networkHero->save();
        }
        return redirect()->back()->with('success', 'Durum başarıyla güncellendi!');
    }
} 
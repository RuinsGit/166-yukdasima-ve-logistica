<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogHero;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


use Illuminate\Support\Facades\Artisan;

class BlogHeroController extends Controller
{
    public function index()
    {
        Artisan::call('migrate');
        $blogHero = BlogHero::first();
        return view('back.admin.blog-hero.index', compact('blogHero'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'alt_az' => 'nullable|string|max:255',
            'alt_en' => 'nullable|string|max:255',
            'alt_ru' => 'nullable|string|max:255',
        ]);

        $blogHero = BlogHero::firstOrNew();
        
        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // Eski resmi sil
            if ($blogHero->image_path && Storage::disk('public')->exists($blogHero->image_path)) {
                Storage::disk('public')->delete($blogHero->image_path);
            }
            // Yeni resmi yükle
            $data['image_path'] = $request->file('image')->store('blog-hero', 'public');
        }

        $blogHero->fill($data);
        $blogHero->save();

        return redirect()->back()->with('success', 'Blog hero başarıyla güncellendi!');
    }

    public function toggleStatus()
    {
        $blogHero = BlogHero::first();
        if ($blogHero) {
            $blogHero->status = !$blogHero->status;
            $blogHero->save();
        }
        return redirect()->back()->with('success', 'Durum başarıyla güncellendi!');
    }
} 
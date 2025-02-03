<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ThemeSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ThemeSettingsController extends Controller
{
    public function index()
    {
        $settings = ThemeSetting::firstOrCreate();
        $defaultBackgrounds = [
            asset('back/assets/images/bg1.jpg'),
            asset('back/assets/images/bg2.jpg'),
            asset('back/assets/images/bg3.jpg')
        ];
        
        return view('back.admin.settings.theme', compact('settings', 'defaultBackgrounds'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'background_type' => 'nullable|in:image,color',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'background_color' => 'nullable|string',
            'header_color' => 'nullable|string',
            'sidebar_width' => 'nullable|in:default,compact,wide',
            'dark_mode' => 'nullable|boolean',
            'footer_text' => 'nullable|string',
            'footer_bg_color' => 'nullable|string',
            'footer_text_color' => 'nullable|string',
            'default_background' => 'nullable|string'
        ]);

        $settings = ThemeSetting::firstOrCreate();
        
        if ($request->filled('default_background')) {
            $settings->background_image = $request->input('default_background');
        }

        if ($request->hasFile('background_image')) {
            $path = $request->file('background_image')->store('public/backgrounds');
            $settings->background_image = Storage::url($path);
        }

        if ($request->background_type === 'color') {
            $settings->background_image = null;
        } else if ($request->background_type === 'image') {
            $settings->background_color = null;
        }

        $settings->fill($request->except(['background_image', 'default_background']));
        $settings->dark_mode = $request->has('dark_mode');
        
        try {
            $settings->save();
            return redirect()->back()->with('success', 'Parametrlər uğurla yadda saxlanıldı');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Xəta baş verdi: '.$e->getMessage());
        }
    }
} 
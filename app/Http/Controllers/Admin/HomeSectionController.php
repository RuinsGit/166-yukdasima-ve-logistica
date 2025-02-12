<?php

namespace App\Http\Controllers\Admin;

use App\Models\HomeSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;

class HomeSectionController extends Controller
{
    public function index()
    {
        Artisan::call('migrate');
        $sections = HomeSection::all();
        return view('back.admin.home_sections.index', compact('sections'));
    }

    public function create()
    {
        if(HomeSection::count() >= 1) {
            return redirect()->back()->with('error', 'Yalnız 1 bölmə əlavə edilə bilər!');
        }
        return view('back.admin.home_sections.create');
    }

    public function store(Request $request)
    {
        if(HomeSection::count() >= 1) {
            return redirect()->back()->with('error', 'Yalnız 1 bölmə əlavə edilə bilər!');
        }
        
        $request->validate([
            'name_az' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'number_one' => 'required|integer|min:0',
            'number_two' => 'required|integer|min:0',
            'text_one_az' => 'required|string',
            'text_one_en' => 'required|string',
            'text_one_ru' => 'required|string',
            'text_two_az' => 'required|string',
            'text_two_en' => 'required|string',
            'text_two_ru' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'alt_az' => 'required|string|max:255',
            'alt_en' => 'required|string|max:255',
            'alt_ru' => 'required|string|max:255',
            'bottom_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bottom_alt_az' => 'nullable|string|max:255',
            'bottom_alt_en' => 'nullable|string|max:255',
            'bottom_alt_ru' => 'nullable|string|max:255',
        ]);

        $imagePath = $request->file('image')->store('home_sections', 'public');
        $bottomImagePath = $request->hasFile('bottom_image') 
            ? $request->file('bottom_image')->store('home_sections/bottom', 'public')
            : null;

        HomeSection::create([
            'name_az' => $request->name_az,
            'name_en' => $request->name_en,
            'name_ru' => $request->name_ru,
            'number_one' => $request->number_one,
            'number_two' => $request->number_two,
            'text_one_az' => $request->text_one_az,
            'text_one_en' => $request->text_one_en,
            'text_one_ru' => $request->text_one_ru,
            'text_two_az' => $request->text_two_az,
            'text_two_en' => $request->text_two_en,
            'text_two_ru' => $request->text_two_ru,
            'image_path' => $imagePath,
            'alt_az' => $request->alt_az,
            'alt_en' => $request->alt_en,
            'alt_ru' => $request->alt_ru,
            'bottom_image_path' => $bottomImagePath,
            'bottom_alt_az' => $request->bottom_alt_az,
            'bottom_alt_en' => $request->bottom_alt_en,
            'bottom_alt_ru' => $request->bottom_alt_ru,
            'status' => true
        ]);

        return redirect()->route('back.pages.home-sections.index')->with('success', 'Yeni bölmə uğurla əlavə edildi');
    }

    public function edit(HomeSection $homeSection)
    {
        return view('back.admin.home_sections.edit', compact('homeSection'));
    }

    public function update(Request $request, HomeSection $homeSection)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bottom_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bottom_alt_az' => 'nullable|string|max:255',
            'bottom_alt_en' => 'nullable|string|max:255',
            'bottom_alt_ru' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($homeSection->image_path);
            $imagePath = $request->file('image')->store('home_sections', 'public');
            $homeSection->image_path = $imagePath;
        }

        if ($request->hasFile('bottom_image')) {
            if($homeSection->bottom_image_path) {
                Storage::disk('public')->delete($homeSection->bottom_image_path);
            }
            $bottomImagePath = $request->file('bottom_image')->store('home_sections/bottom', 'public');
            $homeSection->bottom_image_path = $bottomImagePath;
        }

        $homeSection->update([
            ...$request->except(['image', 'bottom_image']),
            'bottom_alt_az' => $request->bottom_alt_az,
            'bottom_alt_en' => $request->bottom_alt_en,
            'bottom_alt_ru' => $request->bottom_alt_ru,
        ]);

        return redirect()->route('back.pages.home-sections.index')->with('success', 'Bölmə uğurla yeniləndi');
    }

    public function destroy(HomeSection $homeSection)
    {
        if($homeSection->image_path) {
            Storage::disk('public')->delete($homeSection->image_path);
        }
        if($homeSection->bottom_image_path) {
            Storage::disk('public')->delete($homeSection->bottom_image_path);
        }
        
        $homeSection->delete();
        return redirect()->back()->with('success', 'Bölmə uğurla silindi');
    }

    public function toggleStatus($id)
    {
        $section = HomeSection::findOrFail($id);
        $section->status = !$section->status;
        $section->save();
        return redirect()->back()->with('success', 'Status uğurla dəyişdirildi');
    }
} 
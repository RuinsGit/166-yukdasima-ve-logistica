<?php

namespace App\Http\Controllers\Admin;

use App\Models\CountryFlag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CountryFlagController extends Controller
{
    public function index()
    {
        $flags = CountryFlag::all();
        return view('back.admin.country_flags.index', compact('flags'));
    }

    public function create()
    {
        return view('back.admin.country_flags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_az' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'alt_az' => 'required|string|max:255',
            'alt_en' => 'required|string|max:255',
            'alt_ru' => 'required|string|max:255',  
        ]);

        $imagePath = $request->file('image')->store('country_flags', 'public');

        CountryFlag::create([
            'name_az' => $request->name_az,
            'name_en' => $request->name_en,
            'name_ru' => $request->name_ru,
            'image_path' => $imagePath,
            'alt_az' => $request->alt_az,
            'alt_en' => $request->alt_en,
            'alt_ru' => $request->alt_ru,
            'status' => true
        ]);

        return redirect()->route('back.pages.country-flags.index')->with('success', 'Bayraq uğurla əlavə edildi');
    }

    public function edit(CountryFlag $countryFlag)
    {
        return view('back.admin.country_flags.edit', compact('countryFlag'));
    }

    public function update(Request $request, CountryFlag $countryFlag)
    {
        $request->validate([
            'name_az' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_ru' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'alt_az' => 'nullable|string|max:255',
            'alt_en' => 'nullable|string|max:255',



            'alt_ru' => 'nullable|string|max:255',

        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($countryFlag->image_path);
            $imagePath = $request->file('image')->store('country_flags', 'public');
            $countryFlag->image_path = $imagePath;
        }

        $countryFlag->update($request->except('image'));

        return redirect()->route('back.pages.country-flags.index')->with('success', 'Bayraq uğurla yeniləndi');
    }

    public function destroy(CountryFlag $countryFlag)
    {
        Storage::disk('public')->delete($countryFlag->image_path);
        $countryFlag->delete();
        return redirect()->back()->with('success', 'Bayraq uğurla silindi');
    }

    public function toggleStatus($id)
    {
        $flag = CountryFlag::findOrFail($id);
        $flag->status = !$flag->status;
        $flag->save();
        return redirect()->back()->with('success', 'Status uğurla dəyişdirildi');
    }
} 
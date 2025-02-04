<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AboutPageController extends Controller
{
    public function index()
    {
        $aboutPages = AboutPage::all();
        return view('back.admin.about_pages.index', compact('aboutPages'));
    }

    public function create()
    {
        return view('back.admin.about_pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_az' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'text_az' => 'required|string',
            'text_en' => 'required|string',
            'text_ru' => 'required|string',
            'description_az' => 'required|string',
            'description_en' => 'required|string',
            'description_ru' => 'required|string',
            'services_number' => 'required|integer|min:0',
            'customer_number' => 'required|integer|min:0',
            'satisfied_number' => 'required|integer|min:0',
            'transportations_number' => 'required|integer|min:0',
            'services_text_az' => 'required|string|max:255',
            'services_text_en' => 'required|string|max:255',
            'services_text_ru' => 'required|string|max:255',
            'customer_text_az' => 'required|string|max:255',
            'customer_text_en' => 'required|string|max:255',
            'customer_text_ru' => 'required|string|max:255',
            'satisfied_text_az' => 'required|string|max:255',
            'satisfied_text_en' => 'required|string|max:255',
            'satisfied_text_ru' => 'required|string|max:255',
            'transportation_text_az' => 'required|string|max:255',
            'transportation_text_en' => 'required|string|max:255',
            'transportation_text_ru' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ]);

        $imagePath = $request->file('image')->store('about_pages', 'public');

        AboutPage::create(array_merge(
            $request->except('image'),
            ['image_path' => $imagePath]
        ));

        return redirect()->route('back.pages.about-pages.index')
            ->with('success', 'Haqqında səhifə uğurla əlavə edildi');
    }

    public function edit(AboutPage $aboutPage)
    {
        return view('back.admin.about_pages.edit', compact('aboutPage'));
    }

    public function update(Request $request, AboutPage $aboutPage)
    {
        $request->validate([
            'name_az' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'text_az' => 'required|string',
            'text_en' => 'required|string',
            'text_ru' => 'required|string',
            'description_az' => 'required|string',
            'description_en' => 'required|string',
            'description_ru' => 'required|string',
            'services_number' => 'required|integer|min:0',
            'customer_number' => 'required|integer|min:0',
            'satisfied_number' => 'required|integer|min:0',
            'transportations_number' => 'required|integer|min:0',
            'services_text_az' => 'required|string|max:255',
            'services_text_en' => 'required|string|max:255',
            'services_text_ru' => 'required|string|max:255',
            'customer_text_az' => 'required|string|max:255',
            'customer_text_en' => 'required|string|max:255',
            'customer_text_ru' => 'required|string|max:255',
            'satisfied_text_az' => 'required|string|max:255',
            'satisfied_text_en' => 'required|string|max:255',
            'satisfied_text_ru' => 'required|string|max:255',
            'transportation_text_az' => 'required|string|max:255',
            'transportation_text_en' => 'required|string|max:255',
            'transportation_text_ru' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($aboutPage->image_path);
            $imagePath = $request->file('image')->store('about_pages', 'public');
            $aboutPage->image_path = $imagePath;
        }

        $aboutPage->update($request->except('image'));

        return redirect()->route('back.pages.about-pages.index')
            ->with('success', 'Haqqında səhifə uğurla yeniləndi');
    }

    public function destroy(AboutPage $aboutPage)
    {
        Storage::disk('public')->delete($aboutPage->image_path);
        $aboutPage->delete();
        return redirect()->back()->with('success', 'Haqqında səhifə uğurla silindi');
    }

    public function toggleStatus($id)
    {
        $aboutPage = AboutPage::findOrFail($id);
        $aboutPage->status = !$aboutPage->status;
        $aboutPage->save();
        return redirect()->back()->with('success', 'Status uğurla dəyişdirildi');
    }
} 
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServicesHero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;


class ServicesHeroController extends Controller
{
    public function index()
    {
        Artisan::call('migrate');
        $servicesHero = ServicesHero::first();
        return view('back.admin.services-hero.index', compact('servicesHero'));
    }

    public function create()
    {
        return view('back.admin.services-hero.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'main_image' => 'required|image|mimes:jpeg,png,jpg,webp',
            'experience_text_az' => 'required|string',
            'experience_text_en' => 'required|string',
            'experience_text_ru' => 'required|string',
            'experience_description_az' => 'required|string',
            'experience_description_en' => 'required|string',
            'experience_description_ru' => 'required|string',
            'experience_image' => 'required|image|mimes:jpeg,png,jpg,webp',
            'manager_text_az' => 'required|string',
            'manager_text_en' => 'required|string',
            'manager_text_ru' => 'required|string',
            'manager_description_az' => 'required|string',
            'manager_description_en' => 'required|string',
            'manager_description_ru' => 'required|string',
            'manager_image' => 'required|image|mimes:jpeg,png,jpg,webp',
            'security_text_az' => 'required|string',
            'security_text_en' => 'required|string',
            'security_text_ru' => 'required|string',
            'security_description_az' => 'required|string',
            'security_description_en' => 'required|string',
            'security_description_ru' => 'required|string',
            'security_image' => 'required|image|mimes:jpeg,png,jpg,webp',
            'main_image_alt_az' => 'required|string',
            'main_image_alt_en' => 'required|string',
            'main_image_alt_ru' => 'required|string',
            'experience_image_alt_az' => 'required|string',
            'experience_image_alt_en' => 'required|string',
            'experience_image_alt_ru' => 'required|string',
            'manager_image_alt_az' => 'required|string',
            'manager_image_alt_en' => 'required|string',
            'manager_image_alt_ru' => 'required|string',
            'security_image_alt_az' => 'required|string',
            'security_image_alt_en' => 'required|string',
            'security_image_alt_ru' => 'required|string',
        ]);

        $data = $request->except(['_token', 'main_image', 'experience_image', 'manager_image', 'security_image']);

        // Handle image uploads
        if ($request->hasFile('main_image')) {
            $data['main_image_path'] = $request->file('main_image')->store('services_hero', 'public');
        }
        if ($request->hasFile('experience_image')) {
            $data['experience_image_path'] = $request->file('experience_image')->store('services_hero', 'public');
        }
        if ($request->hasFile('manager_image')) {
            $data['manager_image_path'] = $request->file('manager_image')->store('services_hero', 'public');
        }
        if ($request->hasFile('security_image')) {
            $data['security_image_path'] = $request->file('security_image')->store('services_hero', 'public');
        }

        ServicesHero::create($data);

        return redirect()->route('back.pages.services-hero.index')->with('success', 'Xidmət Hero uğurla əlavə edildi.');
    }

    public function edit(ServicesHero $servicesHero)
    {
        return view('back.admin.services-hero.edit', compact('servicesHero'));
    }

    public function update(Request $request, ServicesHero $servicesHero)
    {
        $validated = $request->validate([
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'experience_text_az' => 'required|string',
            'experience_text_en' => 'required|string',
            'experience_text_ru' => 'required|string',
            'experience_description_az' => 'required|string',
            'experience_description_en' => 'required|string',
            'experience_description_ru' => 'required|string',
            'experience_image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'manager_text_az' => 'required|string',
            'manager_text_en' => 'required|string',
            'manager_text_ru' => 'required|string',
            'manager_description_az' => 'required|string',
            'manager_description_en' => 'required|string',
            'manager_description_ru' => 'required|string',
            'manager_image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'security_text_az' => 'required|string',
            'security_text_en' => 'required|string',
            'security_text_ru' => 'required|string',
            'security_description_az' => 'required|string',
            'security_description_en' => 'required|string',
            'security_description_ru' => 'required|string',
            'security_image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'main_image_alt_az' => 'required|string',
            'main_image_alt_en' => 'required|string',
            'main_image_alt_ru' => 'required|string',
            'experience_image_alt_az' => 'required|string',
            'experience_image_alt_en' => 'required|string',
            'experience_image_alt_ru' => 'required|string',
            'manager_image_alt_az' => 'required|string',
            'manager_image_alt_en' => 'required|string',
            'manager_image_alt_ru' => 'required|string',
            'security_image_alt_az' => 'required|string',
            'security_image_alt_en' => 'required|string',
            'security_image_alt_ru' => 'required|string',
        ]);

        $data = $request->except(['_token', '_method', 'main_image', 'experience_image', 'manager_image', 'security_image']);

        // Handle image updates
        if ($request->hasFile('main_image')) {
            if ($servicesHero->main_image_path) {
                Storage::disk('public')->delete($servicesHero->main_image_path);
            }
            $data['main_image_path'] = $request->file('main_image')->store('services_hero', 'public');
        }

        if ($request->hasFile('experience_image')) {
            if ($servicesHero->experience_image_path) {
                Storage::disk('public')->delete($servicesHero->experience_image_path);
            }
            $data['experience_image_path'] = $request->file('experience_image')->store('services_hero', 'public');
        }

        if ($request->hasFile('manager_image')) {
            if ($servicesHero->manager_image_path) {
                Storage::disk('public')->delete($servicesHero->manager_image_path);
            }
            $data['manager_image_path'] = $request->file('manager_image')->store('services_hero', 'public');
        }

        if ($request->hasFile('security_image')) {
            if ($servicesHero->security_image_path) {
                Storage::disk('public')->delete($servicesHero->security_image_path);
            }
            $data['security_image_path'] = $request->file('security_image')->store('services_hero', 'public');
        }

        $servicesHero->update($data);

        return redirect()->route('back.pages.services-hero.index')->with('success', 'Xidmət Hero uğurla yeniləndi.');
    }

    public function destroy(ServicesHero $servicesHero)
    {
        // Delete associated images
        if ($servicesHero->main_image_path) {
            Storage::disk('public')->delete($servicesHero->main_image_path);
        }
        if ($servicesHero->experience_image_path) {
            Storage::disk('public')->delete($servicesHero->experience_image_path);
        }
        if ($servicesHero->manager_image_path) {
            Storage::disk('public')->delete($servicesHero->manager_image_path);
        }
        if ($servicesHero->security_image_path) {
            Storage::disk('public')->delete($servicesHero->security_image_path);
        }

        $servicesHero->delete();

        return redirect()->route('back.pages.services-hero.index')->with('success', 'Xidmət Hero uğurla silindi.');
    }

    public function toggleStatus($id)
    {
        $servicesHero = ServicesHero::findOrFail($id);
        $servicesHero->status = !$servicesHero->status;
        $servicesHero->save();

        return redirect()->back()->with('success', 'Status uğurla yeniləndi.');
    }
} 
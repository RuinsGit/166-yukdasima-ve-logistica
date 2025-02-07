<?php

namespace App\Http\Controllers\Admin;

use App\Models\OurClient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class OurClientController extends Controller
{
    public function index()
    {
        $clients = OurClient::all();
        return view('back.admin.our_clients.index', compact('clients'));
    }

    public function create()
    {
        return view('back.admin.our_clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // Main Section
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'text_az' => 'required|string|max:1000',
            'text_en' => 'required|string|max:1000',
            'text_ru' => 'required|string|max:1000',
            'description_az' => 'required|string|max:2000',
            'description_en' => 'required|string|max:2000',
            'description_ru' => 'required|string|max:2000',
            'main_alt_az' => 'required|string|max:255',
            'main_alt_en' => 'required|string|max:255',
            'main_alt_ru' => 'required|string|max:255',
            
            // Bottom Section
            'bottom_image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'bottom_image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'bottom1_alt_az' => 'required|string|max:255',
            'bottom1_alt_en' => 'required|string|max:255',
            'bottom1_alt_ru' => 'required|string|max:255',
            'bottom2_alt_az' => 'required|string|max:255',
            'bottom2_alt_en' => 'required|string|max:255',
            'bottom2_alt_ru' => 'required|string|max:255',
            'meta_title_az' => 'nullable|string|max:255',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_title_ru' => 'nullable|string|max:255',
            'meta_description_az' => 'nullable|string|max:500',
            'meta_description_en' => 'nullable|string|max:500',
            'meta_description_ru' => 'nullable|string|max:500',
        ]);

        $mainImagePath = $request->file('main_image')->store('our_clients/main', 'public');
        $bottomImage1Path = $request->file('bottom_image1')->store('our_clients/bottom', 'public');
        $bottomImage2Path = $request->file('bottom_image2')->store('our_clients/bottom', 'public');

        OurClient::create([
            'main_image_path' => $mainImagePath,
            'text_az' => $request->text_az,
            'text_en' => $request->text_en,
            'text_ru' => $request->text_ru,
            'description_az' => $request->description_az,
            'description_en' => $request->description_en,
            'description_ru' => $request->description_ru,
            'main_alt_az' => $request->main_alt_az,
            'main_alt_en' => $request->main_alt_en,
            'main_alt_ru' => $request->main_alt_ru,
            'bottom_image1_path' => $bottomImage1Path,
            'bottom_image2_path' => $bottomImage2Path,
            'bottom1_alt_az' => $request->bottom1_alt_az,
            'bottom1_alt_en' => $request->bottom1_alt_en,
            'bottom1_alt_ru' => $request->bottom1_alt_ru,
            'bottom2_alt_az' => $request->bottom2_alt_az,
            'bottom2_alt_en' => $request->bottom2_alt_en,
            'bottom2_alt_ru' => $request->bottom2_alt_ru,
            'meta_title_az' => $request->meta_title_az,
            'meta_title_en' => $request->meta_title_en,
            'meta_title_ru' => $request->meta_title_ru,
            'meta_description_az' => $request->meta_description_az,
            'meta_description_en' => $request->meta_description_en,
            'meta_description_ru' => $request->meta_description_ru,
            'status' => true
        ]);

        return redirect()->route('back.pages.our-clients.index')->with('success', 'Müştəri məlumatları uğurla əlavə edildi');
    }

    public function edit(OurClient $ourClient)
    {
        return view('back.admin.our_clients.edit', compact('ourClient'));
    }

    public function update(Request $request, OurClient $ourClient)
    {
        $request->validate([
            // Main Section
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'text_az' => 'required|string|max:1000',
            'text_en' => 'required|string|max:1000',
            'text_ru' => 'required|string|max:1000',
            'description_az' => 'required|string|max:2000',
            'description_en' => 'required|string|max:2000',
            'description_ru' => 'required|string|max:2000',
            'main_alt_az' => 'required|string|max:255',
            'main_alt_en' => 'required|string|max:255',
            'main_alt_ru' => 'required|string|max:255',
            
            // Bottom Section
            'bottom_image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'bottom_image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'bottom1_alt_az' => 'required|string|max:255',
            'bottom1_alt_en' => 'required|string|max:255',
            'bottom1_alt_ru' => 'required|string|max:255',
            'bottom2_alt_az' => 'required|string|max:255',
            'bottom2_alt_en' => 'required|string|max:255',
            'bottom2_alt_ru' => 'required|string|max:255',
            'meta_title_az' => 'nullable|string|max:255',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_title_ru' => 'nullable|string|max:255',
            'meta_description_az' => 'nullable|string|max:500',
            'meta_description_en' => 'nullable|string|max:500',
            'meta_description_ru' => 'nullable|string|max:500',
        ]);

        if ($request->hasFile('main_image')) {
            Storage::disk('public')->delete($ourClient->main_image_path);
            $ourClient->main_image_path = $request->file('main_image')->store('our_clients/main', 'public');
        }

        if ($request->hasFile('bottom_image1')) {
            Storage::disk('public')->delete($ourClient->bottom_image1_path);
            $ourClient->bottom_image1_path = $request->file('bottom_image1')->store('our_clients/bottom', 'public');
        }

        if ($request->hasFile('bottom_image2')) {
            Storage::disk('public')->delete($ourClient->bottom_image2_path);
            $ourClient->bottom_image2_path = $request->file('bottom_image2')->store('our_clients/bottom', 'public');
        }

        $ourClient->update($request->except(['main_image', 'bottom_image1', 'bottom_image2']));

        return redirect()->route('back.pages.our-clients.index')->with('success', 'Müştəri məlumatları uğurla yeniləndi');
    }

    public function destroy(OurClient $ourClient)
    {
        Storage::disk('public')->delete([
            $ourClient->main_image_path,
            $ourClient->bottom_image1_path,
            $ourClient->bottom_image2_path
        ]);
        
        $ourClient->delete();
        return redirect()->back()->with('success', 'Müştəri məlumatları uğurla silindi');
    }

    public function toggleStatus($id)
    {
        $client = OurClient::findOrFail($id);
        $client->status = !$client->status;
        $client->save();
        return redirect()->back()->with('success', 'Status uğurla dəyişdirildi');
    }
} 
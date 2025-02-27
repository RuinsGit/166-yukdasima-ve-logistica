<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;

class ContactPhotoController extends Controller
{
    public function index()
    {
        Artisan::call('migrate');
        $contactPhotos = ContactPhoto::latest()->get();
        $canCreate = $contactPhotos->count() < 1; // Eğer kayıt sayısı 1'den azsa create'e izin ver
        return view('back.pages.contact-photos.index', compact('contactPhotos', 'canCreate'));
    }

    public function create()
    {
        if (ContactPhoto::count() >= 1) {
            return redirect()->route('back.pages.contact-photos.index')
                ->with('error', 'Maksimum 1 şəkil əlavə edilə bilər');
        }
        return view('back.pages.contact-photos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_az' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_alt' => 'nullable|string|max:255',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('contact-photos', 'public');
            $data['image_path'] = $imagePath;
        }

        ContactPhoto::create($data);
        return redirect()->route('back.pages.contact-photos.index')
            ->with('success', 'Əlaqə şəkili uğurla əlavə edildi');
    }

    public function edit($id)
    {
        $contactPhoto = ContactPhoto::findOrFail($id);
        return view('back.pages.contact-photos.edit', compact('contactPhoto'));
    }

    public function update(Request $request, $id)
    {
        $contactPhoto = ContactPhoto::findOrFail($id);

        $request->validate([
            'title_az' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_alt' => 'nullable|string|max:255',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Delete old image
            if ($contactPhoto->image_path) {
                Storage::disk('public')->delete($contactPhoto->image_path);
            }

            $image = $request->file('image');
            $imagePath = $image->store('contact-photos', 'public');
            $data['image_path'] = $imagePath;
        }

        $contactPhoto->update($data);
        return redirect()->route('back.pages.contact-photos.index')
            ->with('success', 'Əlaqə şəkili uğurla yeniləndi');
    }

    public function destroy($id)
    {
        $contactPhoto = ContactPhoto::findOrFail($id);
        
        if ($contactPhoto->image_path) {
            Storage::disk('public')->delete($contactPhoto->image_path);
        }

        $contactPhoto->delete();
        return redirect()->back()->with('success', 'Əlaqə şəkili uğurla silindi');
    }

    public function toggleStatus($id)
    {
        $contactPhoto = ContactPhoto::findOrFail($id);
        $contactPhoto->status = !$contactPhoto->status;
        $contactPhoto->save();
        return redirect()->back()->with('success', 'Status uğurla dəyişdirildi');
    }
} 
<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ContactDataController extends Controller
{
    public function index()
    {
        $data = ContactData::paginate(10);
        return view('back.admin.contact_data.index', compact('data'));
    }

    public function create()
    {
        if(ContactData::count() >= 1) {
            return redirect()->back()->with('error', 'Yalnız 1 məlumat əlavə edilə bilər!');
        }
        return view('back.admin.contact_data.create');
    }

    public function store(Request $request)
    {
        if(ContactData::count() >= 1) {
            return redirect()->back()->with('error', 'Yalnız 1 məlumat əlavə edilə bilər!');
        }
        $request->validate([
            'title_az' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'text_az' => 'required|string',
            'text_en' => 'required|string',
            'text_ru' => 'required|string',
            'contact_title_az' => 'required|string|max:255',
            'contact_title_en' => 'required|string|max:255',
            'contact_title_ru' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        $imagePath = $request->file('image')->store('contact_data', 'public');

        ContactData::create([
            ...$request->except('image'),
            'image_path' => $imagePath,
            'status' => true
        ]);

        return redirect()->route('back.pages.contact-data.index')->with('success', 'Məlumat uğurla əlavə edildi');
    }

    public function edit(ContactData $contactData)
    {
        return view('back.admin.contact_data.edit', compact('contactData'));
    }

    public function update(Request $request, ContactData $contactData)
    {
        $request->validate([
            'title_az' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'text_az' => 'required|string',
            'text_en' => 'required|string',
            'text_ru' => 'required|string',
            'contact_title_az' => 'required|string|max:255',
            'contact_title_en' => 'required|string|max:255',
            'contact_title_ru' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($contactData->image_path);
            $imagePath = $request->file('image')->store('contact_data', 'public');
            $contactData->image_path = $imagePath;
        }

        $contactData->update($request->except('image'));

        return redirect()->route('back.pages.contact-data.index')->with('success', 'Məlumat uğurla yeniləndi');
    }

    public function destroy(ContactData $contactData)
    {
        Storage::disk('public')->delete($contactData->image_path);
        $contactData->delete();
        return redirect()->back()->with('success', 'Məlumat uğurla silindi');
    }

    public function toggleStatus($id)
    {
        $data = ContactData::findOrFail($id);
        $data->status = !$data->status;
        $data->save();
        return redirect()->back()->with('success', 'Status uğurla dəyişdirildi');
    }
} 
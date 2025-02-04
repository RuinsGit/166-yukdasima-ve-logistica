<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(10);
        return view('back.admin.contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('back.admin.contacts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'address_az' => 'required',
            'address_en' => 'required',
            'address_ru' => 'required',
            'mail' => 'required|email|unique:contacts',
            'number' => 'required',
            'address_image' => 'required|image',
            'mail_image' => 'required|image',
            'number_image' => 'required|image',
        ]);

        // Resim yükleme işlemleri
        $validated['address_image'] = $request->file('address_image')->store('contacts', 'public');
        $validated['mail_image'] = $request->file('mail_image')->store('contacts', 'public');
        $validated['number_image'] = $request->file('number_image')->store('contacts', 'public');

        Contact::create($validated);
        return redirect()->route('back.pages.contacts.index')->with('success', 'Contact məlumatları uğurla əlavə edildi');
    }


    public function edit(Contact $contact)
    {
        return view('back.admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'address_az' => 'required',
            'address_en' => 'required',
            'address_ru' => 'required',
            'mail' => 'required|email|unique:contacts,mail,'.$contact->id,
            'number' => 'required',
            'address_image' => 'nullable|image',
            'mail_image' => 'nullable|image',
            'number_image' => 'nullable|image',
        ]);

        // Resim güncelleme işlemleri
        if($request->hasFile('address_image')) {
            $validated['address_image'] = $request->file('address_image')->store('contacts', 'public');
        }
        if($request->hasFile('mail_image')) {
            $validated['mail_image'] = $request->file('mail_image')->store('contacts', 'public');
        }
        if($request->hasFile('number_image')) {
            $validated['number_image'] = $request->file('number_image')->store('contacts', 'public');
        }

        $contact->update($validated);
        return redirect()->route('back.pages.contacts.index')->with('success', 'Contact məlumatları uğurla yeniləndi');

    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return back()->with('success', 'Contact məlumatları uğurla silindi');
    }


    public function toggleStatus($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->status = !$contact->status;
        $contact->save();
        return back()->with('success', 'Status uğurla dəyişdirildi');

    }
} 
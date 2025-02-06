<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Network;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NetworkController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $networks = Network::when($search, function($query) use ($search) {
                return $query->where('name_az', 'like', "%$search%")
                             ->orWhere('name_en', 'like', "%$search%")
                             ->orWhere('name_ru', 'like', "%$search%");
            })
            ->latest()
            ->get();

        return view('back.admin.networks.index', compact('networks', 'search'));
    }

    public function create()
    {
        if(Network::count() >= 195) {
            return redirect()->back()->with('error', 'Maksimum 195 şəbəkə əlavə edilə bilər');
        }
        return view('back.admin.networks.create');
    }

    public function store(Request $request)
    {
        if(Network::count() >= 195) {
            return redirect()->back()->with('error', 'Maksimum 195 şəbəkə əlavə edilə bilər');
        }
        $request->validate([
            'name_az' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'address_az' => 'nullable|string',
            'address_en' => 'nullable|string',
            'address_ru' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        $imagePath = $request->hasFile('image') 
            ? $request->file('image')->store('networks', 'public') 
            : null;

        Network::create([
            'name_az' => $request->name_az,
            'name_en' => $request->name_en,
            'name_ru' => $request->name_ru,
            'address_az' => $request->address_az,
            'address_en' => $request->address_en,
            'address_ru' => $request->address_ru,
            'image_path' => $imagePath,
            'status' => true
        ]);

        return redirect()->route('back.pages.networks.index')->with('success', 'Şəbəkə uğurla əlavə edildi');
    }

    public function edit(Network $network)
    {
        return view('back.admin.networks.edit', compact('network'));
    }

    public function update(Request $request, Network $network)
    {
        $request->validate([
            'name_az' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'address_az' => 'nullable|string',
            'address_en' => 'nullable|string',
            'address_ru' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        if ($request->hasFile('image')) {
            if($network->image_path) {
                Storage::disk('public')->delete($network->image_path);
            }
            $imagePath = $request->file('image')->store('networks', 'public');
            $network->image_path = $imagePath;
        }

        $network->update($request->except('image'));

        return redirect()->route('back.pages.networks.index')->with('success', 'Şəbəkə uğurla yeniləndi');
    }

    public function destroy(Network $network)
    {
        if($network->image_path) {
            Storage::disk('public')->delete($network->image_path);
        }
        $network->delete();
        return redirect()->back()->with('success', 'Şəbəkə uğurla silindi');
    }

    public function toggleStatus($id)
    {
        $network = Network::findOrFail($id);
        $network->status = !$network->status;
        $network->save();
        return redirect()->back()->with('success', 'Status uğurla dəyişdirildi');
    }
} 
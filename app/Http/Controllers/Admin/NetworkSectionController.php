<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NetworkSection;
use App\Models\Continent;
use Illuminate\Http\Request;


class NetworkSectionController extends Controller
{
    public function index()
    { 
       
        $networkSections = NetworkSection::with('continent')->latest()->get();
        return view('back.pages.network-sections.index', compact('networkSections'));
    }

    public function create()
    {
        $continents = Continent::where('status', 1)->get();
        return view('back.pages.network-sections.create', compact('continents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'continent_id' => 'required|exists:continents,id',
            'ulke_adi_az' => 'required|string|max:255',
            'ulke_adi_en' => 'required|string|max:255',
            'ulke_adi_ru' => 'required|string|max:255',
        ]);

        NetworkSection::create($request->all());
        return redirect()->route('back.pages.network-sections.index')
            ->with('success', 'Ölkə uğurla əlavə edildi');
    }

    public function edit($id)
    {
        $networkSection = NetworkSection::findOrFail($id);
        $continents = Continent::where('status', 1)->get();
        return view('back.pages.network-sections.edit', compact('networkSection', 'continents'));
    }

    public function update(Request $request, $id)
    {
        $networkSection = NetworkSection::findOrFail($id);

        $request->validate([
            'continent_id' => 'required|exists:continents,id',
            'ulke_adi_az' => 'required|string|max:255',
            'ulke_adi_en' => 'required|string|max:255',
            'ulke_adi_ru' => 'required|string|max:255',
        ]);

        $networkSection->update($request->all());

        return redirect()->route('back.pages.network-sections.index')
            ->with('success', 'Ölkə uğurla yeniləndi');
    }

    public function destroy($id)
    {
        $networkSection = NetworkSection::findOrFail($id);
        $networkSection->delete();
        
        return redirect()->back()->with('success', 'Network Section uğurla silindi');
    }

    public function toggleStatus($id)
    {
        $networkSection = NetworkSection::findOrFail($id);
        $networkSection->status = !$networkSection->status;
        $networkSection->save();
        
        return redirect()->back()->with('success', 'Status uğurla dəyişdirildi');
    }
}

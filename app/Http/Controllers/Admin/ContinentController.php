<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Continent;
use Illuminate\Http\Request;


class ContinentController extends Controller
{
    public function index()
    {
        
        $continents = Continent::latest()->get();
        return view('back.pages.continents.index', compact('continents'));
    }

    public function create()
    {
        return view('back.pages.continents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_az' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
        ]);

        Continent::create($request->all());
        return redirect()->route('back.pages.continents.index')
            ->with('success', 'Qitə uğurla əlavə edildi');
    }

    public function edit($id)
    {
        $continent = Continent::findOrFail($id);
        return view('back.pages.continents.edit', compact('continent'));
    }

    public function update(Request $request, $id)
    {
        $continent = Continent::findOrFail($id);

        $request->validate([
            'name_az' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
        ]);

        $continent->update($request->all());
        return redirect()->route('back.pages.continents.index')
            ->with('success', 'Qitə uğurla yeniləndi');
    }

    public function destroy($id)
    {
        $continent = Continent::findOrFail($id);
        $continent->delete();
        return redirect()->back()->with('success', 'Qitə uğurla silindi');
    }

    public function toggleStatus($id)
    {
        $continent = Continent::findOrFail($id);
        $continent->status = !$continent->status;
        $continent->save();
        return redirect()->back()->with('success', 'Status uğurla dəyişdirildi');
    }
} 
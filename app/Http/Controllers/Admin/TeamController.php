<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::orderBy('position_az')->get();
        return view('back.admin.teams.index', compact('teams'));
    }

    public function create()
    {
        return view('back.admin.teams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_az' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'position_az' => 'required|string|max:255',
            'position_en' => 'required|string|max:255',
            'position_ru' => 'required|string|max:255',
        ], [
            'position_az.min' => 'AZ sıralama 1-dən kiçik ola bilməz',
            'position_en.min' => 'EN position cannot be less than 1',
            'position_ru.min' => 'RU позиция не может быть меньше 1'
        ]);

        $imagePath = $request->file('image')->store('teams', 'public');

        Team::create([
            'name_az' => $request->name_az,
            'name_en' => $request->name_en,
            'name_ru' => $request->name_ru,
            'image_path' => $imagePath,
            'position_az' => $request->position_az,
            'position_en' => $request->position_en,
            'position_ru' => $request->position_ru,
            'status' => true
        ]);

        return redirect()->route('back.pages.teams.index')->with('success', 'Komanda uğurla əlavə edildi');
    }

    public function edit(Team $team)
    {
        return view('back.admin.teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name_az' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'position_az' => 'required|string|max:255',
            'position_en' => 'required|string|max:255',
            'position_ru' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($team->image_path);
            $imagePath = $request->file('image')->store('teams', 'public');
            $team->image_path = $imagePath;
        }

        $team->update([
            'name_az' => $request->name_az,
            'name_en' => $request->name_en,
            'name_ru' => $request->name_ru,
            'position_az' => $request->position_az,
            'position_en' => $request->position_en,
            'position_ru' => $request->position_ru,
        ]);

        return redirect()->route('back.pages.teams.index')->with('success', 'Komanda uğurla yeniləndi');
    }

    public function destroy(Team $team)
    {
        Storage::disk('public')->delete($team->image_path);
        $team->delete();
        return redirect()->back()->with('success', 'Komanda uğurla silindi');
    }

    public function toggleStatus($id)
    {
        $team = Team::findOrFail($id);
        $team->status = !$team->status;
        $team->save();
        return redirect()->back()->with('success', 'Status uğurla dəyişdirildi');
    }
} 
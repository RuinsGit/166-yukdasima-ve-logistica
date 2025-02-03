<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('back.admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('back.admin.services.create');
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
        ]);

        Service::create($request->all());

        return redirect()->route('back.pages.services.index')->with('success', 'Xidmət uğurla əlavə edildi');
    }

    public function edit(Service $service)
    {
        return view('back.admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
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
        ]);

        $service->update($request->all());

        return redirect()->route('back.pages.services.index')->with('success', 'Xidmət uğurla yeniləndi');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->back()->with('success', 'Xidmət uğurla silindi');
    }

    public function toggleStatus($id)
    {
        $service = Service::findOrFail($id);
        $service->status = !$service->status;
        $service->save();
        return redirect()->back()->with('success', 'Status uğurla dəyişdirildi');
    }
} 
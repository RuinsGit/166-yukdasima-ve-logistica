<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\ServiceType;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('back.admin.services.index', compact('services'));
    }

    public function create()
    {
        $serviceTypes = ServiceType::where('status', true)->get();
        return view('back.admin.services.create', compact('serviceTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'slug_az' => 'required|string|unique:services,slug_az',
            'slug_en' => 'required|string|unique:services,slug_en',
            'slug_ru' => 'required|string|unique:services,slug_ru',
            'name_az' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'text_az' => 'required|string',
            'text_en' => 'required|string',
            'text_ru' => 'required|string',
            'description_az' => 'required|string',
            'description_en' => 'required|string',
            'description_ru' => 'required|string',
            'image_main' => 'nullable|image|max:2048',
            'image_bottom' => 'nullable|image|max:2048',
            'image_main_alt_az' => 'nullable|string|max:255',
            'image_main_alt_en' => 'nullable|string|max:255',
            'image_main_alt_ru' => 'nullable|string|max:255',
            'image_bottom_alt_az' => 'nullable|string|max:255',
            'image_bottom_alt_en' => 'nullable|string|max:255',
            'image_bottom_alt_ru' => 'nullable|string|max:255',
            'description2_az' => 'nullable|string',
            'description2_en' => 'nullable|string',
            'description2_ru' => 'nullable|string',
            'service_type_id' => 'required|exists:service_types,id',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image_main')) {
            $data['image_main'] = $request->file('image_main')->store('services', 'public');
        }
        if ($request->hasFile('image_bottom')) {
            $data['image_bottom'] = $request->file('image_bottom')->store('services', 'public');
        }

        $service = Service::create([
            ...$data,
            'service_type_id' => $request->service_type_id
        ]);

        return redirect()->route('back.pages.services.index')->with('success', 'Xidmət uğurla əlavə edildi');
    }

    public function edit(Service $service)
    {
        $serviceTypes = ServiceType::where('status', true)->get();
        return view('back.admin.services.edit', compact('service', 'serviceTypes'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'slug_az' => 'required|string|unique:services,slug_az,'.$service->id,
            'slug_en' => 'required|string|unique:services,slug_en,'.$service->id,
            'slug_ru' => 'required|string|unique:services,slug_ru,'.$service->id,
            'name_az' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'text_az' => 'required|string',
            'text_en' => 'required|string',
            'text_ru' => 'required|string',
            'description_az' => 'required|string',
            'description_en' => 'required|string',
            'description_ru' => 'required|string',
            'image_main' => 'nullable|image|max:2048',
            'image_bottom' => 'nullable|image|max:2048',
            'image_main_alt_az' => 'nullable|string|max:255',
            'image_main_alt_en' => 'nullable|string|max:255',
            'image_main_alt_ru' => 'nullable|string|max:255',
            'image_bottom_alt_az' => 'nullable|string|max:255',
            'image_bottom_alt_en' => 'nullable|string|max:255',
            'image_bottom_alt_ru' => 'nullable|string|max:255',
            'description2_az' => 'nullable|string',
            'description2_en' => 'nullable|string',
            'description2_ru' => 'nullable|string',
            'service_type_id' => 'required|exists:service_types,id',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image_main')) {
            Storage::disk('public')->delete($service->image_main);
            $data['image_main'] = $request->file('image_main')->store('services', 'public');
        }
        if ($request->hasFile('image_bottom')) {
            Storage::disk('public')->delete($service->image_bottom);
            $data['image_bottom'] = $request->file('image_bottom')->store('services', 'public');
        }

        $service->update($data);
        $service->type()->associate($request->service_type_id);
        $service->save();

        return redirect()->route('back.pages.services.index')->with('success', 'Xidmət uğurla yeniləndi');
    }

    public function destroy(Service $service)
    {
        Storage::disk('public')->delete([$service->image_main, $service->image_bottom]);
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
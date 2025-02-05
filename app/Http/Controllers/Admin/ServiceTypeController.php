<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use App\Models\ServiceType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ServiceTypeController extends Controller
{
    public function index()
    {
        $types = ServiceType::orderBy('number')->get();
        return view('back.admin.service-types.index', compact('types'));
    }




    public function create()
    {
        return view('back.admin.service-types.create');
    }




    public function store(Request $request)
    {
        $request->validate([
            'name_az' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'number' => 'required|integer',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('service-types', 'public');
        }

        ServiceType::create($data);

        return redirect()->route('back.pages.services-types.index')
            ->with('success', 'Xidmət növü uğurla əlavə edildi');

    }

    public function edit(ServiceType $type)
    {
        return view('back.admin.service-types.edit', compact('type'));
    }



    public function update(Request $request, ServiceType $type)
    {
        $request->validate([
            'name_az' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'number' => 'required|integer',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($type->image);
            $data['image'] = $request->file('image')->store('service-types', 'public');
        }

        $type->update($data);

        return redirect()->route('back.pages.services-types.index')
            ->with('success', 'Xidmət növü uğurla yeniləndi');


    }

    public function destroy(ServiceType $type)
    {
        Storage::disk('public')->delete($type->image);
        $type->delete();
        return redirect()->back()->with('success', 'Xidmət növü uğurla silindi');
    }

    public function toggleStatus($typeId)
    {
        $type = ServiceType::findOrFail($typeId);
        $type->status = !$type->status;
        $type->save();
        return redirect()->back()->with('success', 'Status uğurla dəyişdirildi');
    }
} 
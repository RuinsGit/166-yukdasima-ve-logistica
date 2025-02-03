<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogTypeController extends Controller
{
    public function index()
    {
        $types = BlogType::all();
        return view('back.admin.blog_types.index', compact('types'));
    }

    public function create()
    {
        return view('back.admin.blog_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_az' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
        ]);

        BlogType::create($request->all());

        return redirect()->route('back.pages.blog-types.index')->with('success', 'Blog növü uğurla əlavə edildi');
    }

    public function edit(BlogType $blogType)
    {
        return view('back.admin.blog_types.edit', compact('blogType'));
    }

    public function update(Request $request, BlogType $blogType)
    {
        $request->validate([
            'name_az' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
        ]);

        $blogType->update($request->all());

        return redirect()->route('back.pages.blog-types.index')->with('success', 'Blog növü uğurla yeniləndi');
    }

    public function destroy(BlogType $blogType)
    {
        $blogType->delete();
        return redirect()->back()->with('success', 'Blog növü uğurla silindi');
    }

    public function toggleStatus($id)
    {
        $type = BlogType::findOrFail($id);
        $type->status = !$type->status;
        $type->save();
        return redirect()->back()->with('success', 'Status uğurla dəyişdirildi');
    }
} 
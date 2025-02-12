<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class BlogController extends Controller
{
    public function index()
    {
        Artisan::call('migrate');
        $blogs = Blog::paginate(10);
        return view('back.admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('back.admin.blogs.create');
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'bottom_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'alt_az' => 'required|string|max:255',
            'alt_en' => 'required|string|max:255',
            'alt_ru' => 'required|string|max:255',
            'bottom_alt_az' => 'nullable|string|max:255',
            'bottom_alt_en' => 'nullable|string|max:255',
            'bottom_alt_ru' => 'nullable|string|max:255',
            'slug_az' => 'required|unique:blogs,slug_az',
            'slug_en' => 'required|unique:blogs,slug_en',
            'slug_ru' => 'required|unique:blogs,slug_ru',
            'meta_title_az' => 'nullable|string|max:255',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_title_ru' => 'nullable|string|max:255',
            'meta_description_az' => 'nullable|string|max:500',
            'meta_description_en' => 'nullable|string|max:500',
            'meta_description_ru' => 'nullable|string|max:500',
            'description_3_az' => 'nullable|string',
            'description_3_en' => 'nullable|string',
            'description_3_ru' => 'nullable|string',
            'text_2_az' => 'nullable|string',
            'text_2_en' => 'nullable|string',
            'text_2_ru' => 'nullable|string',
            'tags' => 'nullable|array',
            'tags.*' => 'string|max:50|min:2',
        ]);

        $imagePath = $request->file('image')->store('blogs', 'public');
        $bottomImagePath = $request->file('bottom_image')->store('blogs/bottom', 'public');

        // Tag'leri işle
        $tags = $request->tags ? array_map(function($tag) {
            return strtolower(trim($tag));
        }, $request->tags) : [];

        $blog = Blog::create([
            'name_az' => $request->name_az,
            'name_en' => $request->name_en,
            'name_ru' => $request->name_ru,
            'text_az' => $request->text_az,
            'text_en' => $request->text_en,
            'text_ru' => $request->text_ru,
            'description_az' => $request->description_az,
            'description_en' => $request->description_en,
            'description_ru' => $request->description_ru,
            'description_3_az' => $request->description_3_az,
            'description_3_en' => $request->description_3_en,
            'description_3_ru' => $request->description_3_ru,
            'image_path' => $imagePath,
            'bottom_image_path' => $bottomImagePath,
            'alt_az' => $request->alt_az,
            'alt_en' => $request->alt_en,
            'alt_ru' => $request->alt_ru,
            'bottom_alt_az' => $request->bottom_alt_az,
            'bottom_alt_en' => $request->bottom_alt_en,
            'bottom_alt_ru' => $request->bottom_alt_ru,
            'slug_az' => $request->slug_az,
            'slug_en' => $request->slug_en,
            'slug_ru' => $request->slug_ru,
            'meta_title_az' => $request->meta_title_az,
            'meta_title_en' => $request->meta_title_en,
            'meta_title_ru' => $request->meta_title_ru,
            'meta_description_az' => $request->meta_description_az,
            'meta_description_en' => $request->meta_description_en,
            'meta_description_ru' => $request->meta_description_ru,
            'text_2_az' => $request->text_2_az,
            'text_2_en' => $request->text_2_en,
            'text_2_ru' => $request->text_2_ru,
            'tags' => $tags,
        ]);

        return redirect()->route('back.pages.blogs.index')->with('success', 'Blog uğurla əlavə edildi');
    }

    public function edit(Blog $blog)
    {
        return view('back.admin.blogs.edit', compact('blog'));
    }
    

    public function update(Request $request, Blog $blog)
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'bottom_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'alt_az' => 'required|string|max:255',
            'alt_en' => 'required|string|max:255',
            'alt_ru' => 'required|string|max:255',
            'bottom_alt_az' => 'nullable|string|max:255',
            'bottom_alt_en' => 'nullable|string|max:255',
            'bottom_alt_ru' => 'nullable|string|max:255',
            'slug_az' => 'required|unique:blogs,slug_az,'.$blog->id,
            'slug_en' => 'required|unique:blogs,slug_en,'.$blog->id,
            'slug_ru' => 'required|unique:blogs,slug_ru,'.$blog->id,
            'meta_title_az' => 'nullable|string|max:255',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_title_ru' => 'nullable|string|max:255',
            'meta_description_az' => 'nullable|string|max:500',
            'meta_description_en' => 'nullable|string|max:500',
            'meta_description_ru' => 'nullable|string|max:500',
            'description_3_az' => 'nullable|string',
            'description_3_en' => 'nullable|string',
            'description_3_ru' => 'nullable|string',
            'text_2_az' => 'nullable|string',
            'text_2_en' => 'nullable|string',
            'text_2_ru' => 'nullable|string',
            'tags' => 'nullable|array',
            'tags.*' => 'string|max:50|min:2',
        ]);

        $data = $request->all();
        $data['tags'] = $request->tags ? array_map(function($tag) {
            return strtolower(trim($tag));
        }, $request->tags) : [];
        
        $blog->update($data);

        return redirect()->route('back.pages.blogs.index')->with('success', 'Güncelleme başarılı!');
    }

    public function destroy(Blog $blog)
    {
        // Ana ve alt resimleri sil
        Storage::disk('public')->delete([
            $blog->image_path,
            $blog->bottom_image_path
        ]);
        
        $blog->delete();
        return redirect()->back()->with('success', 'Blog uğurla silindi');
    }

    public function toggleStatus($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->status = !$blog->status;
        $blog->save();
        return redirect()->back()->with('success', 'Status uğurla dəyişdirildi');
    }

    public function deleteImage(Blog $blog, $imageIndex)
    {
        try {
            $images = json_decode($blog->multiple_image_path, true) ?? [];
            
            if(!isset($images[$imageIndex])) {
                return response()->json(['success' => false, 'message' => 'Şəkil tapılmadı'], 404);
            }

            $imagePath = $images[$imageIndex];
            
            // Fiziksel dosyayı sil
            if(Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }

            // Diziden kaldır ve yeniden indeksle
            unset($images[$imageIndex]);
            $images = array_values($images);

            // Veritabanını güncelle
            $blog->update([
                'multiple_image_path' => !empty($images) ? json_encode($images) : null
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Şəkil uğurla silindi'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Silmə zamanı xəta baş verdi: '.$e->getMessage()
            ], 500);
        }
    }
} 
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeHero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeHeroController extends Controller
{
    public function index()
    {
        $heroes = HomeHero::latest()->get();
        return view('back.admin.home_heroes.index', compact('heroes'));
    }

    public function create()
    {
        return view('back.admin.home_heroes.create');
    }

    public function store(Request $request)
    {
        // Validation'dan əvvəl
        \Log::info('Form göndərildi', $request->all());
        
        $request->validate([
            'media_type' => 'required|in:image,video',
            'media' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    $ext = strtolower($value->extension());
                    $allowedImage = ['jpg', 'jpeg', 'png', 'gif'];
                    $allowedVideo = ['mp4', 'mov', 'avi'];
                    
                    if ($request->media_type === 'image' && !in_array($ext, $allowedImage)) {
                        $fail('Resim formatı: '.implode(', ', $allowedImage).' olmalıdır');
                    } elseif ($request->media_type === 'video' && !in_array($ext, $allowedVideo)) {
                        $fail('Video formatı: '.implode(', ', $allowedVideo).' olmalıdır');
                    }
                }
            ],
            'alt_az' => 'required_if:media_type,image',
            'alt_en' => 'required_if:media_type,image',
            'alt_ru' => 'required_if:media_type,image',
            'video_title' => 'required_if:media_type,video'
        ],
        [
            'alt_az.required_if' => 'AZ dilində ALT mətni tələb olunur',
            'alt_en.required_if' => 'EN dilində ALT mətni tələb olunur',
            'alt_ru.required_if' => 'RU dilində ALT mətni tələb olunur',
            'video_title.required_if' => 'Video başlığı tələb olunur'
        ]);

        // Validation'dan sonra
        \Log::info('Validation keçdi');

        $path = $request->file('media')->store('home_hero', 'public');

        $hero = HomeHero::create([
            'media_type' => $request->media_type,
            'media_path' => $path,
            'alt_az' => $request->alt_az,
            'alt_en' => $request->alt_en,
            'alt_ru' => $request->alt_ru,
            'video_title' => $request->video_title,
            'status' => true
        ]);

        // Yoxlama üçün
        \Log::info('Yeni hero yaradıldı:', $hero->toArray());
        return redirect()->route('back.pages.home-heroes.index')
            ->with('success', 'Yeni hero uğurla əlavə edildi');
    }

    public function edit(HomeHero $homeHero)
    {
        return view('back.admin.home_heroes.edit', compact('homeHero'));
    }

    public function update(Request $request, HomeHero $homeHero)
    {
        $request->validate([
            'media_type' => 'required|in:image,video',
            'media' => [
                'nullable',
                function ($attribute, $value, $fail) use ($request) {
                    if ($value) {
                        $ext = strtolower($value->extension());
                        if ($request->media_type === 'image' && !in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])) {
                            $fail('Geçersiz resim formatı. İzin verilen formatlar: jpg, jpeg, png, gif');
                        } elseif ($request->media_type === 'video' && !in_array($ext, ['mp4', 'mov', 'avi'])) {
                            $fail('Geçersiz video formatı. İzin verilen formatlar: mp4, mov, avi');
                        }
                    }
                }
            ],
            'alt_az' => 'required_if:media_type,image',
            'alt_en' => 'required_if:media_type,image',
            'alt_ru' => 'required_if:media_type,image',
            'video_title' => 'required_if:media_type,video'
        ]);

        $data = [
            'media_type' => $request->media_type,
            'alt_az' => $request->alt_az,
            'alt_en' => $request->alt_en,
            'alt_ru' => $request->alt_ru,
            'video_title' => $request->video_title
        ];

        if ($request->hasFile('media')) {
            Storage::delete('public/'.$homeHero->media_path);
            $path = $request->file('media')->store('home_hero', 'public');
            $data['media_path'] = $path;
        }

        $homeHero->update($data);

        return redirect()->route('back.pages.home-heroes.index')
            ->with('success', 'Hero məlumatları uğurla yeniləndi');
    }

    public function destroy(HomeHero $homeHero)
    {
        try {
            Storage::delete('public/'.$homeHero->media_path);
            $homeHero->delete();
            return redirect()->route('back.pages.home-heroes.index')
                ->with('success', 'Hero məlumatları uğurla silindi');
        } catch (\Exception $e) {
            return redirect()->route('back.pages.home-heroes.index')
                ->with('error', 'Hero silinmə zamanı xəta baş verdi: '.$e->getMessage());
        }
    }

    public function toggleStatus($id)
    {
        $homeHero = HomeHero::findOrFail($id);
        $homeHero->status = !$homeHero->status;
        $homeHero->save();
        return redirect()->back()->with('success', 'Status uğurla dəyişdirildi');
    }
} 
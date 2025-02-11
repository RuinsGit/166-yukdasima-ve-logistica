<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Http\Resources\BlogListResource;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogApiController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status', 1)
                    ->with('images')
                    ->latest()
                    ->get();

        return BlogResource::collection($blogs);
    }

    public function getBySlug($lang, $slug)
    {
        try {
            $slugColumn = "slug_{$lang}";
            $blog = Blog::where('status', 1)
                      ->where($slugColumn, $slug)
                      ->with('images')
                      ->firstOrFail();

            return new BlogResource($blog);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Blog yazısı bulunamadı'
            ], 404);
        }
    }

    public function listAll()
    {
        $blogs = Blog::where('status', 1)
                    ->latest()
                    ->get();

        return BlogListResource::collection($blogs);
    }

    public function show($id)
    {
        try {
            $blog = Blog::where('status', 1)
                      ->with('images')
                      ->findOrFail($id);

            return new BlogResource($blog);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Blog yazısı bulunamadı'
            ], 404);
        }
    }

    public function getFeatured()
    {
        $blogs = Blog::where('status', 1)
                    ->where('is_featured', 1)
                    ->latest()
                    ->take(3)
                    ->get();

        return BlogResource::collection($blogs);
    }
}

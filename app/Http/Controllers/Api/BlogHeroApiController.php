<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogHeroResource;
use App\Models\BlogHero;

class BlogHeroApiController extends Controller
{
    public function index()
    {
        $blogHero = BlogHero::where('status', true)->first();
        return new BlogHeroResource($blogHero);
    }

    public function show($id)
    {
        $blogHero = BlogHero::findOrFail($id);
        return new BlogHeroResource($blogHero);
    }
} 
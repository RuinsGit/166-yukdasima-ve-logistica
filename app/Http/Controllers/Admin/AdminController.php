<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Message;
use App\Models\Customer;
use App\Models\BlogType;
use App\Models\Blog;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'Daxil edilən məlumatlar səhvdir.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function dashboard()
    {
        $statistics = [
            'total_blog_types' => BlogType::count(),
            'active_blog_types' => BlogType::where('status', true)->count(),
            'total_blogs' => Blog::count(),
            'active_blogs' => Blog::where('status', true)->count(),
            'latest_blog_types' => BlogType::withCount('blogs')->latest()->take(5)->get(),
            'latest_blogs' => Blog::with('type')->latest()->take(5)->get(),
        ];

        return view('back.admin.dashboard', compact('statistics'));
    }
} 
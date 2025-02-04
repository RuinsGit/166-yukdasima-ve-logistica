<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'website' => 'nullable|url',
            'comment' => 'required|min:10|max:1000',
        ]);

        ContactRequest::create($validated);

        return redirect()->back()->with('success', 'Sorğunuz uğurla göndərildi!');
    }
} 
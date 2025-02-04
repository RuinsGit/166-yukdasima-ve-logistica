<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactRequest;
use Illuminate\Http\Request;

class ContactRequestController extends Controller
{
    public function index()
    {
        $requests = ContactRequest::latest()->paginate(10);
        return view('back.admin.contact-requests.index', compact('requests'));
    }

    public function show(ContactRequest $contactRequest)
    {
        return view('back.admin.contact-requests.show', compact('contactRequest'));
    }

    public function destroy(ContactRequest $contactRequest)
    {
        $contactRequest->delete();
        return back()->with('success', 'Sorğu uğurla silindi');
    }

    public function toggleStatus($id)
    {
        $request = ContactRequest::findOrFail($id);
        $request->status = !$request->status;
        $request->save();
        return back()->with('success', 'Status uğurla dəyişdirildi');
    }
} 
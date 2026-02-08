<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display the contact page.
     */
    public function index()
    {
        $projectTypes = Portfolio::getCategories();

        return view('contact', compact('projectTypes'));
    }

    /**
     * Store a new contact inquiry.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'project_type' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        Contact::create($validated);

        return redirect()->back()->with('success', 'Pesan Anda telah terkirim! Tim kami akan segera menghubungi Anda.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the inquiries.
     */
    public function index(Request $request)
    {
        $query = Contact::latest();

        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        $inquiries = $query->paginate(15);

        return view('admin.contacts.index', compact('inquiries'));
    }

    /**
     * Display the specified inquiry.
     */
    public function show(Contact $contact)
    {
        // Mark as read if new
        if ($contact->status === 'new') {
            $contact->update(['status' => 'read']);
        }

        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Update the inquiry status.
     */
    public function updateStatus(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,read,replied',
        ]);

        $contact->update($validated);

        return redirect()->back()->with('success', 'Status berhasil diperbarui!');
    }

    /**
     * Remove the specified inquiry.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')->with('success', 'Pesan berhasil dihapus!');
    }
}

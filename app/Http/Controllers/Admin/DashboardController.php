<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Portfolio;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $stats = [
            'total_portfolios' => Portfolio::count(),
            'published_portfolios' => Portfolio::published()->count(),
            'draft_portfolios' => Portfolio::where('status', 'draft')->count(),
            'new_inquiries' => Contact::new()->count(),
            'total_inquiries' => Contact::count(),
        ];

        $recentPortfolios = Portfolio::with('images')
            ->latest()
            ->take(5)
            ->get();

        $recentInquiries = Contact::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentPortfolios', 'recentInquiries'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        $featuredPortfolios = Portfolio::published()
            ->with('images')
            ->latest()
            ->take(6)
            ->get();

        $categories = Portfolio::getCategories();

        return view('home', compact('featuredPortfolios', 'categories'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the portfolios.
     */
    public function index(Request $request)
    {
        $categories = Portfolio::getCategories();
        $activeCategory = $request->get('category', 'all');

        $query = Portfolio::published()->with('images')->latest();

        if ($activeCategory !== 'all' && array_key_exists($activeCategory, $categories)) {
            $query->category($activeCategory);
        }

        $portfolios = $query->paginate(12);

        return view('portfolio.index', compact('portfolios', 'categories', 'activeCategory'));
    }

    /**
     * Display the specified portfolio.
     */
    public function show(Portfolio $portfolio)
    {
        // Only show published portfolios
        if ($portfolio->status !== 'published') {
            abort(404);
        }

        $portfolio->load('images');

        // Get related portfolios from the same category
        $relatedPortfolios = Portfolio::published()
            ->where('id', '!=', $portfolio->id)
            ->where('category', $portfolio->category)
            ->with('images')
            ->take(3)
            ->get();

        return view('portfolio.show', compact('portfolio', 'relatedPortfolios'));
    }
}

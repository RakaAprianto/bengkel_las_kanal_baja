<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\PortfolioImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the portfolios.
     */
    public function index(Request $request)
    {
        $query = Portfolio::with('images')->latest();

        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->has('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        $portfolios = $query->paginate(10);
        $categories = Portfolio::getCategories();

        return view('admin.portfolio.index', compact('portfolios', 'categories'));
    }

    /**
     * Show the form for creating a new portfolio.
     */
    public function create()
    {
        $categories = Portfolio::getCategories();
        $currentYear = date('Y');
        $years = range($currentYear, $currentYear - 10);

        return view('admin.portfolio.create', compact('categories', 'years'));
    }

    /**
     * Store a newly created portfolio.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'location' => 'required|string|max:255',
            'material' => 'nullable|string|max:255',
            'finishing' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'challenge' => 'nullable|string',
            'completion_year' => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'status' => 'required|in:draft,published',
            'is_featured' => 'boolean',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:10240',
        ]);

        // Generate unique slug
        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $count = 1;
        while (Portfolio::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }
        $validated['slug'] = $slug;
        $validated['is_featured'] = $request->has('is_featured');

        $portfolio = Portfolio::create($validated);

        // Handle image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('portfolios', 'public');

                PortfolioImage::create([
                    'portfolio_id' => $portfolio->id,
                    'image_path' => $path,
                    'is_primary' => $index === 0,
                    'sort_order' => $index,
                ]);
            }
        }

        $message = $portfolio->status === 'published'
            ? 'Portfolio berhasil dipublikasikan!'
            : 'Portfolio berhasil disimpan sebagai draft.';

        return redirect()->route('admin.portfolio.index')->with('success', $message);
    }

    /**
     * Show the form for editing the specified portfolio.
     */
    public function edit(Portfolio $portfolio)
    {
        $portfolio->load('images');
        $categories = Portfolio::getCategories();
        $currentYear = date('Y');
        $years = range($currentYear, $currentYear - 10);

        return view('admin.portfolio.edit', compact('portfolio', 'categories', 'years'));
    }

    /**
     * Update the specified portfolio.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'location' => 'required|string|max:255',
            'material' => 'nullable|string|max:255',
            'finishing' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'challenge' => 'nullable|string',
            'completion_year' => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'price' => 'nullable|numeric|min:0',
            'status' => 'required|in:draft,published',
            'is_featured' => 'boolean',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:10240',
        ]);

        $validated['is_featured'] = $request->has('is_featured');

        // Update slug if title changed
        if ($portfolio->title !== $validated['title']) {
            $slug = Str::slug($validated['title']);
            $originalSlug = $slug;
            $count = 1;
            while (Portfolio::where('slug', $slug)->where('id', '!=', $portfolio->id)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }
            $validated['slug'] = $slug;
        }

        $portfolio->update($validated);

        // Handle new image uploads
        if ($request->hasFile('images')) {
            $lastOrder = $portfolio->images()->max('sort_order') ?? -1;

            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('portfolios', 'public');

                PortfolioImage::create([
                    'portfolio_id' => $portfolio->id,
                    'image_path' => $path,
                    'is_primary' => false,
                    'sort_order' => $lastOrder + $index + 1,
                ]);
            }
        }

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio berhasil diperbarui!');
    }

    /**
     * Remove the specified portfolio.
     */
    public function destroy(Portfolio $portfolio)
    {
        // Delete all images
        foreach ($portfolio->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }

        $portfolio->delete();

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio berhasil dihapus!');
    }

    /**
     * Delete a specific image.
     */
    public function deleteImage(PortfolioImage $image)
    {
        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return response()->json(['success' => true]);
    }

    /**
     * Set an image as primary.
     */
    public function setPrimaryImage(PortfolioImage $image)
    {
        // Remove primary from all other images
        PortfolioImage::where('portfolio_id', $image->portfolio_id)
            ->update(['is_primary' => false]);

        // Set this image as primary
        $image->update(['is_primary' => true]);

        return response()->json(['success' => true]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'location',
        'material',
        'finishing',
        'description',
        'challenge',
        'completion_year',
        'price',
        'status',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'completion_year' => 'integer',
        'price' => 'decimal:2',
    ];

    /**
     * Get formatted price.
     */
    public function getFormattedPriceAttribute()
    {
        if ($this->price) {
            return 'Rp ' . number_format($this->price, 0, ',', '.');
        }
        return null;
    }

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($portfolio) {
            if (empty($portfolio->slug)) {
                $portfolio->slug = Str::slug($portfolio->title);
            }
        });

        static::updating(function ($portfolio) {
            if ($portfolio->isDirty('title') && empty($portfolio->slug)) {
                $portfolio->slug = Str::slug($portfolio->title);
            }
        });
    }

    /**
     * Get the images for the portfolio.
     */
    public function images()
    {
        return $this->hasMany(PortfolioImage::class)->orderBy('sort_order');
    }

    /**
     * Get the primary image for the portfolio.
     */
    public function primaryImage()
    {
        return $this->hasOne(PortfolioImage::class)->where('is_primary', true);
    }

    /**
     * Scope a query to only include published portfolios.
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    /**
     * Scope a query to only include featured portfolios.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope a query to filter by category.
     */
    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get thumbnail URL.
     */
    public function getThumbnailAttribute()
    {
        $primary = $this->images()->where('is_primary', true)->first();
        if ($primary) {
            return asset('storage/' . $primary->image_path);
        }

        $first = $this->images()->first();
        if ($first) {
            return asset('storage/' . $first->image_path);
        }

        return asset('images/placeholder.jpg');
    }

    /**
     * Get all available categories.
     */
    public static function getCategories()
    {
        return [
            'pagar' => 'Pagar & Gerbang',
            'kanopi' => 'Kanopi',
            'railing' => 'Railing & Tangga',
            'atap-besi' => 'Atap Besi',
            'struktur' => 'Struktur Baja',
            'tangga-putar' => 'Tangga Putar',
        ];
    }

    /**
     * Get category label.
     */
    public function getCategoryLabelAttribute()
    {
        $categories = self::getCategories();
        return $categories[$this->category] ?? $this->category;
    }
}

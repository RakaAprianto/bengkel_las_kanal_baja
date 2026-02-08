<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PortfolioImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'portfolio_id',
        'image_path',
        'is_primary',
        'sort_order',
    ];

    protected $casts = [
        'is_primary' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Get the portfolio that owns the image.
     */
    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }

    /**
     * Get the full URL of the image.
     */
    public function getUrlAttribute()
    {
        return asset('storage/' . $this->image_path);
    }

    /**
     * Delete the image file when the model is deleted.
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($image) {
            Storage::disk('public')->delete($image->image_path);
        });
    }
}

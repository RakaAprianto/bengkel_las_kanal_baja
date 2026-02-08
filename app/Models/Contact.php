<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'project_type',
        'message',
        'status',
    ];

    /**
     * Scope a query to only include new contacts.
     */
    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    /**
     * Get the status badge color.
     */
    public function getStatusColorAttribute()
    {
        return match ($this->status) {
            'new' => 'bg-yellow-100 text-yellow-800',
            'read' => 'bg-blue-100 text-blue-800',
            'replied' => 'bg-green-100 text-green-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }
}

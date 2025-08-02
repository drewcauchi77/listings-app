<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    /** @use HasFactory<\Database\Factories\ListingFactory> */
    use HasFactory;

    // To be filled through a form
    protected $fillable = [
        'title',
        'desc',
        'tags',
        'email',
        'link',
        'image',
        'approved',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false)
        {
            $query->where(function ($q) {
                return $q->where('title', 'LIKE', '%' . request()->search . '%')
                    ->orWhere('desc', 'LIKE', '%' . request()->search . '%');
            });
        }

        if ($filters['user_id'] ?? false)
        {
            $query->where('user_id', request()->user_id);
        }

        if ($filters['tag'] ?? false)
        {
            $query->where('tags', 'LIKE', '%' . request()->tag . '%');
        }

        if ($filters['disapproved'] ?? false)
        {
            $query->where('approved', false);
        }
    }
}

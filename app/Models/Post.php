<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Fields that are allowed for mass insert
    protected $fillable = [
        'title',
        'excerpt',
        'body',
        'published_at',
    ];

    // Eager Load Relationship. Allways include theese in Post.
    protected $with = ['category', 'author'];

    // Create scope for filtering
    public function scopeFilter($query, array $filters)
    {
        // Search filtering
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
            $query->where(fn($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%')
            )
        );

        // Search category
        $query->when($filters['category'] ?? false, fn ($query, $category) =>
            $query->whereHas('category', fn ($query) =>
                $query->where('slug', $category)
            )
        );

        // Search author
        $query->when($filters['author'] ?? false, fn ($query, $author) =>
            $query->whereHas('author', fn ($query) =>
                $query->where('username', $author)
            )
        );

    }

    // Set route default key
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Author relationship
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id'); // We changed the slug to author, so we have to provide the id
    }

    // Category relationship
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}

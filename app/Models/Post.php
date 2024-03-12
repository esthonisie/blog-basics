<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'image_post',
        'image_card',
        'is_premium',
    ];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['posts'])) {
            if ($filters['posts'] !== 'all') {
                $query
                    ->where('is_premium', 'like', '%' . request('posts') . '%');
            }
        }

        if (isset($filters['author'])) {
            if ($filters['author'] !== 'all') {
                $query->whereHas('user', fn($q) =>
                    $q->where('last_name', 'like', '%' . request('author') . '%')
                ); 
            }
        }

        if (isset($filters['category'])) {
            if ($filters['category'] !== 'all') {
                $query->whereHas('categories', fn($q) =>
                    $q->where('category_id', 'like', '%' . request('category') . '%')
                ); 
            }
        }

        /* $query->when($filters['posts'] ?? false, fn($query, $posts) =>
            $query->where('is_premium', $posts)    
        );

        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('user', fn($query) =>
                $query->where('last_name', $author))
        );

        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query->whereHas('categories', fn($query) =>
                $query->where('category_id', $category))
        ); */
        
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

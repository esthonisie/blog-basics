<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->validate([
            'search' => ['alpha_num', 'nullable'],
        ]);

        $yearStart = Post::oldest()->first('created_at')->created_at->format('Y');
        $yearRecent = Post::latest()->first('created_at')->created_at->format('Y');
        $yearsAll = Arr::sortDesc(range($yearStart, $yearRecent));
        
        $posts = Post::with('user', 'categories')
            ->orderByDesc('created_at')
            ->filter(request(['search', 'posts', 'author', 'category', 'year']))
            ->SimplePaginate(24);

        $categories = Category::has('posts')
            ->withCount('posts')
            ->orderByDesc('posts_count')
            ->get();

        $authors = User::with('posts')
            ->whereIn('role_id', [1,2])
            ->has('posts')
            ->get();

        return view('posts.index', compact('posts', 'categories', 'authors', 'yearsAll'));
    }

    public function show(Post $post)
    {
        return view('posts/show', ['post' => $post]);
    }
}
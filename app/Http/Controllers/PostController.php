<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSearchPostRequest;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;

class PostController extends Controller
{
    public function index(StoreSearchPostRequest $request)
    {
        $search = $request->validated();

        $yearStart = Post::oldest()->first('created_at')->created_at->format('Y');
        $yearRecent = Post::latest()->first('created_at')->created_at->format('Y');
        $yearsAll = Arr::sortDesc(range($yearStart, $yearRecent));
        
        $posts = Post::with('user:id,role_id,first_name,last_name,username', 'categories')
            ->orderByDesc('created_at')
            ->filter(request(['search', 'posts', 'author', 'category', 'year']))
            ->SimplePaginate(24);
        
        $categories = Category::has('posts')
            ->withCount('posts')
            ->orderByDesc('posts_count')
            ->get();
        
        $authors = User::select('last_name')->has('posts')->get();

        return view('posts.index', compact('posts', 'categories', 'authors', 'yearsAll'));
    }

    public function show(Post $post)
    {
        if ($post->is_premium === 1) {
            abort(403, 'unauthorized Action');
        } else {
            return view('posts/show', ['post' => $post]);
        }
    }
}
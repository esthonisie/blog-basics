<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'categories')
            ->orderByDesc('created_at')
            ->filter(request(['posts', 'author', 'category']))
            ->SimplePaginate(24);

        $categories = Category::has('posts')
            ->withCount('posts')
            ->orderByDesc('posts_count')
            ->get();

        $authors = User::with('posts')
            ->whereIn('role_id', [1,2])
            ->has('posts')
            ->get();

        return view('posts.index', compact('posts', 'categories', 'authors'));
    }

    public function show(Post $post)
    {
        return view('posts/show', ['post' => $post]);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts/index', ['posts' => Post::with('user', 'categories')
        ->orderByDesc('published_at')
        ->SimplePaginate(24)]);
    }

    public function show(Post $post)
    {
        return view('posts/show', ['post' => $post]);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PremiumController extends Controller
{
    public function index()
    {
        return view('premium.index', ['posts' => Post::with('user', 'categories')
            ->where('is_premium', 1)
            ->orderByDesc('created_at')
            ->SimplePaginate(24)]);
    }

    public function show(Post $post)
    {
        return view('premium.show', ['post' => $post]);
    }

    public function info()
    {
        return view('premium.info');
    }

    public function dashboard()
    {
        return view('premium.dashboard');
    }
}
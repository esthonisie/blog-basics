<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PremiumController extends Controller
{
    public function index()
    {
        return view('premium.index');
    }

    public function show(Post $post)
    {
        if ($post->is_premium !== 1) {
            abort(403, 'unauthorized Action');
        } else {
            return view('premium.show', ['post' => $post]);
        }
    }

    public function info()
    {
        return view('premium.info');
    }
}
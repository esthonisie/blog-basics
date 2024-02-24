<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    // dashboard
    public function index()
    {
        return view('admin/posts/index', [
            'posts' => Post::where('user_id', auth()->id())
            ->get()->sortByDesc('published_at')
        ]);
    }

    public function create()
    {
        return view('admin/posts/create');
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $attributes = $request->validated();

        $attributes['user_id'] = auth()->id();
        $attributes['published_at'] = Carbon::now();
        
        $post = Post::create($attributes);
          
        return redirect(route('posts.show', ['post' => $post->id]));
    }

    public function edit(Post $post)
    {
        return view('admin/posts/edit', ['post' => $post]);
    }

    public function update(StorePostRequest $request, Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(403, 'unauthorized Action');
        }

        $attributes = $request->validated();
        
        $post->update($attributes);
          
        return redirect(route('posts.show', ['post' => $post->id]))->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(403, 'unauthorized Action');
        }

        $post->delete();

        return redirect(route('dashboard.index'))->with('success', 'Post Deleted');
    }
}
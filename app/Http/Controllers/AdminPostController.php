<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
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
        return view('admin/posts/create', ['categories' => Category::all()]);
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $attributes = $request->validated();

        $attributes['user_id'] = auth()->id();
        $attributes['published_at'] = Carbon::now();
        $categories = $attributes["category_id"];
        
        $post = Post::create($attributes);

        $post->categories()->sync($categories);

        return redirect(route('posts.show', ['post' => $post->id]));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('admin/posts/edit', compact('post', 'categories'));
    }

    public function update(StorePostRequest $request, Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(403, 'unauthorized Action');
        }

        $attributes = $request->validated();

        $categories = $attributes["category_id"];
        
        $post->update($attributes);
        $post->categories()->sync($categories);
          
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
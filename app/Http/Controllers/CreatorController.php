<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class CreatorController extends Controller
{
    // dashboard
    public function index()
    {
        return view('creators.index', [
            'posts' => Auth::user()->posts->sortByDesc('created_at')
        ]);
    }

    public function create()
    {
        return view('creators.posts.create', ['categories' => Category::all()]);
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $validated['user_id'] = auth()->id();
        $validated['is_premium'] = ($request->post('is_premium') ?? 0) == 1;
        $validated['image_post'] = request()
            ->file('image_post')
            ->store('img/post-main-img', 'public');
        $validated['image_card'] = $validated['image_post']; 
        // TODO: install 'Intervention Image' for making smaller size img copy 
        
        $chosen_categories = $validated['chosen_categories'];

        $post = Post::create($validated);
        $post->categories()->sync($chosen_categories);

        if ($request->post('is_premium') == 1) {
            return redirect(route('premium.show', ['post' => $post->id]));
        } else {
            return redirect(route('posts.show', ['post' => $post->id]));
        }
    }

    public function edit(Post $post)
    {
        if (request()->user()->cannot('update', $post)) {
            abort(403, 'unauthorized Action');
        }
        
        $categories = Category::all();

        return view('creators.posts.edit', compact('post', 'categories'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        if (request()->user()->cannot('update', $post)) {
            abort(403, 'unauthorized Action');
        }

        $validated = $request->validated();

        $validated['is_premium'] = ($request->post('is_premium') ?? 0) == 1;
        $chosen_categories = $validated['chosen_categories'];

        if (isset($validated['image_post'])) {
            $validated['image_post'] = request()
                ->file('image_post')
                ->store('img/post-main-img', 'public');
            $validated['image_card'] = $validated['image_post'];
        }
        
        $post->update($validated);
        $post->categories()->sync($chosen_categories);
        
        if ($request->post('is_premium') == 1) {
            return redirect(route('premium.show', ['post' => $post->id]))
                ->with('success', 'Post Updated!');
        } else {
            return redirect(route('posts.show', ['post' => $post->id]))
                ->with('success', 'Post Updated!');
        }
    }

    public function destroy(Post $post)
    {
        if (request()->user()->cannot('delete', $post)) {
            abort(403, 'unauthorized Action');
        }

        $post->delete();

        return redirect(route('creators.index'))
            ->with('success', 'Post Deleted');
    }
}
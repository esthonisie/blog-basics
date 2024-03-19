<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class CreatorController extends Controller
{
    // dashboard
    public function index()
    {
        // TODO: ipv een where query kun je ook overwegen via relaties te querien:
        // Auth::user()->posts
        return view('creators.index', [
            'posts' => Post::where('user_id', auth()->id())
            ->get()->sortByDesc('created_at')
        ]);
    }

    public function create()
    {
        return view('creators.posts.create', ['categories' => Category::all()]);
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $attributes = $request->validated();

        $attributes['user_id'] = auth()->id();
        $attributes['is_premium'] = ($request->post('is_premium') ?? 0) == 1;
        $attributes['image_post'] = request()
            ->file('image_post')
            ->store('img/post-main-img', 'public');
        $attributes['image_card'] = $attributes['image_post']; 
        // TODO: install 'Intervention Image' for making smaller size img copy 
        // TODO: overweeg meervoud in naamgeving (catogory_ids) om aan te geven dat het om meerdere
        // elementen gaat
        $categories = $attributes['category_id'];

        $post = Post::create($attributes);
        $post->categories()->sync($categories);

        return redirect(route('posts.show', ['post' => $post->id]));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('creators.posts.edit', compact('post', 'categories'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        // TODO: technisch is dit een goede oplossing, maar probeer dit eens
        // mbv een policy op te lossen zodat de authorisatie herbruikbaar wordt
        // op andere plekken in je code
        if ($post->user_id !== auth()->id()) {
            abort(403, 'unauthorized Action');
        }

        $attributes = $request->validated();

        $attributes['is_premium'] = ($request->post('is_premium') ?? 0) == 1;
        $categories = $attributes["category_id"];

        if (isset($attributes['image_post'])) {
            $attributes['image_post'] = request()
                ->file('image_post')
                ->store('img/post-main-img', 'public');
            $attributes['image_card'] = $attributes['image_post'];
        }
        
        $post->update($attributes);
        $post->categories()->sync($categories);
          
        return redirect(route('posts.show', ['post' => $post->id]))
            ->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        
        if ($post->user_id !== auth()->id()) {
            abort(403, 'unauthorized Action');
        }

        $post->delete();

        return redirect(route('creators.index'))
            ->with('success', 'Post Deleted');
    }
}
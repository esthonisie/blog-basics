<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts/index', ['posts' => Post::all()->sortByDesc('published_at')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts/create', ['current' => Carbon::now()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request): RedirectResponse
    {
        $attributes = $request->validated();
            
        Post::create($attributes);
          
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $current = Carbon::now();

        return view('posts/show', compact('post', 'current'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}

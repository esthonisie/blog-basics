<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request, Post $post): RedirectResponse
    {
        $validated = $request->validated();

        $validated['user_id'] = auth()->id();
        $validated['post_id'] = $post->id;

        $comment = Comment::create($validated);
          
        return redirect(route('posts.show', ['post' => $post->id]) . '#' . $comment->id);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function store(Request $request, Post $post): RedirectResponse
    {
        $attributes = $request->validate([
            'body' => 'required', 'max:5000',
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['post_id'] = $post->id;
        $attributes['published_at'] = Carbon::now();

        $comment = Comment::create($attributes);
          
        return redirect(route('posts.show', ['post' => $post->id]) . '#' . $comment->id);
    }
}

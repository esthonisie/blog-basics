@extends ('layouts/app')

@section('title', 'Post')

@section('content')
    @if ($post->is_premium === 1 && !in_array(auth()->user()?->role_id, [1, 2, 3])) 
        <p style="font-size: 1.8rem; color:#fff6ec; margin:20px;">
            TODO: proper error handling
        </p>
    @else
        <div class="post-main-box">
            <article class="article-full">
                <img src="{{ asset('storage/' . $post->image_post) }}" style="width: 100%;">
                <h1>{{ $post->title }}</h1>
                <div>By {{ $post->user->name }} | {{ $post->created_at->format('F j, Y') }}</div>
                <div>{{ $post->body }}</div>
            </article>
            
            <span id="top"></span>
            @auth
                @include('partials._comment-form')
            @else
                <p style="color: #fff6ec; font-size: 1.8rem;">
                    <a href="{{ route('login.create') }}">Log in here </a>to leave a comment.
                </p>
            @endauth
            
            @foreach ($post->comments as $comment )
                <div class="post-comment-box">
                    {{ $comment->user->username }} {{ $comment->created_at->format('F j, Y \a\t g:i a') }}
                    <br>
                    <div id="{{ $comment->id }}">{{ $comment->body }}</div>
                    <a href="#top" style="font-size: 1.5rem;">create new comment</a>
                </div>
            @endforeach
        </div> 
    @endif
@endsection
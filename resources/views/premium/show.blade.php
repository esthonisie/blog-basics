@extends ('layouts/app')

@section('title', 'Premium Post')

@section('content')
    <div class="post-main-box">
        <article class="article-full">
            <img src="{{ asset('storage/' . $post->image_post) }}" style="width: 100%;">
            <h1>{{ $post->title }}</h1>
            <div>By {{ $post->user->name }} | {{ $post->created_at->format('F j, Y') }}</div>
            <div>{{ $post->body }}</div>
            <a href="{{ url()->previous() }}">&#8594; previous page</a>
        </article>
        
        <span id="top"></span>
        @auth
            @include('partials._comment-form')
        @endauth
        
        @foreach ($post->comments as $comment )
            <div class="post-comment-box">
                {{ $comment->user->username }} {{ $comment->created_at->format('F j, Y \a\t g:i a') }}
                <br>
                <div id="{{ $comment->id }}">{{ $comment->body }}</div>
                <a href="#top" style="font-size: 1.5rem;">&#8593; comment form &#8593;</a>
            </div>
        @endforeach
    </div>    
@endsection
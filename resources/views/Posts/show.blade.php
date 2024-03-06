@extends ('layouts/app')

@section('title', 'Post')

@section('content')
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
                <a href="#top">back to top</a>
            </div>
        @endforeach
    </div>    
@endsection
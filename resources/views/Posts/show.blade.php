@extends ('layouts/app')

@section('title', 'Post')

@section('content')
    <div class="post-main-box">
        <article class="article-full">
            <h1>{{ $post->title }}</h1>
            <div>By {{ $post->user->name }} | {{ $post->published_at->format('F j, Y') }}</div>
            <div>{{ $post->body }}</div>
        </article>
        
        <span id="top"></span>
        @auth
            @include('posts._comment-form')
        @else
            <p><a href="{{ route('login.create') }}">Log in here </a>to leave a comment.</p>
        @endauth
        
        @foreach ($post->comments as $comment )
            <div class="post-comment-box">
                {{ $comment->user->username }} {{ $comment->published_at->format('F j, Y \a\t g:i a') }}
                <br>
                <div id="{{ $comment->id }}">{{ $comment->body }}</div>
                <a href="#top">back to top</a>
            </div>
        @endforeach
    </div>    
@endsection
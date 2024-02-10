@extends ('layouts/app')

@section('title', 'Post')

@section('content')
    <div class="post-main-box">
        <article class="article-full">
            <h1>{{ $post->title }}</h1>
            <div>By {{ $post->user->name }} | {{ $post->published_at->format('F j, Y') }}</div>
            <div>{{ $post->body }}</div>
        </article>
    
        @include('posts._comment-form')
    
        @foreach ($post->comments as $comment )
            <div class="post-comment-box">
                {{ $comment->user->username }} {{ $comment->published_at->format('F j, Y \a\t g:i a') }}
                <br>
                {{ $comment->body }}
            </div>
        @endforeach
    </div>    
@endsection
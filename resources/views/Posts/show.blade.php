@extends ('layouts/app')

@section('title', 'Post')

@section('content')

    <p><h1>{{ $post->title }}</h1></p>
    <p>By {{ $post->user->name }} | {{ $post->published_at->format('F j, Y') }}</p>
    <p>{{ $post->body }}</p>

    @include('posts._comment-form')

    @foreach ($post->comments as $comment )
        <p>
            {{ $comment->user->username }} {{ $comment->published_at->format('F j, Y \a\t g:i a') }}
            <br>
            {{ $comment->body }}
        </p>
    @endforeach
    
@endsection
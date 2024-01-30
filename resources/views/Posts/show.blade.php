@extends ('layouts/app')

@section('title', 'Post')

@section('content')

        <p><h1>{{ $post->title }}</h1></p>
        <p>{{ $post->body }}</p>
        <p>by: {{ $post->user->first_name }} {{ $post->user->last_name }}</p>
        <p>{{ $post->published_at->format('F j, Y') }}</p>
    
@endsection
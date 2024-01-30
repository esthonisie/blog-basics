@extends ('layouts/app')

@section('title', 'Home')

@section('content')

    @foreach ($posts as $post)
        <p>
            <a href="{{ route('posts.show', ['post' => $post->id]) }}">
                <h2>{{ $post->title }}</h2>
            </a>
        </p>
        <p>{{ Str::limit($post->body, 200, ' (...)') }}</p>
        <p>by: {{ $post->user->first_name }} {{ $post->user->last_name }}</p>
        <p>{{ $post->published_at->format('F j, Y') }}</p>
    @endforeach   

@endsection
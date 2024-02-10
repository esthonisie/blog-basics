@extends ('layouts/app')

@section('title', 'Home')

@section('content')
    <div class="cards-main-container">
        @foreach ($posts as $post)
            <article class="card-container">
                <div class="card-image-container">
                    <img src="{{ $post->image_path }}">
                </div>
                <div class="card-text-container">
                    <div>
                        <div class="card-title">
                            <a href="{{ route('posts.show', ['post' => $post->id]) }}">
                                <h2>{{ $post->title }}</h2>
                            </a>    
                        </div>
                        <div class="card-body">{{ Str::limit($post->body, 200, ' [...]') }}</div>
                    </div>
                    <div>
                        <div class="card-name">{{ $post->user->name }}</div>
                        <time class="card-datetime">{{ $post->published_at->format('F j, Y') }}</time> 
                    </div>
                </div>
            </article>
        @endforeach
    </div>
@endsection
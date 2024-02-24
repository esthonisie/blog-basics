@extends ('layouts/app')

@section('title', 'My Posts')

@section('content')
    <div class="" style="background-color: bisque; font-size: 20px;">
        <a href="{{ route('posts.create') }}">+ New Post</a>
        @unless ($posts->isEmpty())
            @foreach ($posts as $post)
                <div style="margin-top: 25px;">
                    <div><a href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->title }}</a></div>
                    <div>{{ $post->published_at }}</div>
                    <a href="{{ route('posts.edit', ['post' => $post->id]) }}">edit</a>
                    <form 
                        action="{{ route('posts.delete', ['post' => $post->id]) }}" 
                        method="post"
                    >
                        @csrf
                        @method('DELETE')
                        <button class="btnPostDelete" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            @endforeach
            @else
            <p>No posts yet.</p>
        @endunless
    </div>
@endsection
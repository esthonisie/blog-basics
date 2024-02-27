@extends ('layouts/app')

@section('title', 'My Posts')

@section('content')
    <div class="" style="font-size: 1.8rem;">
        <a href="{{ route('posts.create') }}">+ New Post</a>
        <form action="{{ route('categories.store') }}" method="post">
            @csrf
    
            <label for="add-category">+ New Category</label>
            <br>
            <input type="text" name="name" id="add-category">
            <br>
    
            <button class="btnForm" type="submit">Send</button>
        </form>
        @unless ($posts->isEmpty())
            @foreach ($posts as $post)
                <div style="margin-top: 25px;">
                    <div><a href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->title }}</a></div>
                    <div style="color: beige">{{ $post->published_at }}</div>
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
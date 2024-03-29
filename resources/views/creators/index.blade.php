@extends ('layouts/app')

@section('title', 'My Posts')

@section('content')
    <div style="font-size: 1.8rem; margin: 20px;">
        <a href="{{ route('posts.create') }}">+ New Post</a>
        <form 
            class="form-basic"
            style="margin: 0;"
            action="{{ route('categories.store') }}" 
            method="post"
        >
            @csrf
    
            <label for="add-category">+ New Category</label>
            <br>
            <input 
                type="text" 
                name="name" 
                id="add-category"
            >
            <br>
    
            <button class="btnForm" type="submit">Send</button>
        </form>
        @unless ($posts->isEmpty())
            @foreach ($posts as $post)
                <div style="margin-top: 25px;">
                    <div>
                        @if ($post->is_premium == 1)
                            <a href="{{ route('premium.show', ['post' => $post->id]) }}">{{ $post->title }}</a>
                        @else 
                            <a href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->title }}</a>
                        @endif
                    </div>
                    <div style="color: beige">{{ $post->created_at }}</div>
                    @can('update', $post)
                        <a href="{{ route('posts.edit', ['post' => $post->id]) }}">edit</a>
                    @endcan
                    @can('delete', $post)
                        <form 
                            action="{{ route('posts.destroy', ['post' => $post->id]) }}" 
                            method="post"
                        >
                            @csrf
                            @method('DELETE')
                            <button 
                                class="btnPostDelete" 
                                onclick="return confirm('Are you sure?')">Delete
                            </button>
                        </form>
                    @endcan
                </div>
            @endforeach
            @else
            <p>No posts yet.</p>
        @endunless
    </div>
@endsection
@extends ('layouts/app')

@section('title', 'Edit Post')

@section('content')
    
    <form class="formCreate" action="{{ route('posts.update', ['post' => $post->id]) }}" method="post">
        @csrf
        @method('PATCH')

        <label for="title">Title:</label>
        <br>
        <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}">
        <br>

        <label for="contents">Contents:</label>
        <br>
        <textarea name="body" id="contents">{{ old('body', $post->body) }}</textarea>
        <br>
        
        <button class="btnForm" type="submit">Update</button>
    </form>
  
@endsection
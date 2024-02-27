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

        @error('title')
            <p class="formError">{{ $message }}</p>
        @enderror
        <br>

        <label for="contents">Contents:</label>
        <br>
        <textarea name="body" id="contents">{{ old('body', $post->body) }}</textarea>
        <br>

        @error('body')
            <p class="formError">{{ $message }}</p>
        @enderror
        <br>

        @foreach ($categories as $category)
            <input 
                type="checkbox" 
                id="{{ $category->name }}" 
                name="category_id[]" 
                value="{{ $category->id }}" 
                @checked(in_array($category->id, old('category_id', 
                $post->categories->pluck('id')->toArray())))
            >
            <label for="{{ $category->name }}">{{ $category->name }}</label>
            <br>
        @endforeach

        @error('category_id')
            <p class="formError">{{ $message }}</p>
        @enderror
        <br>
        
        <button class="btnForm" type="submit">Update</button>
    </form>
  
@endsection
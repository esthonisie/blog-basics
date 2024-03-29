@extends ('layouts/app')

@section('title', 'Edit Post')

@section('content')
    
    <form 
        class="form-basic"
        action="{{ route('posts.update', ['post' => $post->id]) }}" 
        method="post" 
        enctype="multipart/form-data"
    >
        @csrf
        @method('PATCH')

        <label for="title">Title:</label>
        <br>
        <input 
            type="text" 
            name="title" 
            id="title" 
            value="{{ old('title', $post->title) }}"
        >
        <br>

        @error('title')
            <p class="form-error">{{ $message }}</p>
        @enderror
        <br>

        <label for="contents">Contents:</label>
        <br>
        <textarea 
            name="body" 
            id="contents"
        >{{ old('body', $post->body) }}</textarea>
        <br>

        @error('body')
            <p class="form-error">{{ $message }}</p>
        @enderror
        <br>

        <label for="image">Image:</label>
        <br>
        <input 
            type="file" 
            name="image_post" 
            id="image" 
            value="{{ old('image_post', $post->image_post) }}"
        >
        <br>
        <img src="{{ asset('storage/' . $post->image_post) }}" style="width: 255px;">

        @error('image_post')
            <p class="form-error">{{ $message }}</p>
        @enderror
       <br>

       <input 
            type="checkbox" 
            id="is_premium" 
            name="is_premium"
            value="1" 
            @checked($post->is_premium)
        >
            <label for="is_premium">Premium</label>
        <br>

        @error('is_premium')
            <p class="form-error">{{ $message }}</p>
        @enderror
       <br>

        @foreach ($categories as $category)
            <input 
                type="checkbox" 
                id="{{ $category->name }}" 
                name="chosen_categories[]" 
                value="{{ $category->id }}" 
                @checked(in_array($category->id, old('chosen_categories', 
                $post->categories->pluck('id')->toArray())))
            >
            <label for="{{ $category->name }}">{{ $category->name }}</label>
            <br>
        @endforeach

        @error('chosen_categories')
            <p class="form-error">{{ $message }}</p>
        @enderror
        <br>
        
        <button 
            type="submit">Update
        </button>
    </form>
  
@endsection
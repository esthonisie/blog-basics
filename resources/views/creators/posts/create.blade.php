@extends ('layouts/app')

@section('title', 'Publish Post')

@section('content')
    <form 
        class="form-basic"
        action="{{ route('posts.store') }}" 
        method="post" 
        enctype="multipart/form-data"
    >
        @csrf

        <label for="title">Title:</label>
        <br>
        <input 
            type="text" 
            name="title" 
            id="title" 
            value="{{ old('title') }}"
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
        >{{ old('body') }}</textarea>
        <br>

        @error('body')
            <p class="form-error">{{ $message }}</p>
        @enderror
       <br>

       <label for="image">Image Upload:</label>
        <br>
        <input 
            type="file" 
            name="image_post" 
            id="image"
        >
        <br>

        @error('image_post')
            <p class="form-error">{{ $message }}</p>
        @enderror
       <br>

       <input 
            type="checkbox" 
            id="is_premium" 
            name="is_premium"
            value="1" 
            {{ old('is_premium') == 1 ? 'checked' : '' }}
        >
            <label for="is_premium">Premium</label>
        <br>

        @error('is_premium')
            <p class="form-error">{{ $message }}</p>
        @enderror
       <br>

       <p>Add a maximum of 3 Categories:</p>
       @foreach ($categories as $category)
            <input 
                type="checkbox" 
                id="{{ $category->name }}" 
                name="chosen_categories[]" 
                @checked(in_array($category->id, old('chosen_categories', [])))
                value="{{ $category->id }}"
            >
            <label for="{{ $category->name }}">{{ $category->name }}</label>
            <br>
        @endforeach

        @error('chosen_categories')
            <p class="form-error">{{ $message }}</p>
        @enderror
        <br>

        <button 
            type="submit">Publish
        </button>
    </form>
  
@endsection

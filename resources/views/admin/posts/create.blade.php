@extends ('layouts/app')

@section('title', 'Publish Post')

@section('content')
    
    <form action="{{ route('posts.store') }}" method="post">
        @csrf

        <label for="title">Title:</label>
        <br>
        <input type="text" name="title" id="title">
        <br>

        <label for="contents">Contents:</label>
        <br>
        <textarea name="body" id="contents"></textarea>
        <br>

        {{-- <br>
        @foreach ($categories as $category)
            <input type="checkbox" id="{{ $category->name }}" name="category_id[]" value="{{ $category->id }}">
            <label for="{{ $category->name }}">{{ $category->name }}</label>
            <br>
        @endforeach
        <br> --}}

        <button class="btnForm" type="submit">Publish</button>
    </form>
  
@endsection

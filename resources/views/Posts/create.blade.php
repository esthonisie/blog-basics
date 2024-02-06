@extends ('layouts/app')

@section('title', 'Publish Post')

@section('content')
    
    <form class="formCreate" action="{{ route('posts.store') }}" method="post">
        @csrf

        <label for="title">Title:</label>
        <br>
        <input type="text" name="title" id="title">
        <br>

        <label for="contents">Contents:</label>
        <br>
        <textarea name="body" id="contents"></textarea>
        <br>
        
        <input type="hidden" name="user_id" value="2">
        <input type="hidden" name="published_at" value="{{ $current }}">

        <button class="btnForm" type="submit">Publish</button>
    </form>
  
@endsection
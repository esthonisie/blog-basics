@extends ('layouts/app')

@section('title', 'Post')

@section('content')
    @if ($post->is_premium === 1 && !in_array(auth()->user()?->role_id, [1, 2, 3])) 
        <p style="font-size: 1.8rem; color:#fff6ec; margin:20px;">
            TODO: proper error handling
        </p>
    @else
        @include('partials._post-show')
    @endif
@endsection
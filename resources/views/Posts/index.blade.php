@extends ('layouts/app')

@section('title', 'Home')

@section('content')
    <div class="posts-main-container">
        @include('partials._sidebar')
        <div class="paginate-cards-container">
            <div class="cards-main-container">
                @include('partials._card-post')
            </div>
            <div class="paginate-index">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
@extends ('layouts/app')

@section('title', 'Home')

@section('content')
    <div class="posts-main-container">
        <div class="paginate-cards-container">
            <div class="cards-main-container">
                @include('partials._card-post')
            </div>
            <div class="paginate-index">
                {{ $posts->links() }}
            </div>
        </div>
        @include('partials._sidebar-search')
    </div>
@endsection
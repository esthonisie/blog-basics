@extends ('layouts/app')

@section('title', 'Premium')

@section('content')
    <div class="paginate-cards-container">
        <div class="cards-main-container">
            @include('partials._card-post')
        </div>
        <div class="paginate-index">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
@extends ('layouts/app')

@section('title', 'Category')

@section('content')
    <div class="paginate-cards-container">
        <div class="cards-main-container">
            @include('partials._card-post')
        </div>
    </div>
@endsection
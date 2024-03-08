@extends ('layouts/app')

@section('title', 'Premium Info')

@section('content')
    <div style="display: flex; flex-direction:column;">
        <p style="font-size: 1.8rem; color:#fff6ec; margin:20px;">
            TODO: a page about all the benefits of a premium account
        </p>
        <p style="font-size: 1.8rem; color:#fff6ec; margin:20px;">
            TODO: a -premium redirect- button for guests and a -premium redirect- button for subscriber with free account
        </p>
        @auth
            <a href="{{ route('register.edit') }}">
                <button style="width: fit-content; padding:4px; margin:20px;">
                    redirect to premium payment page button
                </button>
            </a>
        @else
            <a href="{{ route('register.create') }}">
                <button style="width: fit-content; padding:4px; margin:20px;">
                    redirect to register page button
                </button>
            </a>
        @endauth
    </div>
@endsection
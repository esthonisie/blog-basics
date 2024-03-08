@extends ('layouts/app')

@section('title', 'Premium Payment')

@section('content')
    <form action="{{ route('register.update') }}" method="post">
        @csrf
        @method('PATCH')
        <p>TODO: some text about the payment system</p>
        <button type="submit">a payment button</button>
    </form>
@endsection
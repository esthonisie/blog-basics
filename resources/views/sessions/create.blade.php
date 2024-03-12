@extends ('layouts/app')

@section('title', 'Log in')

@section('content')
    
    <form class="form-basic" action="/login" method="post">
        @csrf

        <label for="email">Email:</label>
        <br>
        <input type="text" name="email" id="email" value="{{ old('email') }}" required>
        <br>

        @error('email')
            <p class="formError">{{ $message }}</p>
        @enderror

        <label for="password">Password:</label>
        <br>
        <input type="password" name="password" id="password" required>
        <br>

        @error('password')
            <p class="formError">{{ $message }}</p>
        @enderror

        <button type="submit">Log In</button>
    </form>
  
@endsection
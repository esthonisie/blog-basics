@extends ('layouts/app')

@section('title', 'Register')

@section('content')
    
    <form class="form-basic" action="{{ route('register.store') }}" method="post">
        @csrf
       
        <p>TODO: a basic summary -table/list?- about the benefits of the free and the paid subscription</p>
        
        <br>
        <input type="radio" id="free" name="membership" value="free" checked>
        <label for="free">FREE</label>
        <br>
        <input type="radio" id="premium" name="membership" value="premium">
        <label for="premium">PREMIUM</label>
        <br>

        @error('role_id')
            <p class="formError">{{ $message }}</p>
        @enderror
        <br>

        <label for="first_name">First Name:</label>
        <br>
        <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" required>
        <br>

        @error('first_name')
            <p class="formError">{{ $message }}</p>
        @enderror

        <label for="last_name">Last Name:</label>
        <br>
        <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" required>
        <br>

        @error('last_name')
            <p class="formError">{{ $message }}</p>
        @enderror

        <label for="username">Username:</label>
        <br>
        <input type="text" name="username" id="username" value="{{ old('username') }}" required>
        <br>

        @error('username')
            <p class="formError">{{ $message }}</p>
        @enderror

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

        <button type="submit">Sign Up</button>
    </form>
  
@endsection
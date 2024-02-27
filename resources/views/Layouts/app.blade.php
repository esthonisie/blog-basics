<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A Blog About Something | @yield('title', 'Home Page')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:wght@400;500;700&display=swap" rel="stylesheet"> 
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/posts-index.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/posts-show.css') }}" rel="stylesheet" />
</head>
<body>
    <div class="blog-container">
        <header class="header-main">
            <div class="blog-title">
                <div>A BLOG ABOUT</div> 
                <div>SOMETHING</div>
            </div>
            <div class="blog-title-black"></div>
        </header>
        <nav class="nav-header">
            <ul class="nav-header-home">
                <li><a href="{{ route('posts.index') }}">HOME</a></li>
                <li><a href="#">ABOUT US</a></li>
            </ul>
            <ul class="nav-header-login">
                @auth
                    @if (auth()->user()->role_id === 1 || auth()->user()->role_id === 2) {
                            <li><a href="{{ route('dashboard.index') }}">DASHBOARD</a></li>
                        }
                    @endif   
                @endauth
                <li>
                    @auth
                        <span class="welcome">welcome, {{ auth()->user()->first_name }}</span>
                    @else
                        <a href="{{ route('register.create') }}">REGISTER</a>
                    @endauth
                </li>
                <li>
                    @auth
                        <form method="post" action="/logout">
                            @csrf
                            <button id="btn-logout" type="submit">LOG OUT</button>
                        </form>
                    @else
                        <a href="{{ route('login.create') }}">LOGIN</a>
                    @endauth
                </li>
            </ul>
        </nav>
        <main>
            @yield('content')
            {{-- TODO: vervangen door components, eerst nog lezen hoe... --}}
            @use('App\Models\Category')
            @include('partials/sidebar', ['categories' => Category::has('posts')
            ->withCount('posts')->orderByDesc('posts_count')->get()])
        </main>
        <footer></footer>
    </div>
    @if (session()->has('success'))
        <div class="flash-message">
            <p>{{ session('success') }}</p>
        </div>
    @endif
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog | @yield('title', 'Home Page')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:wght@400;500;700&display=swap" rel="stylesheet"> 
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/posts-index.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/posts-show.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/posts-create.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/posts-comments.css') }}" rel="stylesheet" />
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
                @auth
                    <li><a href="{{ route('posts.create') }}">NEW POST</a></li>
                @endauth
            </ul>
            <ul class="nav-header-login">
                <li>
                    @auth
                        <span class="welcome">welcome {{ auth()->user()->username }}</span>
                    @else
                        <a href="{{ route('register.create') }}">REGISTER</a>
                    @endauth
                </li>
                <li>
                    @auth
                        <form method="post" action="/logout">
                            @csrf
                            <button type="submit">LOG OUT</button>
                        </form>
                    @else
                        <a href="{{ route('login.create') }}">LOGIN</a>
                    @endauth
                </li>
            </ul>
        </nav>
        <main>
            @yield('content')
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog | @yield('title', 'Home Page')</title>
</head>
<body>
    <div class="wrapper-main">
        <nav>
            <ul>
                <li><a href="{{ route('posts.index') }}">Home</a></li>
                <li><a href="{{ route('posts.create') }}">New Post</a></li>
            </ul>
        </nav>
        @yield('content')
    </div>
</body>
</html>
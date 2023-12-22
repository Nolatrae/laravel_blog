<!DOCTYPE html>
<html>
<head>
    <title>Your Laravel App</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
</head>
<body>
    <div>
        <h1>Your Laravel App</h1>
        <nav>
            <ul>
                <li><a href="{{ route('posts.index') }}">Posts</a></li>
                <li><a href="{{ route('comments.index') }}">Comments</a></li>
                <li><a href="{{ route('categories.index') }}">Categories</a></li>
            </ul>
        </nav>
    </div>

    <div>
        @yield('content')
    </div>
</body>
</html>

@section('content')
    <h1>Posts</h1>
    <form action="{{ route('posts.index') }}" method="GET">
        <input type="text" name="searchTerm" placeholder="Enter search term">
        <button type="submit">Search</button>
    </form>

    @foreach($posts as $post)
        <div>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <p>Categories: {{ $post->categories->pluck('name')->implode(', ') }}</p>
            <p>Comments:
                <ul>
                    @foreach($post->comments as $comment)
                        <li>{{ $comment->content }}</li>
                    @endforeach
                </ul>
            </p>
            <p><a href="{{ route('posts.show', $post->id) }}">View</a></p>
            <p><a href="{{ route('posts.edit', $post->id) }}">Edit</a></p>
            <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    @endforeach
@endsection
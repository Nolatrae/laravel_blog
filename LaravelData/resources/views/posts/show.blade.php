<h1>{{ $post->title }}</h1>
<p>{{ $post->content }}</p>

<p>Categories: {{ $post->categories->pluck('name')->implode(', ') }}</p>
<p>Comments:
    <ul>
        @foreach($post->comments as $comment)
            <li>{{ $comment->content }}</li>
        @endforeach
    </ul>
</p>
<p><a href="{{ route('posts.edit', $post->id) }}">Edit</a></p>

<h1>Comment</h1>
<p>{{ $comment->content }}</p>
<p>Post: {{ $comment->post->title }}</p>
<p><a href="{{ route('comments.edit', $comment->id) }}">Edit</a></p>

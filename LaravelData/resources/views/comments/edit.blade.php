<form method="POST" action="{{ route('comments.update', $comment->id) }}">
    @csrf
    @method('PUT')
    <label for="content">Content:</label>
    <textarea name="content" required>{{ $comment->content }}</textarea>
    <label for="post_id">Post:</label>
    <select name="post_id">
        @foreach($posts as $post)
            <option value="{{ $post->id }}" @if($comment->post_id == $post->id) selected @endif>{{ $post->title }}</option>
        @endforeach
    </select>
    <button type="submit">Update Comment</button>
</form>

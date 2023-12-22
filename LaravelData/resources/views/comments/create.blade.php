<form method="POST" action="{{ route('comments.store') }}">
    @csrf
    <label for="content">Content:</label>
    <textarea name="content" required></textarea>
    <label for="post_id">Post:</label>
    <select name="post_id">
        @foreach($posts as $post)
            <option value="{{ $post->id }}">{{ $post->title }}</option>
        @endforeach
    </select>
    <button type="submit">Create Comment</button>
</form>

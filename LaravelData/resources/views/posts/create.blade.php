<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <label for="title">Title:</label>
    <input type="text" name="title" required>
    <label for="content">Content:</label>
    <textarea name="content" required></textarea>
    <label for="categories">Categories:</label>
    <select name="categories[]" multiple>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <button type="submit">Create Post</button>
</form>

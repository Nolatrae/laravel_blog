<form method="POST" action="{{ route('posts.update', $post->id) }}">
    @csrf
    @method('PUT')
    <label for="title">Title:</label>
    <input type="text" name="title" value="{{ $post->title }}" required>
    <label for="content">Content:</label>
    <textarea name="content" required>{{ $post->content }}</textarea>
    <label for="categories">Categories:</label>
    <select name="categories[]" multiple>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" @if($post->categories->contains($category->id)) selected @endif>{{ $category->name }}</option>
        @endforeach
    </select>
    <button type="submit">Update Post</button>
</form>

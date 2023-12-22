<!-- resources/views/posts/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>

    <div class="mt-4">
        <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Edit Post</a>

        <form action="{{ route('posts.destroy', $post) }}" method="post" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete Post</button>
        </form>
    </div>

    <h2 class="mt-4">Comments</h2>
    <ul class="list-group">
        @forelse ($post->comments as $comment)
            <li class="list-group-item">{{ $comment->user_name }}: {{ $comment->comment }}</li>
        @empty
            <li class="list-group-item">No comments yet.</li>
        @endforelse
    </ul>

    <form action="{{ route('comments.store', $post) }}" method="post" class="mt-4">
        @csrf
        <div class="form-group">
            <label for="user_name">Your Name:</label>
            <input type="text" name="user_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="comment">Your Comment:</label>
            <textarea name="comment" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Comment</button>
    </form>
@endsection

<!-- resources/views/posts/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>

    <form method="post" action="{{ route('posts.update', $post) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea name="content" class="form-control" required>{{ $post->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="publish_at">Publish at:</label>
            <input type="datetime-local" name="publish_at" class="form-control" value="{{ isset($post) ? \Carbon\Carbon::parse($post->publish_at)->format('Y-m-d\TH:i') : '' }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
@endsection

@extends('layouts.app')

@section('content')
    <h1>Create a New Post</h1>

    <form method="post" action="{{ route('posts.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea name="content" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="publish_at">Publish at:</label>
            <input type="datetime-local" name="publish_at" class="form-control" value="{{ isset($post) ? \Carbon\Carbon::parse($post->publish_at)->format('Y-m-d\TH:i') : '' }}">
        </div>
        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
@endsection

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
        <label for="publish_now">Publish:</label>
        <select name="publish_now" id="publish_now" class="form-control">
            <option value="false">Later</option>
            <option value="true">Now</option>
        </select>
    </div>

    <div class="form-group" id="publish_at_container">
        <label for="publish_at">Publish At:</label>
        <input type="datetime-local" name="publish_at" id="publish_at" class="form-control">
    </div>
        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>

    <script>
        document.getElementById('publish_now').addEventListener('change', function() {
            const publishAtContainer = document.getElementById('publish_at_container');
            publishAtContainer.style.display = this.value === 'false' ? 'block' : 'none';
        });
    </script>
@endsection

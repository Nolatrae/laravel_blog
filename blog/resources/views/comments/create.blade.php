@extends('layouts.app')

@section('content')
    <h1>Add Comment</h1>

    <form action="{{ route('comments.store', $post) }}" method="post">
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

@extends('layouts.app')

@section('content')
    <h1>Comments</h1>
    @foreach($comments as $comment)
        <div>
            <p>{{ $comment->content }}</p>
            <p>Post: {{ $comment->post->title }}</p>
            <p><a href="{{ route('comments.show', $comment->id) }}">View</a></p>
            <p><a href="{{ route('comments.edit', $comment->id) }}">Edit</a></p>
            <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    @endforeach
@endsection
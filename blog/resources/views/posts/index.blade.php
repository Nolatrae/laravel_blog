@extends('layouts.app')

@section('content')
    <h1>Blog Posts</h1>
    
    @foreach ($posts as $post)
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->content }}</p>
                <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">Read More</a>
            </div>
        </div>
    @endforeach
@endsection
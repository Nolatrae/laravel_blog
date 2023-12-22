@extends('layouts.app')

@section('content')
    <h1>Categories</h1>
    @foreach($categories as $category)
        <div>
            <h2>{{ $category->name }}</h2>
            <p>Posts:
                <ul>
                    @foreach($category->posts as $post)
                        <li>{{ $post->title }}</li>
                    @endforeach
                </ul>
            </p>
            <p><a href="{{ route('categories.show', $category->id) }}">View</a></p>
            <p><a href="{{ route('categories.edit', $category->id) }}">Edit</a></p>
            <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    @endforeach
@endsection
<h1>{{ $category->name }}</h1>
<p>Posts:
    <ul>
        @foreach($category->posts as $post)
            <li>{{ $post->title }}</li>
        @endforeach
    </ul>
</p>
<p><a href="{{ route('categories.edit', $category->id) }}">Edit</a></p>

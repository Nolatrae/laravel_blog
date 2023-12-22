<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('searchTerm');

        $posts = Post::when($searchTerm, function ($query, $searchTerm) {
            return $query->titleContains($searchTerm);
        })->active()->with('comments', 'categories')->get();

        return PostResource::collection($posts);
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'categories' => 'array',
        ]);

        $post = Post::create($request->all());
        $post->categories()->attach($request->input('categories'));

        return response()->json(['message' => 'Post created successfully'], 201);
    }

    public function show($id)
    {
        $post = Post::with('comments', 'categories')->find($id);
        return new PostResource($post);
    }

    public function edit($id)
    {
        $post = Post::with('categories')->find($id);
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'categories' => 'array',
        ]);

        $post = Post::find($id);
        $post->update($request->all());
        $post->categories()->sync($request->input('categories'));

        return response()->json(['message' => 'Post updated successfully'], 200);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return response()->json(['message' => 'Post deleted successfully'], 200);
    }

    public function activePosts()
    {
        $posts = Post::active()->get();
        return PostResource::collection($posts);
    }

    public function searchPosts($searchTerm)
    {
        $posts = Post::titleContains($searchTerm)->active()->with('comments', 'categories')->get();
        return PostResource::collection($posts);
    }
}

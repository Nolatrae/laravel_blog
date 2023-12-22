<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'publish_at' => 'nullable|date_format:Y-m-d\TH:i',
        ]);

        $post = new Post([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'publish_at' => $request->input('publish_now') ? now() : $request->input('publish_at'),
            'publish_now' => $request->input('publish_now'),
        ]);

        $post->save();

        event(new PostPublished($post));

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }
    
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'publish_at' => 'nullable|date',
        ]);

        $postData = $request->all();
        $postData['published'] = $this->shouldPublishNow($request->publish_at);

        info("Updated post data: " . json_encode($postData));

        $post->update($postData);

        if ($post->published && $post->wasChanged('published')) {
            event(new PostPublished($post));
        }

        return redirect()->route('posts.show', $post)->with('success', 'Post updated successfully!');
    }
    
    public function destroy(Post $post)
    {
        $post->delete();
    
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }

    protected function shouldPublishNow($publishAt)
    {
        return $publishAt ? Carbon::now()->gte(Carbon::parse($publishAt)) : true;
    }
}

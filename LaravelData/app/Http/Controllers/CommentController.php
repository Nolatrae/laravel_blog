<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('post')->get();
        return view('comments.index', compact('comments'));
    }

    public function create()
    {
        $posts = Post::all();
        return view('comments.create', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        Comment::create($request->all());

        return redirect()->route('comments.index');
    }

    public function show($id)
    {
        $comment = Comment::with('post')->find($id);
        return view('comments.show', compact('comment'));
    }

    public function edit($id)
    {
        $comment = Comment::find($id);
        $posts = Post::all();
        return view('comments.edit', compact('comment', 'posts'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment = Comment::find($id);
        $comment->update($request->all());

        return redirect()->route('comments.index');
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect()->route('comments.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'user_name' => 'required',
            'comment' => 'required',
        ]);

        $post->comments()->create($request->all());

        return redirect()->route('posts.show', $post)->with('success', 'Comment added successfully!');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }
}

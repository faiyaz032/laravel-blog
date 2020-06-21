<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $post)
    {
        $validateComment = $request->validate([
            'comment' => 'required'
        ]);

        $comment = new Comment();
        $comment->post_id = $post;
        $comment->user_id = auth()->id();
        $comment->comment = $request->input('comment');
        $comment->save();

        return redirect()->back();
    }
}

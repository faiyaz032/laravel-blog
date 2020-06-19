<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('backend.post.index', compact('posts'));
    }

    public function myPost()
    {
        $posts = Post::where('user_id', auth()->id())->get();
        $this->authorize('myPost', Post::class);
        return view('backend.post.myPost', compact('posts'));
    }

    public function destroy(Post $post)
    {
        $this->authorize('Can Delete', $post);
        $post->delete();
        return redirect()->back();

    }
}

<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->get();
        return view('backend.post.index', compact('posts'));
    }

    public function myPost()
    {
        $posts = Post::where('user_id', auth()->id())->orderBy('id', 'DESC')->get();
        $this->authorize('myPost', Post::class);
        return view('backend.post.myPost', compact('posts'));
    }

    public function show(Post $post)
    {
        $comments = Comment::orderBy('id', 'DESC')->get();
        return view('backend.post.show', compact('post', 'comments'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('backend.post.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        $post = new Post(\request(['title', 'body']));
        $post->user_id = auth()->id();
        $post->save();
        $post->categories()->syncWithoutDetaching(\request('category'));
        return redirect(route('admin.all.posts'));
    }


    public function destroy(Post $post)
    {
        $this->authorize('Can Delete', $post);
        $post->delete();
        return redirect()->back();

    }
}

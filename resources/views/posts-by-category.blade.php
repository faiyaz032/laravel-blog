@extends('layouts.frontend.app')
@section('content')

    <h1 class="my-4">Recents Blogs

    </h1>

    <!-- Blog Post -->
    @foreach($posts as $post)
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">{{ $post->title }}</h2>
                <p class="card-text">{{ \Illuminate\Support\Str::limit($post->body, 50) }}</p>
                <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
                Posted on {{ $post->created_at->format('d M Y') }} by
                <a href="#">{{ $post->user->name }}</a>
            </div>
        </div>
    @endforeach

    <!-- Pagination -->
    <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
        </li>
        <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
        </li>
    </ul>

@endsection

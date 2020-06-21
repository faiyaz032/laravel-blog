@extends('layouts.frontend.app')
@push('css')

    <link href="{{ asset('frontend/css/blog-post.css') }}" rel="stylesheet">
@endpush
@section('content')
        <!-- Title -->
        <h1 class="mt-4">{{ $post->title }}</h1>

        <!-- Author -->
        <p class="lead">
            by
            <a href="#">{{ $post->user->name }}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on <a href="#">{{ $post->created_at->format('d M Y') }}</a></p>

        <hr>

        <!-- Post Content -->
        <p class="lead">{{ $post->body }}</p>


        <hr>

        <!-- Comments Form -->
        @auth
            <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                    <form action="{{ route('comment.store', $post->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea name="comment" class="form-control" rows="2"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        @endauth

        <!-- Single Comment -->
        @foreach($post->comments as $comment)
        <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
                <h5 class="mt-0">{{ $comment->user->name }}</h5>
                {{ $comment->comment }}
            </div>
        </div>
         @endforeach
@endsection

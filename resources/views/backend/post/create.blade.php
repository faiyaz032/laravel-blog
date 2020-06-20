@extends('layouts.backend.app')
@push('css')

@endpush
@section('content')
<div class="header">
    <div class="display-4">
        Create New Post
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                    <label for="formGroupExampleInput">Post Title</label>
                    <input type="text" class="form-control" name="title" id="formGroupExampleInput" placeholder="Example input">
                </div>
               <div class="">
                   <div class="form-group">

                       <label for="category">Category</label>
                       <select class="form-control" name="category" id="category">
                           @foreach($categories as $category)
                               <option value="{{ $category->id }}">{{ $category->name }}</option>
                           @endforeach
                       </select>

                   </div>
               </div>
                <div class="form-group">
                    <label for="body">Describe your post</label>
                    <textarea name="body" id="body" cols="30" class="form-control" rows="8"></textarea>
                </div>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
@push('js')

@endpush

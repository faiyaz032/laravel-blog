@extends('layouts.backend.app')
@push('css')

@endpush
@section('content')
    <div class="header">
        <div class="display-4">
            Create New Category
        </div>
        <div class="row">
            <div class="col-md-3">
                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="formGroupExampleInput">Category Name</label>
                        <input type="text" class="form-control" name="name" id="formGroupExampleInput" value="{{ $category->name }}">
                    </div>
                    <button class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')

@endpush

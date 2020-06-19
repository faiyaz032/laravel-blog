@extends('layouts.backend.app')
@push('css')
    <link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Posts</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>

                       @foreach($posts as $post)
                           @can('viewAny', $post)
                               <tr>
                                   <td>{{ $post->title }}</td>

                                   <td>{{ \Illuminate\Support\Str::limit($post->body, 50) }}</td>
                                   <td>
                                       @can('Can Delete')
                                           <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                               @csrf
                                               @method('delete')
                                               <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                           </form>
                                       @endcan
                                   </td>
                               </tr>
                           @endcan
                       @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('backend/js/demo/datatables-demo.js') }}"></script>
@endpush

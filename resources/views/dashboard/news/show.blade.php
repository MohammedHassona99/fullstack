@extends('layouts.baseDashboard')
@section('dashboardContent')
    <!-- Page Heading -->
    <div class="mb-4">
        <h1 class="h3 mb-0 text-gray-800">All News </h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        @if (Session::has('success'))
            <div class="alert alert-primary" role="alert">
                {{ Sesstion::get('success') }}
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{ Sesstion::get('error') }}
            </div>
        @endif
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>The Tilte</th>
                            <th>The Author</th>
                            <th>The Category</th>
                            <th>Created At</th>
                            <th>Status</th>
                            <th>Edit / Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr id="{{ $post->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ \App\Models\User::where('id', $post->author)->get()->first()->name }}</td>
                                <td>{{ \App\Models\Category::where('id', $post->category)->get()->first()->title }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>
                                    @if ($post->status === 1)
                                        <label for="" class="text-white p-1 bg-success">posted</label>
                                    @else
                                        <label for="" class="text-white p-1 bg-danger">draft</label>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('edit_news', $post->id) }}" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="button" onclick="delete_post({{ $post->id }})"
                                        class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <a href="?active={{ $post->status }}&post_id={{ $post->id }}"
                                        class="btn btn-success">
                                        @if ($post->status === 1)
                                            <i class="fas fa-toggle-off"></i>
                                        @else
                                            <i class="fas fa-toggle-on"></i>
                                        @endif
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            {!! $posts->links() !!}
        </div>
    </div>


    <script>
        function delete_post(id) {
            let conf = confirm('Are You Sure To Delete This Post ?');

            if (conf === true) {
                $.ajax({
                    url: `/api/delete_post/${id}`,
                    type: "POST",
                    data: {},
                    success: function(e) {
                        $(`#${id}`).fadeOut();
                        console.log(e);
                    },
                    error: function() {
                        console.log("error");
                    }
                })
            }
        }
    </script>
@endsection

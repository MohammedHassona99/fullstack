@extends('layouts.baseDashboard')
@section('dashboardContent')
    <!-- Page Heading -->
    <div class="mb-4">
        <h1 class="h3 mb-0 text-gray-800">All Category </h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>The Tilte</th>
                            <th>The Author</th>
                            <th>The Categor</th>
                            <th>Count of Posts</th>
                            <th>Created At</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cats as $cat)
                            <tr id="{{ $cat->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $cat->title }}</td>
                                <td>{{ $cat->description }}</td>
                                <td>{{ \App\Models\User::where('id', $cat->by_user)->get()->first()->name }}</td>
                                <td>{{ \App\Models\Post::where('category', $cat->id)->get()->count() }}</td>
                                <td>{{ $cat->created_at }}</td>
                                <td>
                                    <button type="button" onclick="deleteCat({{ $cat->id }})" alt="Delete"
                                        class="btn btn-danger"> <i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function deleteCat(cat_id) {
            let conf = confirm("Are You Sure To Delete ?");
            if (conf === true) {
                $.ajax({
                    url: `/api/delete_cat/${cat_id}`,
                    type: "POST",
                    data: {},
                    success: function() {
                        $(`#${cat_id}`).fadeOut();
                    },
                    error: function() {
                        console.log("Error");
                    }
                })
            }
        }
    </script>
@endsection

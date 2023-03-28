@extends('layouts.baseDashboard')
@section('dashboardContent')
    <!-- Page Heading -->
    <div class="mb-4">
        <h1 class="h3 mb-0 text-gray-800">All Courses </h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>description</th>
                            <th>Starting</th>
                            <th>Created At</th>
                            <th>Status</th>
                            <th>Edit / Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr id="{{ $course->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->description }}</td>
                                <td>{{ $course->course_date }}</td>
                                <td>{{ $course->created_at }}</td>
                                <td>
                                    @if ($course->status === 1)
                                        <label for="" class="text-white p-1 bg-success">posted</label>
                                    @else
                                        <label for="" class="text-white p-1 bg-danger">draft</label>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('edit_course', $course->id) }}" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="button" onclick="delete_course({{ $course->id }})"
                                        class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <a href="?active={{ $course->status }}&post_id={{ $course->id }}"
                                        class="btn btn-success">
                                        @if ($course->status === 1)
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
    </div>
    <script>
        function delete_course(id) {
            let conf = confirm('Are You Sure To Delete This Course ?');

            if (conf === true) {
                $.ajax({
                    url: `/api/delete_course/${id}`,
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

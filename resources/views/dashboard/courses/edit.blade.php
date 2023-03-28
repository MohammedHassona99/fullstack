@extends('layouts.baseDashboard')
@section('dashboardContent')
    <!-- Page Heading -->
    <div class="mb-4">
        <h1 class="h3 mb-0 fw-bold">Edit Courses</h1>
    </div>
    <!-- Content Row -->
    <form action="{{ route('edit_course', $courses->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <label class="form-label" for="firstname">Name</label>
                <input class="form-control" type="text" value="{{ $courses->name }}" name="name" id="title">
            </div>
            <div class="col-md-8">
                <label class="form-label" for="description">Description</label>
                <textarea class="form-control" name="description" id="description" style="resize: none; min-height: 180px">{{ $courses->description }}</textarea>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <label class="form-label" for="date_course">Date Of Course</label>
                        <input class="form-control" type="date" value="{{ $courses->course_date }}" name="course_date"
                            id="date_course">
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <lable class="form-label">Add Phote</lable>
                            <input class="form-control" name="course_img" type="file">
                        </div>

                        @if ($courses->image != null)
                            <img src="/{{ \App\Models\Attachment::where('id', $courses->image)->get()->first()->path }}"
                                class="img-responsive img-fluid" alt="">
                        @endif
                    </div>
                </div>
            </div>


            <div class="col-md-12 mt-4">
                <input class="btn btn-block btn-primary" type="submit" value="Add a new Course">
            </div>
        </div>
    </form>
    <hr>
@endsection

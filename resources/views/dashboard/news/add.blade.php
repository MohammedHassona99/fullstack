@extends('layouts.baseDashboard')
@section('dashboardContent')
    <!-- Page Heading -->
    <div class="mb-4">
        <h1 class="h3 mb-0 fw-bold">Add News</h1>
    </div>

    <!-- Content Row -->

    <form action="{{ route('add_news') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <label class="form-label" for="firstname">Title</label>
                <input class="form-control" type="text" name="title" id="title">
                @error('title')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-8">
                <label class="form-label" for="description">Description</label>
                <textarea class="form-control" name="content" id="description" style="resize: none; min-height: 180px"></textarea>
                @error('description')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="category" class="form-label">Catecory</label>
                    <select class="form-control" name="category" id="category">
                        @foreach ($cats as $cat)
                            <option value="{{ $cat->id }}"> {{ $cat->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <lable class="form-label">Add Phote</lable>
                    <input class="form-control" name="post_img" type="file">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-check">
                    <input class="form-check-input" name="is_slider" type="checkbox" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Add To Slider
                    </label>
                </div>
            </div>
            <div class="col-md-12 mt-4">
                <input class="btn btn-block btn-primary" type="submit" value="Add new">
            </div>
        </div>
    </form>
@endsection

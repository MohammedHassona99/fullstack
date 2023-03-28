@extends('layouts.baseDashboard')
@section('dashboardContent')
    <!-- Page Heading -->
    <div class="mb-4">
        <h1 class="h3 mb-0 fw-bold">Edit News</h1>
    </div>
    <!-- Content Row -->
    <form action="{{ route('edit_news', $news->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <label class="form-label" for="firstname">Title</label>
                <input value="{{ $news->title }}" class="form-control" type="text" name="title" id="title">
            </div>
            <div class="col-md-8">
                <label class="form-label" for="description">Description</label>
                <textarea class="form-control" name="content" id="description" style="resize: none; min-height: 180px">{{ $news->description }}</textarea>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="category" class="form-label">Catecory</label>
                    <select class="form-control" name="category" id="category">
                        @foreach ($cats as $cat)
                            <option @if ($news->category == $cat->id) selected @endif value="{{ $cat->id }}">
                                {{ $cat->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label" for="img-cat">Photo Category</label>
                    <input class="form-control form-control-lg" id="img-cat" type="file" name="post_img">
                </div>
                @if ($news->image != null)
                    <img src="/{{ \App\Models\Attachment::where('id', $news->image)->get()->first()->path }}"
                        class="img-fluid" alt="">
                @endif
            </div>
            <div class="col-md-12 mt-4">
                <input class="btn btn-block btn-primary" type="submit" value="Save">
            </div>
        </div>
    </form>
    <hr>
@endsection

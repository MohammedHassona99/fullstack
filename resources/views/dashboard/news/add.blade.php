@extends('layouts.baseDashboard')
@section('dashboardContent')
    <!-- Page Heading -->
    <div class="mb-4">
        <h1 class="h3 mb-0 fw-bold">Add News</h1>
    </div>

    <!-- Content Row -->

    <form action="{{-- route('add_news') --}}" method="post" id="formNew" {{-- enctype="multipart/form-data" --}}>
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
                <button id="add_new" class="btn btn-block btn-primary" type="button">Add
                    new</button>
            </div>
        </div>
    </form>
    <script>
        document.querySelector('#add_new').addEventListener('click', function add_news(e) {
            e.preventDefault();
            let formData = new FormData(document.querySelector('#formNew'));
            console.log(formData);
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: '{{ route('add_news_api') }}',
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                    if (data.status === true) {
                        alert(data.msg);
                    }
                },
                error: function(data) {

                }
            });
        });
    </script>
@endsection

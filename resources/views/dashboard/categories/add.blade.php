@extends('layouts.baseDashboard')
@section('dashboardContent')
    <!-- Page Heading -->
    <div class="mb-4">
        <h1 class="h3 mb-0 fw-bold">Add Category</h1>
    </div>
    <!-- Content Row -->
    <form action="{{ route('add_category') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="col-md-12">
                    <label class="form-label" for="name">Category Name</label>
                    <input class="form-control" type="text" name="name" id="category_name">
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="descriptio">Describe Category</label>
                    <textarea class="form-control" name="description" id="category_description" style="resize: none; min-height: 180px"></textarea>
                </div>
                <div class="col-md-12 mt-4">
                    <input class="btn btn-block btn-primary" type="button" value="Add Category" onclick="addCatToServer()">
                </div>
            </div>
            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-primary">
                                <td>#</td>
                                <td>The Category</td>
                                <td>The Description</td>
                                <td>Created At</td>
                            </tr>
                        </thead>
                        <tbody id="table">
                            @foreach ($cats as $cat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $cat->title }}</td>
                                    <td>{{ $cat->description }}</td>
                                    <td>{{ $cat->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="button" onclick="getData()" class="btn btn-warning btn-block">Refresh the table</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        function addCatToServer() {
            let cat_name = document.querySelector('#category_name').value;
            let cat_desc = document.querySelector('#category_description').value;
            if (cat_name === "" && cat_desc === "") {
                alert('Please Check The Fileds');
            } else {
                $.ajax({
                    url: "{{ route('add_category') }}",
                    type: "POST",
                    data: {
                        'name': cat_name,
                        'description': cat_desc
                    },
                    success: function(e) {
                        if (e.status === 1) {
                            let title = e.title;
                            let desc = e.description;
                            alert("Done All");
                            getData();
                        } else {
                            alert('Error')
                        }
                    },
                    error: function(e) {
                        alert('Error')
                    }
                })
            }
        }

        function getData() {
            let conf = confirm('Are You Sure Refrech this page ?');
            if (conf === true) {
                $.ajax({
                    url: '{{ route('get_cats_api') }}',
                    type: "POST",
                    data: {},
                    success: function(e) {
                        document.querySelector('#table').innerHTML = "";
                        for (let i = 0; i < e.length; i++) {
                            let id = e[i].id,
                                title = e[i].title,
                                desc = e[i].description,
                                created_at = e[i].created_at;
                            let tr =
                                `<tr><td>${id}</td> <td>${title}</td> <td>${desc}</td> <td>${created_at}</td></tr>`;
                            document.querySelector('#table').appendChild(tr);
                            console.log(tr);
                        }
                    }

                })
            }
        }
    </script>
@endsection

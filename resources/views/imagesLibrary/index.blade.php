@extends('layouts.baseDashboard')
@section('dashboardContent')
    <!-- Page Heading -->
    <div class="mb-4">
        <h1 class="h3 mb-0 fw-bold">Images Library</h1>
    </div>
    <div class="row">
        @foreach ($attaches as $attach)
            <div class="col-md-4">
                <img class="img-fluid" src="{{ asset($attach->path) }}" alt=""
                    title="by : {{ \App\Models\User::where('id', $attach->user_id)->get()->first()->name }}">
            </div>
        @endforeach
    </div>
@endsection

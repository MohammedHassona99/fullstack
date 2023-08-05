@extends('layouts.base')
@section('title', 'View All')
@section('MainContent')
    <!-- Start Contact Us -->
    <section class="contact py-5 bg-white">
        <div class="container">
            <h1>Show all Doctor</h1>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>title</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($doctor) && $doctor->count() > 0)
                            @foreach ($doctor as $doc)
                                <tr>
                                    <th>{{ $doc->id }}</th>
                                    <td>{{ $doc->name }}</td>
                                    <td>{{ $doc->title }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- End Contact Us -->
@endsection

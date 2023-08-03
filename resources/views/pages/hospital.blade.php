@extends('layouts.base')
@section('title', 'View All')
@section('MainContent')
    <!-- Start Contact Us -->
    <section class="contact py-5 bg-white">
        <div class="container">
            <h1>Show all</h1>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>address</th>
                            <th>operations</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($hospitals) && $hospitals->count() > 0)
                            @foreach ($hospitals as $hospital)
                                <tr>
                                    <th>{{ $hospital->id }}</th>
                                    <td> {{ $hospital->name }}</td>
                                    <td> {{ $hospital->address }}</td>
                                    <td><a href="{{ route('doctors', $hospital->id) }}" class="btn btn-success">show all
                                            Doctors</a></td>
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

@extends('layouts.base')
@section('title', 'View All Services')
@section('MainContent')
    <!-- Start Contact Us -->
    <section class="contact py-5 bg-white">
        <div class="container">
            <h1>Show all Doctor Services</h1>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($services) && $services->count() > 0)
                            @foreach ($services as $service)
                                <tr>
                                    <td>{{ $service->id }}</td>
                                    <td>{{ $service->name }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <form action="{{ route('saveServices') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="doctors" class="form-label">Doctors</label>
                            <select class="form-control" name="doctors" id="doctors">
                                @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->id }}"> {{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="services" class="form-label">Services</label>
                            <select class="form-control" name="services[]" id="services" multiple>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}"> {{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- End Contact Us -->
@endsection

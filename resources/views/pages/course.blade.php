@extends('layouts.base')
@section('title', 'Courses')
@section('MainContent')
    <!-- Start Contact Us -->
    <section class="contact py-5 bg-white">
        <div class="container">
            <div class="row">
                @foreach (\App\Models\Course::where('status', 1)->get()->take(3)->sortByDesc('id') as $item)
                    <div class="col-md-4 text-center">
                        <img
                            src="{{ asset(App\Models\Attachment::where('id', $item->image)->get()->first()->path) }}"class="img-fluid">
                        <h4 class="m-2">{{ $item->name }}</h4>
                        <span>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($item->course_date))->locale('ar_AR')->diffForHumans() }}</span>

                        <p>{{ Str::limit($item->description, 40, '...') }}</p>
                        <a class="text-decoration-none" href="{{ route('edit_course', $item->id) }}">...أقرا المزيد</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

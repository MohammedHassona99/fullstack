@extends('layouts.base')
@section('title', 'News')
@section('MainContent')

    <!-- Start SLider -->
    <section class="slider-gov">
        <div class="container-fluid">
            <div class="content d-flex justify-content-center text-white">
                <h2>الرئيسية > اخبارنا</h2>
            </div>
        </div>
    </section>
    <!-- End SLider -->
    <!-- Start Gov -->
    <section class="gov-ser py-5">
        <div class="container">
            <h2>خدمات الحكومة</h2>
            <div class="row">
                @foreach ($news as $new)
                    <div class="col-md-4 text-center">
                        <img src="{{ asset(App\Models\Attachment::where('id', $new->image)->get()->first()->path) }}"
                            width="200" height="100" class="img-fluid" alt="">
                        <h4 class="m-2">{{ $new->title }}</h4>
                        <span>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($new->created_at))->locale('ar_AR')->diffForHumans() }}</span>
                        |
                        <span>{{ \App\Models\Category::where('id', $new->category)->get()->first()->title }}</span> |
                        <span> {{ \App\Models\User::where('id', $new->author)->get()->first()->name }}</span>
                        <p>{{ Str::limit($new->description, 20, '...') }}</p>
                        <a class="text-decoration-none" href="{{ route('post', $new->id) }}">...أقرا المزيد</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Gov -->
@endsection()

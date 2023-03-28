@extends('layouts.base')
@section('title', 'post')
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
            <h2> {{ $post->title }}</h2>
            <div class="row">
                <div class="col-md-12 text-center">
                    <img src="{{ asset(\App\Models\Attachment::where('id', $post->image)->get()->first()->path) }}"
                        alt="" class="img-fluid">
                    <h4 class="m-2">{{ $post->title }}</h4>
                    <span>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->locale('ar_AR')->diffForHumans() }}</span>
                    <p>{{ Str::limit($post->description, 20, '...') }}</p>
                </div>

                <div class="col-md-12">
                    <h1 class="text-center">اترك تعليقك</h1>
                    <form action="{{ route('post', request()->route('id')) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="title" class="form-label">العنوان</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="username" class="form-label">اسم المستخدم</label>
                                <input type="text" name="user_name" id="username" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">الايميل</label>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="textarea">نص التعليق</label>
                                <textarea name="text" class="form-control" id="textarea" cols="30" rows="10"></textarea>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-primary btn-block" value="تعليق">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Gov -->
@endsection();

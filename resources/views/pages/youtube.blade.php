@extends('layouts.base')
@section('title', 'Youtube')
@section('MainContent')
    <div class="d-flex justify-content-center align-items-center">
        <div class="content">
            <div class="title mb-md-3">
                Video view is : ({{ $video->viewers }})
            </div>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/GVNDbTwOSiw" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
        </div>
    </div>
@endsection

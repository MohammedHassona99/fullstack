@extends('layouts.base')
@section('title', 'Youtube')
@section('MainContent')
    <div class="flex position-relative h-100">
        <div class="content">
            <div class="title mb-md-3">
                Video view is : (5)
            </div>
            <iframe width="560" height="315"
                src="https://www.youtube.com/watch?v=GVNDbTwOSiw&list=PLCm7ZeRfGSP4NNEikwx3wUAskQHB3p-LK&index=62"
                frameborder="0"></iframe>
        </div>
    </div>
@endsection

@extends('layouts.base')
@section('title', 'Contact Us')
@section('MainContent')
    <!-- Start Contact Us -->
    <section class="contact py-5 bg-white">
        <div class="container">
            <form class="bg-emerald-500 w-75 p-4" method='post' action="{{ route('formPost') }}">
                @csrf
                <div class="row flex-column">
                    <div class="col-12">
                        <label class="form-label" for="firstname">الاسم الاول</label>
                        <input class="form-control" type="text" name="firstName" id="firstName">
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="lastname">الاسم الاخير</label>
                        <input class="form-control" type="text" name="lastName" id="">
                    </div>
                    <div class="col-12">
                        <lablel class="form-label" for='phone'>الهاتف النقال</lablel>
                        <input class="form-control" type="number" name="phone" id="">
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">البريد الالكتروني</label>
                        <input class="form-control" type="email" name="email" id="">
                    </div>
                    <div class="col-12">
                        <label for="select" class="form-label">الوظائف</label>
                        <select class="form-control" name="" id="select">
                            <option value=""></option>
                            <option value="">Front-End Developer</option>
                            <option value="">Back-End Developer</option>
                            <option value="">Mobile Developer</option>
                            <option value="">Ux Ui Designer</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <input class="btn btn-block" type="submit" value="تسجيل طلب">
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- End Contact Us -->
@endsection

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.rtl.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <title>@yield('title', 'Unknown Page')</title>
</head>

<body>
    <!-- Start Navbar -->
    <nav class="navbar navbar-expand-lg bg-white p-0">
        <div class="container">
            <a class="navbar-brand" href="{{ route('homepage') }}">
                <img class="img-fluid" src="{{ asset('images/logo.png') }}" alt="" />
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('homepage') }}">
                            {{ __('message.mainTitle') }}
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTwo"
                            data-bs-toggle="dropdown" aria-expanded="false">عن الشركة <i
                                class="fa-solid fa-angle-down"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownTwo">
                            <li><a class="dropdown-item" href="#"> {{ __('message.about') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('news') }}">اخبارنا</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            خدماتنا <i class="fa-solid fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('gov-ser') }}">الحكومة</a></li>
                            <li>
                                <a class="dropdown-item" href="./projectMidd.html">المشاريع الصغيرة المتوسطة</a>
                            </li>
                            <li><a class="dropdown-item" href="#">الشركات الكبيرة</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('course') }}">الدورات التدريبية </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('contact') }}"> {{ __('message.about')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">عروض الاسعار</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ asset('login') }}">تسجيل دخول</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page"
                                href="">{{ 'مرحبا /' . Auth::user()->name . ' ' . Auth::user()->last_name }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ asset('dashboard') }}">لوحة التحكم</a>
                        </li>
                    @endguest
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" hreflang="{{ $localeCode }}"
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    @yield('MainContent')
    <!-- Start Footer -->
    <footer class="pt-5 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="info">
                        <div class="image mb-3 text-center">
                            <img src="{{ asset('images/footer-logo.png') }}" alt="" />
                        </div>
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li class="bg-white rounded-circle d-flex justify-content-center align-items-center p-2">
                                <i class="fa-brands fa-linkedin color-main"></i>
                            </li>
                            <li class="bg-white rounded-circle d-flex justify-content-center align-items-center p-2">
                                <i class="color-main fa-brands fa-twitter-square"></i>
                            </li>
                            <li class="bg-white rounded-circle d-flex justify-content-center align-items-center p-2">
                                <i class="color-main fa-brands fa-instagram"></i>
                            </li>
                            <li class="bg-white rounded-circle d-flex justify-content-center align-items-center p-2">
                                <i class="color-main fa-brands fa-facebook"></i>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 col-lg-3 text-center text-white">
                    <h3 class="mb-3">الرئيسية</h3>
                    <ul class="list-unstyled text-start ps-5">
                        <li class="mb-4">
                            <i class="fa-solid fa-angle-left me-2"></i>من نحن
                        </li>
                        <li class="mb-4">
                            <i class="fa-solid fa-angle-left me-2"></i>خدماتنا
                        </li>
                        <li class="mb-4">
                            <i class="fa-solid fa-angle-left me-2"></i>انضم الينا
                        </li>
                        <li class="mb-4">
                            <i class="fa-solid fa-angle-left me-2"></i>تواصل معنا
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-lg-3 text-center text-white">
                    <h3 class="mb-3">السياسات</h3>
                    <ul class="list-unstyled text-start ps-5">
                        <li class="mb-4">
                            <i class="fa-solid fa-angle-left me-2"></i>من نحن
                        </li>
                        <li class="mb-4">
                            <i class="fa-solid fa-angle-left me-2"></i>خدماتنا
                        </li>
                    </ul>
                </div>
                <div class="col-3 text-white d-none d-lg-block">
                    <h6>عن المنصة</h6>
                    <p>
                        أهم مميزات العصر الجديد هي تطوير أنظمة الكمبيوتر من دخول الحوسبة
                        السحابية والذكاء الاصطناعي ، وكذلك تغيير أساليب الإدارة ، حيث أصبح
                        العمل عن بعد مقبولاً وبإنتاج أعلى وفكرة مكافأة الموظفين. مقدار
                        الإنتاج والتفاعل المتكامل مع العميل من حيث السرعة وتقصير الخطوات
                        والاختيار وهذه هي الأسس التي تقوم عليها شركتنا وننطلق منها …
                    </p>
                </div>
            </div>
        </div>
        <hr class="text-white" />
        <p class="text-white text-center mb-0">
            كل الحقوق محفوظة كل الحقوق 2021 &copy;
        </p>
    </footer>
    <!-- End Footer -->
    <script src="{{ asset('js/all.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>

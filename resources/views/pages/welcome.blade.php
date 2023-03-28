    @extends('layouts.base')
    @section('title', 'Home')
    @section('MainContent')
        @if (count($sliders))
            <!-- Start Slider  -->
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    @foreach ($sliders as $slider)
                        <div class="carousel-item @if ($loop->first) active @endif ">
                            <img src="{{ asset(\App\Models\Attachment::where('id', $slider->image)->first()->path) }}"
                                class="d-block w-100 img-fluid" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{ $slider->title }}</h5>
                                <p>{{ Str::limit($slider->description, 30, '...') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @endif
        <!-- End Slider  -->

        <!-- Start Header -->
        <header>
            <div class="container d-flex align-items-center">
                <div class="row justify-content-center align-items-center ">
                    <div class="col-12 col-md-6 info text-white pe-5 mb-5 mb-md-0">
                        <h3>مرحبا بكم في شركة الحلول الذكية لمراكز الاتصال</h3>
                        <p>
                            شركة كويتية متخصصة في إدارة مراكز الاتصال (الكول سنتر) بكل وحداتة
                            من موظفين و إدارة و أنظمة باحترافية عالية و سعر متميز
                        </p>
                        <a class="text-decoration-none text-white bg-main py-2 px-4 rounded-pill me-3" href="#">عرض
                            السعر</a>
                        <a class="text-decoration-none bg-white color-main py-2 px-4 rounded-pill btn btn-primary btn-lg"
                            type="button" data-bs-toggle="modal" data-bs-target="#modalId" href="#">انضم
                            الينا</a>
                    </div>
                    <div class="col-12 col-md-6 image">
                        <img class="img-fluid" src="./images/mini-img-header.png" alt="" />
                    </div>
                </div>
            </div>
        </header>
        <!-- End Header -->

        <!-- Modal -->
        <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal-sm modal-fullscreen" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <div class="modal-body">
                        <form action="{{ route('add_trainee') }}">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">الاسم</label>
                                        <input type="text" name="" id="name" class="form-control"
                                            placeholder="الاسم كامل" aria-describedby="helpId">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">البريد االالكتروني</label>
                                        <input type="email" name="" id="email" class="form-control"
                                            placeholder="البريد الالكتروني" aria-describedby="helpId">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="number" class="form-label">رقم الهاتف</label>
                                        <input type="number" name="" id="number" class="form-control"
                                            placeholder=" رقم الهاتف" aria-describedby="helpId">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="address" class="form-label">العنوان</label>
                                        <input type="text" name="" id="address" class="form-control"
                                            placeholder=" العنوان" aria-describedby="helpId">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="birthday" class="form-label">تاريخ الميلاد</label>
                                        <input type="date" name="" id="birthday" class="form-control"
                                            aria-describedby="helpId">

                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="textarea">الرسالة</label>
                                    <select name="course_id" id="" class="form-select"
                                        aria-label="Default select example">
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                        <button type="button" class="btn btn-primary">تسجيل</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start Founder -->
        <section class="founder my-5">
            <div class="container">
                <h2 class="text-center">كلمة المؤسس</h2>
                <div class="row">
                    <div class="col-12 col-md-8 order-1 order-md-0">
                        <p>
                            خلال الاحداث التي مر بها العالم من ثورات صناعية او حروب عالمية او
                            أوبئة، تغيرت ملامح الحياة و اصبح لها نمط جديد. نذكر منها بالنسبة
                            لنا اكتشاف النفط او الغزو العراقي . حيث لم تعد الأمور كما كانت
                            للابد و” هناك من ادرك التغيير و تأقلم معه و نما و نجح و هناك من
                            تجاهله ففشل ونساه التاريخ”.
                        </p>
                        <p>
                            ولا شك ان جائحة كرونا 19 هي متغير كبير في تاريخ الانسان و لن تعود
                            الحياة كما كانت . و يجب ان ندرك ذلك. و من هنا جاءت فكرة تأسيس شركة
                            “الحلول الذكية” لتواكب العصر الجديد .
                        </p>
                        <p>
                            إن اهم معالم العصر الجديد هي : تطور الأنظمة الحاسوبية من دخول
                            الحوسبة السحابية و الذكاء الاصطناعي و كذلك تغيير أساليب الإدارة
                            حيث اصبح العمل عن بعد مقبول و بإنتاج اعلى و فكرة المكافأة على قدر
                            الإنتاج و التفاعل المتكامل مع العميل من حيث السرعة و اختصار
                            الخطوات و اختيار الطرق الأفضل له .
                        </p>
                        <a class="bg-main text-white text-decoration-none p-2 rounded-1" href="#">تواصل مع
                            المؤسس</a>
                    </div>

                    <div class="col-12 col-md-4 mb-5 mb-md-0">
                        <div class="image">
                            <img class="img-fluid" src="./images/founder.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Founder -->
        <!-- Start why we -->
        <section class="why-we">
            <div class="container">
                <h2 class="text-center">لماذا تتعاقد معنا</h2>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="future me-2">
                            <i class="fa-solid fa-credit-card bg-main text-white p-3 rounded-circle"></i>
                            <h4>كم تدفع بالفعل مقابل كل مكالمة</h4>
                            <ul class="list-unstyled">
                                <li>
                                    <i class="fa-solid fa-check"></i><span>حط في بالك كم تكلفك رواتب الموظفين</span>
                                </li>
                                <li>
                                    <i class="fa-solid fa-check"></i><span>الايجار و الاثاث</span>
                                </li>
                                <li>
                                    <i class="fa-solid fa-check"></i><span>الانظمة ،الكومبيوتر،الانترنت، الخطوط</span>
                                </li>
                                <li>
                                    <i class="fa-solid fa-check"></i><span>الاقامات ، الاجازات ، نهاية الخدمة</span>
                                </li>
                            </ul>
                            <a class="text-decoration-none bg-main text-white py-2 px-5 rounded-1"
                                href="#">المزيد</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="future me-2">
                            <i class="fa-solid fa-business-time bg-main text-white p-3 rounded-circle"></i>

                            <h4>كم ضيعت من فرص حتى الآن؟</h4>
                            <ul class="list-unstyled">
                                <li>
                                    <i class="fa-solid fa-check"></i><span>جم مكالمة ضاعت عليك</span>
                                </li>
                                <li>
                                    <i class="fa-solid fa-check"></i><span>شكثر موظفين بطالية و انت تدفع</span>
                                </li>
                                <li>
                                    <i class="fa-solid fa-check"></i><span>وقت الإدارة و شغل التفكير مو فلوس</span>
                                </li>
                                <li>
                                    <i class="fa-solid fa-check"></i><span>كم عميل فقدت لعدم الاستجابة لشكتويهم و
                                        ملاحظاتهم</span>
                                </li>
                            </ul>
                            <a class="text-decoration-none bg-main text-white py-2 px-5 rounded-1"
                                href="#">المزيد</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="future">
                            <i class="fa-solid fa-circle-check bg-main text-white p-3 rounded-circle"></i>

                            <h4>كيف نعمل معا</h4>
                            <ul class="list-unstyled">
                                <li>
                                    <i class="fa-solid fa-check"></i><span>نقوم بربط رقمكم التجاري على انظمتنا</span>
                                </li>
                                <li>
                                    <i class="fa-solid fa-check"></i><span>يقوم موظفينا المخصصين لكم بالرد على مكالماتكم
                                        و
                                        عمل الأمور
                                        الإدارية</span>
                                </li>
                                <li>
                                    <i class="fa-solid fa-check"></i><span>تعمل إدارة الجودة و لدينا بعمل التدريب و
                                        الإشراف</span>
                                </li>
                                <li>
                                    <i class="fa-solid fa-check"></i>
                                    <span>
                                        نقوم بتزويدكم بالتقارير و الشاشات اللازمة للإشراف و المراقبة
                                    </span>
                                </li>
                            </ul>
                            <a class="text-decoration-none bg-main text-white py-2 px-5 rounded-1"
                                href="#">المزيد</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End why we -->
        <!-- Start Contact Us -->
        <section class="contact-us py-5 my-5">
            <div class="container">
                <form class="bg-white mx-md-auto" action="" method="POST">

                    <h4 class="text-center py-3">تواصل معنا</h4>
                    <div class="row flex-column flex-md-row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="first-name" class="form-label">الاسم الاول</label>
                            <input type="text" class="form-control border-0" id="first-name" />
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="last-name" class="form-label">الاسم الاخير</label>
                            <input type="text" class="form-control border-0" id="first-name" />
                        </div>
                        <div class="col-12 mb-3">
                            <label for="email" class="form-label"> البريد الالكتروني</label>
                            <input type="email" class="form-control border-0" id="email" />
                        </div>
                        <div class="col-12 mb-3">
                            <label for="textarea">الرسالة</label>
                            <textarea class="border-0 w-100" id="textarea" name="" id=""></textarea>
                        </div>
                        <div class="col-12">
                            <input class="bg-main text-white rounded-1 w-100 border-0 py-2" type="submit"
                                value="أرسال" />
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- End Contact Us -->

        <script>
            // let request = new XMLHttpRequest();
            // request.onload = function(){
            //     if(this.readyState === 4 && this.state === 200){

            //     }
            // }

            $.ajax({
                url: "{{ route('add_trainee') }}"
            })
        </script>
    @endsection

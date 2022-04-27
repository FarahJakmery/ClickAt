@extends('weblayouts.master')

@section('web_title')
    عن كليكات
@endsection

@section('web_content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg"
        data-background="{{ URL::asset('Web/assets/img/bg/breadcrumb_bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2>عن كليكات</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">عن كليكات</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- about-area -->
    <section class="about-area pt-100 pb-100">
        <div class="container">
            <div class="row align-items-xl-center">
                <div class="col-sm-3">
                    <div class="about-img">
                        <img src="img/logo-sm.png" alt="">
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="about-content">
                        <h4 class="title">عن كليكات</h4>
                        <p>{{ $about->translate('ar')->text }}</p>
                        <div class="our-mission-wrap">
                            <div class="our-mission-list">
                                <div class="mission-box">
                                    <div class="mission-icon">
                                        <i class="flaticon-project"></i>
                                    </div>
                                    <div class="mission-count">
                                        <h2><span class="odometer" data-count="324">00</span>+</h2>
                                        <span>مستخدم</span>
                                    </div>
                                </div>
                                <div class="mission-box">
                                    <div class="mission-icon">
                                        <i class="flaticon-revenue"></i>
                                    </div>
                                    <div class="mission-count">
                                        <h2><span class="odometer" data-count="3">00</span>م ر.س</h2>
                                        <span>مجمل كلفة المبيعات</span>
                                    </div>
                                </div>
                                <div class="mission-box">
                                    <div class="mission-icon">
                                        <i class="flaticon-quality"></i>
                                    </div>
                                    <div class="mission-count">
                                        <h2><span class="odometer" data-count="379">00</span>+</h2>
                                        <span>منتجات مباعة</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-area-end -->

    <!-- features-area -->
    <section class="features-area theme-bg pt-100 pb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center mb-70">
                        <span class="sub-title">لماذا قد تختارنا</span>
                        <h2 class="title">خبرة في تعامل مع العملاء</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="features-wrap-item mb-30">
                        <div class="features-icon">
                            <i class="flaticon-shuttle"></i>
                        </div>
                        <div class="features-content">
                            <h5>توصيل سريع للزبون</h5>
                            <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
                                العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف
                                التى يولدها التطبيق.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="features-wrap-item mb-30">
                        <div class="features-icon">
                            <i class="flaticon-secure-payment"></i>
                        </div>
                        <div class="features-content">
                            <h5>دفع آمن</h5>
                            <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
                                العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف
                                التى يولدها التطبيق.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="features-wrap-item mb-30">
                        <div class="features-icon">
                            <i class="flaticon-24-hours-support"></i>
                        </div>
                        <div class="features-content">
                            <h5>24/24 خدمة العملاء</h5>
                            <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
                                العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف
                                التى يولدها التطبيق.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- features-area-end -->
@endsection

@section('js')
@endsection

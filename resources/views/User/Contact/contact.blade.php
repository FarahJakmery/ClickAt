@extends('weblayouts.master')

@section('web_title')
    تواصل معنا
@endsection

@section('css')
@endsection

@section('web_content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg"
        data-background="{{ URL::asset('Web/assets/img/bg/breadcrumb_bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2>تواصل معنا</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.home') }}">الرئيسية</a></li>
                                <li class="breadcrumb-item active" aria-current="page">تواصل معنا</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- contact-area -->
    <section class="contact-area pt-100 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-7 col-md-9">
                    <div class="contact-title text-center mb-60">
                        <div class="section-title text-center">
                            <span class="sub-title">لنتحدث</span>
                            <h2 class="title">أرسل رسالة</h2>
                        </div>
                        <p>نحن دائماً سعيدون للتحدث معك. تأكد من مراسلتنا إذا كان لديك أي استفسار أو بحاجة لمساعدة أو دعم.
                        </p>
                    </div>
                </div>
            </div>
            <div class="contact-wrap-padding">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="change-info">
                            <div class="login-signup">
                                <div class="container">
                                    <div class="forms-container">
                                        <div class="signin-signup">
                                            <form action="/sent_message_to_email" method="post" class="sign-up-form">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="input-field">
                                                            <i class="fas fa-user"></i>
                                                            <input type="text" name="user_name"
                                                                placeholder="اسم المستخدم" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-field">
                                                            <i class="fas fa-envelope"></i>
                                                            <input type="email" name="email"
                                                                placeholder="البريد الالكتروني" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-field">
                                                            <i class="fas fa-phone"></i>
                                                            <input type="text" name="phone" placeholder="رقم الهاتف" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="input-field messege-input">
                                                            <i class="fas fa-phone"></i>
                                                            <textarea name="message" id="message" placeholder="اكتب رسالتك"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="submit" class="btn" value="إرسال" />
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-area-end -->
@endsection

@section('js')
@endsection

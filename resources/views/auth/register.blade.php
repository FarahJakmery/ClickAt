@extends('layouts.master2')
@section('title')
    تسجيل مستخدم جديد - ClickAt
@endsection
@section('css')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 m-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex">
                                        <a href="index.html"><img src="../../assets/img/brand/favicon.png"
                                                class="sign-favicon-a ht-40" alt="logo">
                                            <img src="../../assets/img/brand/favicon-white.png" class="sign-favicon-b ht-40"
                                                alt="logo">
                                        </a>
                                        <h1 class="main-logo1 ms-1 me-0 my-auto tx-28 ps-1">Cl<span>ick</span>At</h1>
                                    </div>
                                    <div class="main-signup-header">
                                        <h2 class="text-primary">مرحبا بك!</h2>
                                        <h5 class="fw-normal mb-4">الاشراك مجاني و لا يستفرق أكثر من دقيقة.</h5>
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label>اسم المستخدم</label>
                                                <input class="form-control" placeholder="ادخل اسم المستخدم" type="text"
                                                    name="name">
                                            </div>
                                            <div class="form-group">
                                                <label>البريد الإلكتروني</label>
                                                <input class="form-control" placeholder="ادخل بريدك الإلكتروني"
                                                    type="text" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label>كلمة المرور</label> <input class="form-control"
                                                    placeholder="Enter your password" type="password" name="password">
                                            </div>
                                            <div class="form-group">
                                                <label>تأكيد كلمة المرور</label> <input class="form-control"
                                                    placeholder="Enter your password" type="password"
                                                    name="password_confirmation">
                                            </div>
                                            <button class="btn btn-main-primary btn-block">انشأ حساباً</button>
                                        </form>
                                        <div class="main-signup-footer mt-5">
                                            <p>هل لديك حساب سابقاً؟<a href="{{ route('login') }}"> سجل الدخول</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p m-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto m-auto wd-100p">
                        <img src="{{ asset('/images/Web_images/login&register.jpeg') }}"
                            class="my-auto ht-xl-80p wd-md-100p wd-xl-80p m-auto" alt="logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection

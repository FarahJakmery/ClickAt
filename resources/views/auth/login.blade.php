@extends('layouts.master2')

@section('title')
    تسجيل الدخول - ClickAt
@endsection

@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ URL::asset('assets/plugins/sidemenu-responsive-tabs/sidemenu-responsive-tabs.css') }}"
        rel="stylesheet">
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
                            <div class="col-md-10 col-lg-10 col-xl-9 mr-center">
                                <div class="card-sigin">
                                    <div class="card-sigin">
                                        <div class="card-sigin d-flex mb-5">
                                            <a href="index.html">
                                                {{-- Logo --}}
                                                <img src="{{ URL::asset('images/Web_images/LOGO.png') }}"
                                                    class="sign-favicon-a ht-90" alt="logo">
                                                {{-- <img src="{{ URL::asset('assets/img/brand/favicon-white.png') }}"
                                                    class="sign-favicon-b ht-40" alt="logo"> --}}
                                            </a>
                                            <h1 class="main-logo1 ms-1 me-0 my-auto tx-28 ps-1">Cl<span>ick</span>At</h1>
                                        </div>
                                        <div class="card-sigin">
                                            <div class="main-signup-header">
                                                <h2>مرحبا بك!</h2>
                                                <h5 class="fw-semibold mb-4">الرجاء تسجيل الدخول للمتابعة.</h5>
                                                <form method="POST" action="{{ route('login') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>البريد الإلكتروني</label>
                                                        <input id="email" type="email" name="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            placeholder="Enter your email" value="{{ old('email') }}"
                                                            required autocomplete="email" autofocus>
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>كلمة المرور</label>
                                                        <input id="password" type="password"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            name="password" required autocomplete="current-password"
                                                            placeholder="Enter your password">
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6 offset-md-0">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="remember" id="remember"
                                                                    {{ old('remember') ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="remember">تذكرني</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-main-primary btn-block">
                                                        سجل الدخول
                                                    </button>
                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    <p>
                                                        <a href="">
                                                            هل نسيت كلمة المرور؟
                                                        </a>
                                                    </p>
                                                    <p>
                                                        ليس لديك حساب؟
                                                        <a href="{{ route('register') }}">
                                                            إنشاء حساب
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End -->
                    </div>
                </div><!-- End -->
            </div>

            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mr-center text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mr-center wd-100p">
                        <img src="{{ asset('/images/Web_images/login&register.jpeg') }}"
                            class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mr-center" alt="logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection

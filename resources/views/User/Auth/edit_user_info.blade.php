@extends('weblayouts.master')

@section('web_title')
    كليكات
@endsection

@section('css')
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ URL::asset('Web/assets/css/all.min.css') }}">
@endsection

@section('web_content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2>تعديل معلومات الحساب</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                                <li class="breadcrumb-item active" aria-current="page">تعديل معلومات الحساب</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- checkout-area -->
    <div class="change-info py-5">
        <div class="login-signup">
            <div class="container">
                <div class="forms-container">
                    <div class="signin-signup">
                        <form action="{{ route('user.updateProfile', $user->id) }}" class="sign-up-form" method="POST">
                            @method('PUT')
                            @csrf
                            <h2 class="title">تعديل معلومات الحساب</h2>
                            <div class="input-field">
                                <i class="fas fa-user"></i>
                                <input name="name" value="{{ old('name') ?? $user->name }}" type="text"
                                    placeholder="اسم المستخدم" />
                            </div>
                            <div class="input-field">
                                <i class="fas fa-envelope"></i>
                                <input name="email" value="{{ old('email') ?? $user->email }}" type="email"
                                    placeholder="البريد الالكتروني" />
                            </div>
                            <div class="input-field">
                                <i class="fas fa-phone"></i>
                                <input name="mobile_number" value="{{ old('mobile_number') ?? $user->mobile_number }}"
                                    type="text" placeholder="رقم الهاتف" />
                            </div>
                            <div class="input-field">
                                <i class="fas fa-lock"></i>
                                <input name="password" value="{{ old('password') }}" type="password"
                                    placeholder="كلمة المرور" />
                            </div>
                            <div class="input-field">
                                <i class="fas fa-lock"></i>
                                <input name="password_confirmation" value="{{ old('password_confirmation') }}"
                                    type="password" placeholder="تأكيد كلمة المرور" />
                            </div>
                            <input type="submit" class="btn" value="تأكيد" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout-area-end -->
@endsection

@section('js')
@endsection

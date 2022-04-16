@extends('weblayouts.master')

@section('web_title')
    تسجيل الدخول
@endsection

@section('web_content')
    <!-- my-account-area -->
    <div class="login-signup">
        <div class="container-fluid">
            <div class="forms-container">
                <div class="signin-signup">

                    {{-- Sign-In-Form --}}
                    <form action="{{ route('user.check') }}" class="sign-in-form" method="POST">
                        @if (Session::get('fail'))
                            <div class="alert alert-danger">
                                {{ Session::get('fail') }}
                            </div>
                        @endif
                        {{ csrf_field() }}
                        <h2 class="title">تسجيل الدخول</h2>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input name="email" value="{{ old('email') }}" type="email" placeholder="البريد الالكتروني"
                                required autocomplete="email" />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input name="password" value="{{ old('password') }}" type="password"
                                placeholder="كلمة المرور" />
                        </div>
                        <input type="submit" value="تأكيد" class="btn solid" />
                    </form>

                    {{-- Sign-Up-Form --}}
                    <form action="{{ route('user.create') }}" class="sign-up-form" method="POST">
                        {{ csrf_field() }}
                        <h2 class="title">إنشاء حساب</h2>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input name="name" value="{{ old('name') }}" type="text" placeholder="اسم المستخدم"
                                required />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-envelope"></i>
                            <input name="email" value="{{ old('email') }}" type="email" placeholder="البريد الالكتروني"
                                required autocomplete="email" />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-phone"></i>
                            <input name="mobile_number" value="{{ old('mobile_number') }}" type="text"
                                placeholder="رقم الهاتف" required />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input name="password" value="{{ old('password') }}" type="password"
                                placeholder="كلمة المرور" required />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input name="password_confirmation" value="{{ old('password_confirmation') }}"
                                type="password" placeholder="تأكيد كلمة المرور" required />
                        </div>
                        <input type="submit" class="btn light-bgcolor" value="تأكيد" />
                    </form>

                </div>
            </div>

            <div class="panels-container">

                <div class="panel left-panel">
                    <div class="content">
                        <h3>جديد هنا</h3>
                        <p>
                            هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق،
                            أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.
                        </p>
                        <button class="btn transparent" id="sign-up-btn"> إنشاء حساب
                        </button>
                    </div>
                    <img src="{{ URL::asset('Web/assets/img/log.svg') }}" class="image" alt="" />
                </div>

                <div class="panel right-panel">
                    <div class="content">
                        <h3>موجود لدينا</h3>
                        <p>
                            هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق،
                            أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.
                        </p>
                        <button class="btn transparent" id="sign-in-btn"> تسجيل دخول
                        </button>
                    </div>
                    <img src="{{ URL::asset('Web/assets/img/register.svg') }}" class="image" alt="" />
                </div>

            </div>
        </div>

    </div>
    <!-- my-account-area-end -->
@endsection

@section('js')
    <script src="{{ URL::asset('Web/assets/js/login.js') }}"></script>
@endsection

@extends('weblayouts.master')

@section('web_title')
    أكواد كليكات
@endsection

@section('css')
@endsection

@section('web_content')
    <!-- features-area -->
    <section class="features-area pt-100 pb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center mb-70">
                        <span class="sub-title">أكواد حصرية</span>
                        <h2 class="title">احصل على خصم من المتاجر التالية</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($codes as $code)
                    <div class="col-md-4 col-sm-6">
                        <div class="testimonial-item text-center">
                            <div class="testi-avatar-img mb-20">
                                <img src="{{ asset($code->photo_name) }}" alt="">
                            </div>
                            <div class="testi-avatar-info">
                                <h5>{{ $code->translate('ar')->codeproduct_name }}</h5>
                                <a class="copy-code" herf="#">انسخ الرمز</a>
                                <input type="hidden" value="{{ $code->code }}" id="myInput">
                                <span class="copy-messege">
                                    <i class="fa fa-tr"></i>
                                    تم نسخ الرمز
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- features-area-end -->
@endsection

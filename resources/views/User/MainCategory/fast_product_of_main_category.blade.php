@extends('weblayouts.master')

@section('web_title')
    منتجات البيع السريع
@endsection

@section('css')
@endsection

@section('web_content')
    <!-- exclusive-collection-area -->
    <section class="exclusive-collection pt-100 pb-60">
        <div class="container">
            <div class="product-desc-wrap mb-100">
                <!-- exclusive-collection-area -->
                <section class="exclusive-collection pt-100 pb-55">
                    <div class="custom-container-two">
                        {{-- # --}}
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="section-title text-center mb-60">
                                    <span class="sub-title">مجموعة حصرية</span>
                                    <h2 class="title">أفضل الأسعار اشتري الآن</h2>
                                </div>
                            </div>
                        </div>

                        {{-- The Products Items --}}
                        <div class="row justify-content-center">
                            @foreach ($MainCategory->fastproducts as $fastproduct)
                                <div class="col-lg-4 col-sm-6 grid-item grid-sizer cat-two cat-three">
                                    <div class="exclusive-item exclusive-item-three text-center mb-40">
                                        <div class="exclusive-item-thumb circle-shape">
                                            <div class="ko-progress-circle data-left-time" data-progress="0"
                                                data-end="{{ $fastproduct->expiry_date }}"
                                                data-start="{{ $fastproduct->product_date }}">
                                                <div class="ko-circle">
                                                    <div class="full ko-progress-circle__slice">
                                                        <div class="ko-progress-circle__fill"></div>
                                                    </div>
                                                    <div class="ko-progress-circle__slice">
                                                        <div class="ko-progress-circle__fill"></div>
                                                        <div class="ko-progress-circle__fill ko-progress-circle__bar">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ko-progress-circle__overlay">
                                                    <div class="most--popular--item--thumb height-100 circle-shape">
                                                        <a href="#">
                                                            <img src="{{ asset($fastproduct->photo_name) }}" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="exclusive-item-content">
                                            <h5>
                                                <a href="shop-details.html">
                                                    {{ $fastproduct->translate('ar')->name }}
                                                </a>
                                            </h5>
                                            <div class="exclusive--item--price">
                                                <span class="new-price">
                                                    {{ $fastproduct->max_price }}ر.س
                                                </span>
                                                <input type="hidden" id="max_price" value="{{ $fastproduct->max_price }}">
                                            </div>
                                            <div class="add-to-cart">
                                                <form action="#">
                                                    <div class="cart-plus-minus">
                                                        <input type="text" name="quantity" id="quantity"
                                                            value="{{ $fastproduct->quantity }}">
                                                    </div>
                                                    <button class="btn addToCart" id="product_id"
                                                        value="{{ $fastproduct->id }}">
                                                        <i class="flaticon-supermarket"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="viewed-offer-time">
                                            <p>
                                                <span>أسرع بالشراء </span>
                                                عرض لمدة محدودة
                                            </p>
                                            <div class="coming-time" data-countdown="2020/9/15"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Pagination --}}
                        <div class="pagination-wrap">
                            <ul>
                                <li class="prev">
                                    <a href="#">
                                        <i class="fas fa-long-arrow-alt-right"></i>
                                        السابق
                                    </a>
                                </li>
                                <li>
                                    <a href="#">1
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="#">2
                                    </a>
                                </li>
                                <li>
                                    <a href="#">3
                                    </a>
                                </li>
                                <li>
                                    <a href="#">4
                                    </a>
                                </li>
                                <li>
                                    <a href="#">...
                                    </a>
                                </li>
                                <li>
                                    <a href="#">10
                                    </a>
                                </li>
                                <li class="next">
                                    <a href="#">التالي
                                        <i class="fas fa-long-arrow-alt-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
                <!-- exclusive-collection-area-end -->
            </div>
        </div>
    </section>
    <!-- exclusive-collection-area-end -->
@endsection

@section('js')
@endsection

@extends('weblayouts.master')

@section('web_title')
    نتائج البحث
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
                        <h2>نتائج البحث</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.home') }}">الرئيسية</a></li>
                                <li class="breadcrumb-item active" aria-current="page">نتائج البحث</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- search-area -->
    <section class="search-area pt-100 pb-100">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="product-desc-wrap mb-100">
                        <ul class="nav nav-tabs mb-25" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="details-tab" data-toggle="tab" href="#details" role="tab"
                                    aria-controls="details" aria-selected="true">منتجات خارجية</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="val-tab" data-toggle="tab" href="#val" role="tab"
                                    aria-controls="val" aria-selected="false">منتجات البيع السريع</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            {{-- Products --}}
                            <div class="tab-pane fade show active" id="details" role="tabpanel"
                                aria-labelledby="details-tab">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12">
                                            <div class="row exclusive-active">
                                                @isset($products)
                                                    @foreach ($products as $product)
                                                        <div class="col-lg-4 col-sm-6 grid-item grid-sizer cat-two cat-three">
                                                            <div class="exclusive-item mb-40">
                                                                <div class="exclusive-item-thumb exclusive-item-three"
                                                                    data-date="48:00:00">
                                                                    <a href="shop-details.html">
                                                                        <img src="{{ asset($product->photo_name) }}" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="exclusive-item-content">
                                                                    <div class="exclusive--content--bottom">
                                                                        <h5>
                                                                            <a href="shop-details.html">
                                                                                {{ $product->translate('ar')->product_name }}
                                                                            </a>
                                                                        </h5>
                                                                        <a href="#">
                                                                            <i class="flaticon-heart"></i>
                                                                        </a>
                                                                        <span>{{ $product->price }}ر.س</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endisset

                                                @empty($products)
                                                    <!-- search-area -->
                                                    <section class="search-area pt-100 pb-100">
                                                        <!-- <section class="wishlist-area pt-100 pb-100"> -->
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="empty-search">
                                                                        <div class="image-holder">
                                                                            <img src="{{ URL::asset('Web/assets/img/icon/search.png') }}"
                                                                                alt="">
                                                                        </div>
                                                                        <h3>لا يوجد نتائج بحث</h3>
                                                                        <p>قد يكون العنص غير موجود او هناك خطأ في البحث</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- </section> -->
                                                    </section>
                                                    <!-- search-area-end -->
                                                @endempty
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pagination-wrap">
                                        <ul>
                                            <li class="prev">
                                                <a href="#"><i class="fas fa-long-arrow-alt-right"></i> السابق</a>
                                            </li>
                                            <li>
                                                <a href="#">1</a>
                                            </li>
                                            <li class="active">
                                                <a href="#">2</a>
                                            </li>
                                            <li>
                                                <a href="#">3</a>
                                            </li>
                                            <li>
                                                <a href="#">4</a>
                                            </li>
                                            <li>
                                                <a href="#">...</a>
                                            </li>
                                            <li>
                                                <a href="#">10</a>
                                            </li>
                                            <li class="next">
                                                <a href="#">التالي <i class="fas fa-long-arrow-alt-left"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            {{-- Fast Prodcts --}}
                            <div class="tab-pane fade" id="val" role="tabpanel" aria-labelledby="val-tab">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        @isset($fastProducts)
                                            @foreach ($fastProducts as $fastProduct)
                                                <div class="col-lg-4 col-sm-6 grid-item grid-sizer cat-two cat-three">
                                                    <div class="exclusive-item exclusive-item-three text-center mb-40">
                                                        <div class="exclusive-item-thumb circle-shape">
                                                            <div class="ko-progress-circle data-left-time" data-progress="0"
                                                                data-end="mar 28, 2022 18:20:00"
                                                                data-start="mar 28, 2022 10:30:00">
                                                                <div class="ko-circle">
                                                                    <div class="full ko-progress-circle__slice">
                                                                        <div class="ko-progress-circle__fill"></div>
                                                                    </div>
                                                                    <div class="ko-progress-circle__slice">
                                                                        <div class="ko-progress-circle__fill"></div>
                                                                        <div
                                                                            class="ko-progress-circle__fill ko-progress-circle__bar">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="ko-progress-circle__overlay">
                                                                    <div
                                                                        class="most--popular--item--thumb height-100 circle-shape">
                                                                        <a href="#">
                                                                            <img src="{{ asset($fastProduct->photo_name) }}"
                                                                                alt="">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="exclusive-item-content">
                                                            <h5>
                                                                <a href="shop-details.html">
                                                                    {{ $fastProduct->translate('ar')->name }}
                                                                </a>
                                                            </h5>
                                                            <div class="exclusive--item--price">
                                                                <span class="new-price">
                                                                    {{ $fastProduct->max_price }}ر.س
                                                                </span>
                                                            </div>
                                                            <div class="add-to-cart">
                                                                <form action="#">
                                                                    <div class="cart-plus-minus">
                                                                        <input type="text"
                                                                            value="{{ $fastProduct->quantity }}">
                                                                    </div>
                                                                    <button class="btn">
                                                                        <i class="flaticon-supermarket"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="viewed-offer-time">
                                                            <p><span>أسرع بالشراء </span>عرض لمدة محدودة</p>
                                                            <div class="coming-time" data-countdown="2020/9/15"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endisset

                                        @empty($records)
                                            <!-- search-area -->
                                            <section class="search-area pt-100 pb-100">
                                                <!-- <section class="wishlist-area pt-100 pb-100"> -->
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="empty-search">
                                                                <div class="image-holder">
                                                                    <img src="{{ URL::asset('Web/assets/img/icon/search.png') }}"
                                                                        alt="">
                                                                </div>
                                                                <h3>لا يوجد نتائج بحث</h3>
                                                                <p>قد يكون العنص غير موجود او هناك خطأ في البحث</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- </section> -->
                                            </section>
                                            <!-- search-area-end -->
                                        @endempty
                                    </div>
                                    <div class="pagination-wrap">
                                        <ul>
                                            <li class="prev"><a href="#"><i
                                                        class="fas fa-long-arrow-alt-right"></i> السابق</a></li>
                                            <li><a href="#">1</a></li>
                                            <li class="active"><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#">...</a></li>
                                            <li><a href="#">10</a></li>
                                            <li class="next"><a href="#">التالي <i
                                                        class="fas fa-long-arrow-alt-left"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- search-area-end -->
@endsection

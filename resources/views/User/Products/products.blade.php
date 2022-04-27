@extends('weblayouts.master')

@section('web_title')
    منتجات خارجية
@endsection

@section('css')
@endsection

@section('web_content')
    <!-- exclusive-collection-area -->
    <section class="exclusive-collection pt-100 pb-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center mb-60">
                        <span class="sub-title">مجموعات حصرية</span>
                        <h2 class="title">أكثر المنتجات مبيعًا</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="product-menu mb-60">
                        <button class="active" data-filter="*">أفضل المبيعات</button>
                        <button class="" data-filter=".cat-one">الملابس</button>
                        <button class="" data-filter=".cat-two">السيارات</button>
                        <button class="" data-filter=".cat-three">الالكترونيات</button>
                        <button class="" data-filter=".cat-four">الاجهزة الكهربائية</button>
                        <button class="" data-filter=".cat-five">الأثات</button>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="row exclusive-active">
                        <div class="col-lg-4 col-sm-6 grid-item grid-sizer cat-two cat-three">
                            <div class="exclusive-item mb-40">
                                <div class="exclusive-item-thumb exclusive-item-three" data-date="48:00:00">
                                    <a href="shop-details.html">
                                        <img src="{{ URL::asset('Web/assets/img/products/Beard-Trimmer.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="exclusive-item-content">
                                    <div class="exclusive--content--bottom">
                                        <h5><a href="shop-details.html">ماكينة تهذيب اللحية من فينام</a></h5>
                                        <a href="#"><i class="flaticon-heart"></i></a>
                                        <span>58.00ر.س</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-lg-4 col-sm-6 grid-item grid-sizer cat-one cat-three">
                            <div class="exclusive-item mb-40">
                                <div class="exclusive-item-thumb exclusive-item-three">
                                    <a href="shop-details.html">
                                        <img src="{{ URL::asset('Web/assets/img/products/party-dress.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="exclusive-item-content">
                                    <div class="exclusive--content--bottom">
                                        <h5><a href="shop-details.html">فستان حفل أنيق</a></h5>
                                        <a href="#"><i class="flaticon-heart"></i></a>
                                        <span>37.00ر.س</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 grid-item grid-sizer cat-one cat-two">
                            <div class="exclusive-item mb-40">
                                <div class="exclusive-item-thumb exclusive-item-three">
                                    <a href="shop-details.html">
                                        <img src="{{ URL::asset('Web/assets/img/products/Mens-Casual-Shoes.jpg') }}"
                                            alt="">
                                    </a>
                                </div>
                                <div class="exclusive-item-content">
                                    <div class="exclusive--content--bottom">
                                        <h5><a href="shop-details.html">حذاء رجالي</a></h5>
                                        <a href="#"><i class="flaticon-heart"></i></a>
                                        <span>26.00ر.س</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 grid-item grid-sizer cat-one cat-three">
                            <div class="exclusive-item mb-40">
                                <div class="exclusive-item-thumb exclusive-item-three">
                                    <a href="shop-details.html">
                                        <img src="{{ URL::asset('Web/assets/img/products/Stylish-Smart-Watch.jpg') }}"
                                            alt="">
                                    </a>
                                </div>
                                <div class="exclusive-item-content">
                                    <div class="exclusive--content--bottom">
                                        <h5><a href="shop-details.html">ساعة ذكية أنيقة</a></h5>
                                        <a href="#"><i class="flaticon-heart"></i></a>
                                        <span>39.00ر.س</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 grid-item grid-sizer cat-two cat-three">
                            <div class="exclusive-item mb-40">
                                <div class="exclusive-item-thumb exclusive-item-three" data-date="48:00:00">
                                    <a href="shop-details.html">
                                        <img src="{{ URL::asset('Web/assets/img/products/Beard-Trimmer.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="exclusive-item-content">
                                    <div class="exclusive--content--bottom">
                                        <h5><a href="shop-details.html">ماكينة تهذيب اللحية من فينام</a></h5>
                                        <a href="#"><i class="flaticon-heart"></i></a>
                                        <span>58.00ر.س</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 grid-item grid-sizer cat-one cat-two">
                            <div class="exclusive-item mb-40">
                                <div class="exclusive-item-thumb exclusive-item-three">
                                    <a href="shop-details.html">
                                        <img src="{{ URL::asset('Web/assets/img/products/Venam-Beard-Laptop.jpg') }}"
                                            alt="">
                                    </a>
                                </div>
                                <div class="exclusive-item-content">
                                    <div class="exclusive--content--bottom">
                                        <h5><a href="shop-details.html">لابتوب فينام</a></h5>
                                        <a href="#"><i class="flaticon-heart"></i></a>
                                        <span>39.00ر.س</span>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>

            {{-- Pagination --}}
            <div class="pagination-wrap">
                <ul>
                    <li class="prev"><a href="#"><i class="fas fa-long-arrow-alt-right"></i> السابق</a></li>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">...</a></li>
                    <li><a href="#">10</a></li>
                    <li class="next"><a href="#">التالي <i class="fas fa-long-arrow-alt-left"></i></a></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- exclusive-collection-area-end -->
@endsection

@section('js')
@endsection

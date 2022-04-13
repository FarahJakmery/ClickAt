@extends('weblayouts.master')

@section('web_title')
    كليكات
@endsection

@section('web_content')
    <!-- top-cat-banner -->
    <div class="top--cat--banner--area">
        <div class="custom-container-two">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="top-cat-banner-item yellow mt-20 main-section">
                        <a href="shop-left-sidebar.html">
                            <div class="overlay"></div>
                            <h1>قسم الملابس</h1>\<span class="view-more">
                                عرض المزيد
                            </span>
                            <img class="img-height-l" src="img/header-section/clothes.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <div class="top-cat-banner-item dark-gray mt-20 secondry-section">
                                <a href="shop-left-sidebar.html">
                                    <div class="overlay"></div>
                                    <h1>قسم السيارات</h1>
                                    <span class="view-more">
                                        عرض المزيد
                                    </span>
                                    <img class="img-height-s" src="img/header-section/cars.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xs-12">
                            <div class="top-cat-banner-item lite-red mt-20 secondry-section">
                                <a href="shop-left-sidebar.html">
                                    <div class="overlay"></div>
                                    <h1>قسم الالكترونيات</h1>
                                    <span class="view-more">
                                        عرض المزيد
                                    </span>
                                    <img class="img-height-s" src="img/header-section/electronics.jpg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="row">
                        <div class="col-lg-12 col-xs-6">
                            <div class="top-cat-banner-item dark-gray mt-20 secondry-section">
                                <a href="shop-left-sidebar.html">
                                    <div class="overlay"></div>
                                    <h1>قسم الأثات</h1>
                                    <span class="view-more">
                                        عرض المزيد
                                    </span>
                                    <img class="img-height-s" src="img/header-section/furniture.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xs-6">
                            <div class="top-cat-banner-item lite-red mt-20 secondry-section">
                                <a href="shop-left-sidebar.html">
                                    <div class="overlay"></div>
                                    <h1>قسم الأجهزة الكهربائية</h1>
                                    <span class="view-more">
                                        عرض المزيد
                                    </span>
                                    <img class="img-height-s" src="img/header-section/ketchen.jpg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- top-cat-banner-end -->

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
                                        <img src="img/products/Beard-Trimmer.jpg" alt="">
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
                        <div class="col-lg-4 col-sm-6 grid-item grid-sizer cat-one cat-three">
                            <div class="exclusive-item mb-40">
                                <div class="exclusive-item-thumb exclusive-item-three">
                                    <a href="shop-details.html">
                                        <img src="img/products/party-dress.jpg" alt="">
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
                                        <img src="img/products/Men's-Casual-Shoes.jpg" alt="">
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
                                        <img src="img/products/Stylish-Smart-Watch.jpg" alt="">
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
                                        <img src="img/products/Beard-Trimmer.jpg" alt="">
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
                                        <img src="img/products/Venam-Beard-Laptop.jpg" alt="">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- exclusive-collection-area-end -->

    <!-- exclusive-collection-area -->
    <section class="exclusive-collection pt-100 pb-55">
        <div class="custom-container-two">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center mb-60">
                        <span class="sub-title">مجموعة حصرية</span>
                        <h2 class="title">أفضل الأسعار اشتري الآن</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6 grid-item grid-sizer cat-two cat-three">
                    <div class="exclusive-item exclusive-item-three text-center mb-40">
                        <div class="exclusive-item-thumb circle-shape">
                            <div class="ko-progress-circle data-left-time" data-progress="0"
                                data-end="mar 28, 2022 18:20:00" data-start="mar 28, 2022 10:30:00">
                                <div class="ko-circle">
                                    <div class="full ko-progress-circle__slice">
                                        <div class="ko-progress-circle__fill"></div>
                                    </div>
                                    <div class="ko-progress-circle__slice">
                                        <div class="ko-progress-circle__fill"></div>
                                        <div class="ko-progress-circle__fill ko-progress-circle__bar"></div>
                                    </div>
                                </div>
                                <div class="ko-progress-circle__overlay">
                                    <div class="most--popular--item--thumb height-100 circle-shape">
                                        <a href="#"><img src="img/products/Beard-Trimmer.jpg" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <!-- <ul class="action action-timer">
                                        <li><a href="#"><i class=" flaticon-heart"></i></a></li>
                                        <li><a href="#"><i class="flaticon-supermarket"></i></a></li>
                                        <li><a href="#"><i class="flaticon-witness"></i></a></li>
                                    </ul> -->
                        </div>
                        <div class="exclusive-item-content">
                            <h5><a href="shop-details.html">ماكينة حلاقة ذقن</a></h5>
                            <div class="exclusive--item--price">
                                <span class="new-price">29.00ر.س</span>
                            </div>
                            <div class="add-to-cart">
                                <form action="#">
                                    <div class="cart-plus-minus">
                                        <input type="text" value="2">
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
                <div class="col-lg-4 col-sm-6 grid-item grid-sizer cat-two cat-three">
                    <div class="exclusive-item exclusive-item-three text-center mb-40">
                        <div class="exclusive-item-thumb circle-shape">
                            <div class="ko-progress-circle data-left-time" data-progress="0"
                                data-end="mar 22, 2022 01:30:00" data-start="mar 12, 2022 01:30:00">
                                <div class="ko-circle">
                                    <div class="full ko-progress-circle__slice">
                                        <div class="ko-progress-circle__fill"></div>
                                    </div>
                                    <div class="ko-progress-circle__slice">
                                        <div class="ko-progress-circle__fill"></div>
                                        <div class="ko-progress-circle__fill ko-progress-circle__bar"></div>
                                    </div>
                                </div>
                                <div class="ko-progress-circle__overlay">
                                    <div class="most--popular--item--thumb height-100 circle-shape">
                                        <a href="#"><img src="img/products/party-dress.jpg" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <!-- <ul class="action action-timer">
                                        <li><a href="#"><i class=" flaticon-heart"></i></a></li>
                                        <li><a href="#"><i class="flaticon-supermarket"></i></a></li>
                                        <li><a href="#"><i class="flaticon-witness"></i></a></li>
                                    </ul> -->
                        </div>
                        <div class="exclusive-item-content">
                            <h5><a href="shop-details.html">فستان حفل</a></h5>
                            <div class="exclusive--item--price">
                                <span class="new-price">29.00ر.س</span>
                            </div>
                            <div class="add-to-cart">
                                <form action="#">
                                    <div class="cart-plus-minus">
                                        <input type="text" value="2">
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
                <div class="col-lg-4 col-sm-6 grid-item grid-sizer cat-two cat-three">
                    <div class="exclusive-item exclusive-item-three text-center mb-40">
                        <div class="exclusive-item-thumb circle-shape">
                            <div class="ko-progress-circle data-left-time" data-progress="0"
                                data-end="mar 20, 2022 01:30:00" data-start="mar 12, 2022 01:30:00">
                                <div class="ko-circle">
                                    <div class="full ko-progress-circle__slice">
                                        <div class="ko-progress-circle__fill"></div>
                                    </div>
                                    <div class="ko-progress-circle__slice">
                                        <div class="ko-progress-circle__fill"></div>
                                        <div class="ko-progress-circle__fill ko-progress-circle__bar"></div>
                                    </div>
                                </div>
                                <div class="ko-progress-circle__overlay">
                                    <div class="most--popular--item--thumb height-100 circle-shape">
                                        <a href="#"><img src="img/products/Men's-Casual-Shoes.jpg" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <!-- <ul class="action action-timer">
                                        <li><a href="#"><i class=" flaticon-heart"></i></a></li>
                                        <li><a href="#"><i class="flaticon-supermarket"></i></a></li>
                                        <li><a href="#"><i class="flaticon-witness"></i></a></li>
                                    </ul> -->
                        </div>
                        <div class="exclusive-item-content">
                            <h5><a href="shop-details.html">حذاء رجالي</a></h5>
                            <div class="exclusive--item--price">
                                <span class="new-price">29.00ر.س</span>
                            </div>
                            <div class="add-to-cart">
                                <form action="#">
                                    <div class="cart-plus-minus">
                                        <input type="text" value="2">
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
                <div class="col-lg-4 col-sm-6 grid-item grid-sizer cat-two cat-three">
                    <div class="exclusive-item exclusive-item-three text-center mb-40">
                        <div class="exclusive-item-thumb circle-shape">
                            <div class="ko-progress-circle data-left-time" data-progress="0"
                                data-end="mar 24, 2022 01:30:00" data-start="mar 19, 2022 01:30:00">
                                <div class="ko-circle">
                                    <div class="full ko-progress-circle__slice">
                                        <div class="ko-progress-circle__fill"></div>
                                    </div>
                                    <div class="ko-progress-circle__slice">
                                        <div class="ko-progress-circle__fill"></div>
                                        <div class="ko-progress-circle__fill ko-progress-circle__bar"></div>
                                    </div>
                                </div>
                                <div class="ko-progress-circle__overlay">
                                    <div class="most--popular--item--thumb height-100 circle-shape">
                                        <a href="#"><img src="img/products/Stylish-Smart-Watch.jpg" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <!-- <ul class="action action-timer">
                                        <li><a href="#"><i class=" flaticon-heart"></i></a></li>
                                        <li><a href="#"><i class="flaticon-supermarket"></i></a></li>
                                        <li><a href="#"><i class="flaticon-witness"></i></a></li>
                                    </ul> -->
                        </div>
                        <div class="exclusive-item-content">
                            <h5><a href="#">ساعة ذكية</a></h5>
                            <div class="exclusive--item--price">
                                <span class="new-price">29.00ر.س</span>
                            </div>
                            <div class="add-to-cart">
                                <form action="#">
                                    <div class="cart-plus-minus">
                                        <input type="text" value="2">
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
                <div class="col-lg-4 col-sm-6 grid-item grid-sizer cat-two cat-three">
                    <div class="exclusive-item exclusive-item-three text-center mb-40">
                        <div class="exclusive-item-thumb circle-shape">
                            <div class="ko-progress-circle data-left-time" data-progress="0"
                                data-end="mar 24, 2022 01:30:00" data-start="mar 19, 2022 01:30:00">
                                <div class="ko-circle">
                                    <div class="full ko-progress-circle__slice">
                                        <div class="ko-progress-circle__fill"></div>
                                    </div>
                                    <div class="ko-progress-circle__slice">
                                        <div class="ko-progress-circle__fill"></div>
                                        <div class="ko-progress-circle__fill ko-progress-circle__bar"></div>
                                    </div>
                                </div>
                                <div class="ko-progress-circle__overlay">
                                    <div class="most--popular--item--thumb height-100 circle-shape">
                                        <a href="#"><img src="img/products/Stylish-Smart-Watch.jpg" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <!-- <ul class="action action-timer">
                                        <li><a href="#"><i class=" flaticon-heart"></i></a></li>
                                        <li><a href="#"><i class="flaticon-supermarket"></i></a></li>
                                        <li><a href="#"><i class="flaticon-witness"></i></a></li>
                                    </ul> -->
                        </div>
                        <div class="exclusive-item-content">
                            <h5><a href="#">ساعة ذكية</a></h5>
                            <div class="exclusive--item--price">
                                <span class="new-price">29.00ر.س</span>
                            </div>
                            <div class="add-to-cart">
                                <form action="#">
                                    <div class="cart-plus-minus">
                                        <input type="text" value="2">
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
                <div class="col-lg-4 col-sm-6 grid-item grid-sizer cat-two cat-three">
                    <div class="exclusive-item exclusive-item-three text-center mb-40">
                        <div class="exclusive-item-thumb circle-shape">
                            <div class="ko-progress-circle data-left-time" data-progress="0"
                                data-end="mar 24, 2022 01:30:00" data-start="mar 19, 2022 01:30:00">
                                <div class="ko-circle">
                                    <div class="full ko-progress-circle__slice">
                                        <div class="ko-progress-circle__fill"></div>
                                    </div>
                                    <div class="ko-progress-circle__slice">
                                        <div class="ko-progress-circle__fill"></div>
                                        <div class="ko-progress-circle__fill ko-progress-circle__bar"></div>
                                    </div>
                                </div>
                                <div class="ko-progress-circle__overlay">
                                    <div class="most--popular--item--thumb height-100 circle-shape">
                                        <a href="#"><img src="img/products/Stylish-Smart-Watch.jpg" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <!-- <ul class="action action-timer">
                                        <li><a href="#"><i class=" flaticon-heart"></i></a></li>
                                        <li><a href="#"><i class="flaticon-supermarket"></i></a></li>
                                        <li><a href="#"><i class="flaticon-witness"></i></a></li>
                                    </ul> -->
                        </div>
                        <div class="exclusive-item-content">
                            <h5><a href="#">ساعة ذكية</a></h5>
                            <div class="exclusive--item--price">
                                <span class="new-price">29.00ر.س</span>
                            </div>
                            <div class="add-to-cart">
                                <form action="#">
                                    <div class="cart-plus-minus">
                                        <input type="text" value="2">
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
            </div>
        </div>
    </section>
    <!-- exclusive-collection-area-end -->

    <!-- deal-of-the-day -->
    <section class="deal-of-the-day theme-bg pt-100 pb-70">
        <div class="custom-container-two">
            <div class="row">
                <div class="custom-col-4">
                    <div class="deal-of-day-banner mb-30">
                        <a href="#"><img src="img/new-collection.jpg" alt=""></a>
                    </div>
                </div>
                <div class="custom-col-8">
                    <div class="deal-day-top">
                        <div class="deal-day-title">
                            <h4 class="title">المضاف حديثاً</h4>
                        </div>
                        <div class="view-all-deal">
                            <a href="#"><i class="flaticon-scroll"></i>رؤية المزيد</a>
                        </div>
                    </div>
                    <div class="row deal-day-active">
                        <div class="col-xl-3">
                            <div class="most-popular-viewed-item mb-30">
                                <div class="viewed-item-top">
                                    <div class="most--popular--item--thumb mb-20">
                                        <a href="#"><img src="img/products/Beard-Trimmer.jpg" alt=""></a>
                                    </div>
                                    <div class="super-deal-content">
                                        <h6><a href="shop-details.html">ماكينة حلاقة الذقن</a></h6>
                                        <p>US $ 49.00</p>
                                        <a class="fav" href="#"><i class=" flaticon-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="most-popular-viewed-item mb-30">
                                <div class="viewed-item-top">
                                    <div class="most--popular--item--thumb mb-20">
                                        <a href="#"><img src="img/products/Men's-Casual-Shoes.jpg" alt=""></a>
                                    </div>
                                    <div class="super-deal-content">
                                        <h6><a href="shop-details.html">حذاء رجالي</a></h6>
                                        <p>US $ 17.00</p>
                                        <a class="fav" href="#"><i class=" flaticon-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="most-popular-viewed-item mb-30">
                                <div class="viewed-item-top">
                                    <div class="most--popular--item--thumb mb-20">
                                        <a href="#"><img src="img/products/Stylish-Smart-Watch.jpg" alt=""></a>
                                    </div>
                                    <div class="super-deal-content">
                                        <h6><a href="shop-details.html">ساعة ذكية</a></h6>
                                        <p>US $ 17.00</p>
                                        <a class="fav" href="#"><i class=" flaticon-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="most-popular-viewed-item mb-30">
                                <div class="viewed-item-top">
                                    <div class="most--popular--item--thumb mb-20">
                                        <a href="#"><img src="img/products/party-dress.jpg" alt=""></a>
                                    </div>
                                    <div class="super-deal-content">
                                        <h6><a href="shop-details.html">فستان حفل</a></h6>
                                        <p>US $ 31.00</p>
                                        <a class="fav" href="#"><i class=" flaticon-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="most-popular-viewed-item mb-30">
                                <div class="viewed-item-top">
                                    <div class="most--popular--item--thumb mb-20">
                                        <a href="#"><img src="img/products/Venam-Beard-Laptop.jpg" alt=""></a>
                                    </div>
                                    <div class="super-deal-content">
                                        <h6><a href="shop-details.html">لابتوب فينام</a></h6>
                                        <p>US $ 17.00</p>
                                        <a class="fav" href="#"><i class=" flaticon-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- deal-of-the-day-end -->

    <!-- testimonial-area -->
    <section class="testimonial-area pt-100 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center mb-60">
                        <span class="sub-title">أكواد حصرية</span>
                        <h2 class="title">احصل على خصم من المتاجر التالية</h2>
                    </div>
                </div>
            </div>
            <div class="row testimonial-active">
                <div class="col-xl-4">
                    <div class="testimonial-item text-center">
                        <div class="testi-avatar-img mb-20">
                            <img src="img/logo/amazon.jpg" alt="">
                        </div>
                        <div class="testi-avatar-info">
                            <h5>أمازون</h5>
                            <a class="copy-code" herf="#">انسخ الرمز</a>
                            <input type="hidden" value="1234" id="myInput">
                            <span class="copy-messege">
                                <i class="fa fa-tr"></i>
                                تم نسخ الرمز</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="testimonial-item text-center">
                        <div class="testi-avatar-img mb-20">
                            <img src="img/logo/ali-baba.jpg" alt="">
                        </div>
                        <div class="testi-avatar-info">
                            <h5>علي بابا</h5>
                            <a class="copy-code" herf="#">انسخ الرمز</a>
                            <input type="hidden" value="3425" id="myInput">
                            <span class="copy-messege">تم نسخ الرمز</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="testimonial-item text-center">
                        <div class="testi-avatar-img mb-20">
                            <img src="img/logo/Ali-express.png" alt="">
                        </div>
                        <div class="testi-avatar-info">
                            <h5>علي اكسبريس</h5>
                            <a class="copy-code" herf="#">انسخ الرمز</a>
                            <input type="hidden" value="23654" id="myInput">
                            <span class="copy-messege">تم نسخ الرمز</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="testimonial-item text-center">
                        <div class="testi-avatar-img mb-20">
                            <img src="img/logo/noon.png" alt="">
                        </div>
                        <div class="testi-avatar-info">
                            <h5>نون</h5>
                            <a class="copy-code" herf="#">انسخ الرمز</a>
                            <input type="hidden" value="32451" id="myInput">
                            <span class="copy-messege">تم نسخ الرمز</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial-area-end -->

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
                            <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                                النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى
                                زيادة عدد الحروف التى يولدها التطبيق.</p>
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
                            <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                                النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى
                                زيادة عدد الحروف التى يولدها التطبيق.</p>
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
                            <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                                النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى
                                زيادة عدد الحروف التى يولدها التطبيق.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- features-area-end -->
@endsection

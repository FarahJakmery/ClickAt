@extends('weblayouts.master')

@section('web_title')
    كليكات
@endsection

@section('web_content')
    <!-- Main Categories Section -->
    <div class="top--cat--banner--area">
        <div class="custom-container-two">
            <div class="row justify-content-center">
                @foreach ($mainCategories->take(5) as $mainCategory)
                    @if ($loop->first)
                        <div class="col-md-4">
                            <div class="top-cat-banner-item yellow mt-20 main-section">
                                <a href="shop-left-sidebar.html">
                                    <div class="overlay"></div>
                                    <h1>{{ $mainCategory->translate('ar')->category_name }}</h1>\
                                    <span class="view-more">
                                        عرض المزيد
                                    </span>
                                    <img class="img-height-l" src="{{ asset($mainCategory->photo_name) }}" alt="">
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="col-md-4 col-sm-6">

                            <div class="row">

                                <div class="col-lg-12 col-xs-12">
                                    <div class="top-cat-banner-item dark-gray mt-20 secondry-section">
                                        <a href="shop-left-sidebar.html">
                                            <div class="overlay"></div>
                                            <h1>{{ $mainCategory->translate('ar')->category_name }}</h1>
                                            <span class="view-more">
                                                عرض المزيد
                                            </span>
                                            <img class="img-height-s" src="{{ asset($mainCategory->photo_name) }}"
                                                alt="">
                                        </a>
                                    </div>
                                </div>

                                {{-- <div class="col-lg-12 col-xs-12">
                                    <div class="top-cat-banner-item lite-red mt-20 secondry-section">
                                        <a href="shop-left-sidebar.html">
                                            <div class="overlay"></div>
                                            <h1>{{ $mainCategory->translate('ar')->category_name }}</h1>
                                            <span class="view-more">
                                                عرض المزيد
                                            </span>
                                            <img class="img-height-s" src="{{ asset($mainCategory->photo_name) }}"
                                                alt="">
                                        </a>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <!-- Main Categories Section-end -->

    <!-- External Products Section -->
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
                        @foreach ($mainCategories as $mainCategory)
                            <button class="" data-filter=".cat-{{ $mainCategory->id }}">
                                {{ $mainCategory->translate('ar')->category_name }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="row exclusive-active">
                        @foreach ($mainCategories as $mainCategory)
                            <div class="col-lg-4 col-sm-6 grid-item grid-sizer cat-{{ $mainCategory->id }}">
                                @foreach ($mainCategory->products as $product)
                                    <div class="exclusive-item mb-40">
                                        <div class="exclusive-item-thumb exclusive-item-three" data-date="48:00:00">
                                            <a href="{{ $product->url }}">
                                                <img src="{{ asset($product->photo_name) }}" alt="">
                                            </a>
                                        </div>
                                        <div class="exclusive-item-content">
                                            <div class="exclusive--content--bottom">
                                                <h5>
                                                    <a href="{{ $product->url }}">
                                                        {{ $product->translate('ar')->product_name }}
                                                    </a>
                                                </h5>
                                                <a href="#">
                                                    <i class="flaticon-heart"></i>
                                                </a>
                                                <span>{{ $product->price }}ر.س</span>
                                            </div>
                                            <div class="exclusive--content--description">
                                                <p>
                                                    {{ $product->translate('ar')->description }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- External Products Section-end -->

    <!-- Fast Product Section -->
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
                @foreach ($fastSellingProducts as $fastSellingProduct)
                    <div class="col-lg-4 col-sm-6 grid-item grid-sizer cat-two cat-three">
                        <div class="exclusive-item exclusive-item-three text-center mb-40">
                            <div class="exclusive-item-thumb circle-shape">
                                <div class="ko-progress-circle data-left-time" data-progress="0"
                                    data-end="{{ $fastSellingProduct->expiry_date }}"
                                    data-start="{{ $fastSellingProduct->product_date }}">
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
                                                <img src="{{ asset($fastSellingProduct->photo_name) }}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="exclusive-item-content">
                                {{-- Name --}}
                                <h5>
                                    <a href="#">
                                        {{ $fastSellingProduct->translate('ar')->name }}
                                    </a>
                                </h5>
                                {{-- Current Price --}}
                                <div class="exclusive--item--price">
                                    <span class="new-price">
                                        {{ $fastSellingProduct->max_price }}ر.س
                                    </span>
                                    <input type="hidden" class="max_price"
                                        value="{{ $fastSellingProduct->max_price }}">
                                </div>
                                {{-- Description --}}
                                <div class="exclusive--content--description">
                                    <p class="fast-sell">
                                        {{ $fastSellingProduct->translate('ar')->description }}
                                    </p>
                                </div>
                                {{-- Add To Cart Button & Quantity --}}
                                <div class="add-to-cart">
                                    <form action="#">
                                        <div class="cart-plus-minus">
                                            <input type="text" name="quantity" id="quantity" value="1"
                                                max="{{ $fastSellingProduct->quantity }}">
                                        </div>
                                        <button class="btn addToCart" data-product_id="{{ $fastSellingProduct->id }}">
                                            <i class="flaticon-supermarket"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            {{-- Timer --}}
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
        </div>
    </section>
    <!-- Fast Product Section-end -->

    <!-- deal-of-the-day -->
    <section class="deal-of-the-day theme-bg pt-100 pb-70">
        <div class="custom-container-two">
            <div class="row">
                <div class="custom-col-4">
                    <div class="deal-of-day-banner mb-30">
                        <a href="#"><img src="{{ URL::asset('Web/assets/img/new-collection.jpg') }}" alt=""></a>
                    </div>
                </div>
                <div class="custom-col-8">
                    <div class="deal-day-top">
                        <div class="deal-day-title">
                            <h4 class="title">المضاف حديثاً</h4>
                        </div>
                        <div class="view-all-deal">
                            <a href="#">
                                <i class="flaticon-scroll"></i>
                                رؤية المزيد
                            </a>
                        </div>
                    </div>
                    <div class="row deal-day-active">
                        @foreach ($products as $product)
                            <div class="col-xl-3">
                                <div class="most-popular-viewed-item mb-30">
                                    <div class="viewed-item-top">
                                        <div class="most--popular--item--thumb mb-20">
                                            <a href="{{ $product->url }}">
                                                <img src="{{ asset($product->photo_name) }}" alt=""></a>
                                        </div>
                                        <div class="super-deal-content">
                                            <h6>
                                                <a href="shop-details.html">
                                                    {{ $product->translate('ar')->product_name }}
                                                </a>
                                            </h6>
                                            <p>{{ $product->price }}ر.س</p>
                                            <a class="fav addtowishlist" href="#" data-product_id="{{ $product->id }}">
                                                <i class=" flaticon-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- deal-of-the-day-end -->

    <!-- Code Section -->
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
                @foreach ($Codes as $Code)
                    <div class="col-xl-4">
                        <div class="testimonial-item text-center">
                            <div class="testi-avatar-img mb-20">
                                <img src="{{ asset($Code->photo_name) }}" alt="">
                            </div>
                            <div class="testi-avatar-info">
                                <h5>{{ $Code->translate('ar')->codeproduct_name }}</h5>
                                <a class="copy-code" herf="#">انسخ الرمز</a>
                                <input type="hidden" value="{{ $Code->code }}" id="myInput">
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
    <!-- Code Section-end -->

    <!-- features-area -->
    {{-- <section class="features-area theme-bg pt-100 pb-70">
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
                            <h5>{{ $feature->translate('ar')->feature1 }}</h5>
                            <p>
                                {{ $feature->translate('ar')->text1 }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="features-wrap-item mb-30">
                        <div class="features-icon">
                            <i class="flaticon-secure-payment"></i>
                        </div>
                        <div class="features-content">
                            <h5>{{ $feature->translate('ar')->feature2 }}</h5>
                            <p>
                                {{ $feature->translate('ar')->text2 }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="features-wrap-item mb-30">
                        <div class="features-icon">
                            <i class="flaticon-24-hours-support"></i>
                        </div>
                        <div class="features-content">
                            <h5>{{ $feature->translate('ar')->feature3 }}</h5>
                            <p>
                                {{ $feature->translate('ar')->text2 }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- features-area-end -->
@endsection

@section('js')
    {{-- This Script Is To Add To Cart --}}
    <script>
        $(document).ready(function() {
            $('.addToCart').each(function(ele) {
                $(this).on('click', function(ele) {
                    ele.preventDefault();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var productId = $(this).data('product_id');
                    var quantity = $(this).siblings().find('input').val();
                    var maxPrice = $(this).parents('.add-to-cart').siblings().find('.max_price')
                        .val();
                    console.log(productId);
                    console.log(quantity);
                    console.log(maxPrice);

                    $.ajax({
                        type: "POST",
                        url: "{{ route('user.addToCart') }}",
                        data: {
                            product_id: productId,
                            quantity: quantity,
                            max_price: maxPrice
                        },
                        dataType: "json",
                        success: function(response) {
                            console.log(response);

                        }
                    });
                    console.log(data);
                });
            })

        });
    </script>

    {{-- This Script is to Add to Wishlist --}}
    <script>
        $(document).ready(function() {

            $(document).on('click', '.addtowishlist', function(e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('user.AddProductToWishlist') }}",
                    data: {
                        'productId': $(this).attr('data-product_id'),
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                    }
                });
            });

        });
    </script>
@endsection

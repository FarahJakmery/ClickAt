@extends('weblayouts.master')

@section('web_title')
    كليكات
@endsection

@section('web_content')
    <!-- Main Categories Section -->
    <div class="top--cat--banner--area">
        <div class="custom-container-two">
            <div class="row justify-content-center">

                @php
                    $MainCategories = \App\Models\Mcategory::with('products')->get();
                    $array = [];
                    foreach ($MainCategories as $MainCategory) {
                        $productcount = count($MainCategory['products']);
                        if ($productcount != 0) {
                            array_push($array, $MainCategory);
                        }
                    }
                    $i = 0;
                @endphp

                @foreach ($array as $mainCategory)
                    @if ($loop->first)
                        <div class="col-md-4">
                            <div class="top-cat-banner-item yellow mt-20 main-section">
                                <a href="{{ route('user.showProductsForMainCategory', $mainCategory->id) }}">
                                    <div class="overlay"></div>
                                    <h1>{{ $mainCategory->translate('ar')->category_name }}</h1>\
                                    <span class="view-more">
                                        عرض المزيد
                                    </span>
                                    <img class="img-height-l" src="{{ asset($mainCategory->photo_name) }}" alt="">
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach

                <div class="col-md-8 col-sm-6">
                    <div class="row">
                        @foreach ($array as $mainCategory)
                            @if ($loop->first)
                            @else
                                @if ($i !== 5)
                                    <div class="col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-lg-12 col-xs-12">
                                                <div class="top-cat-banner-item dark-gray mt-20 secondry-section">
                                                    <a
                                                        href="{{ route('user.showProductsForMainCategory', $mainCategory->id) }}">
                                                        <div class="overlay"></div>
                                                        <h1>{{ $mainCategory->translate('ar')->category_name }}</h1>
                                                        <span class="view-more">
                                                            عرض المزيد
                                                        </span>
                                                        <img class="img-height-s"
                                                            src="{{ asset($mainCategory->photo_name) }}" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $i++;
                                    @endphp
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
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
                        <h2 class="title">منتجات كليكات</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="product-menu mb-60">
                        <button class="active" data-filter="*">الكل</button>
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
                            @foreach ($mainCategory->products as $product)
                                <div class="col-lg-4 col-sm-6 grid-item grid-sizer cat-{{ $mainCategory->id }}">

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
                                                @if (Auth::user() == null)
                                                    <a href="#" class="like addtowishlist"
                                                        data-product_id="{{ $product->id }}">
                                                        <i class="flaticon-heart"></i>
                                                    </a>
                                                @else
                                                    @if (DB::table('product_wishlist')->where('product_id', $product->id)->where('user_id', Auth::user()->id)->exists())
                                                        <a href="#" class="like active addtowishlist"
                                                            data-product_id="{{ $product->id }}">
                                                            <i class="flaticon-heart"></i>
                                                        </a>
                                                    @else
                                                        <a href="#" class="like  addtowishlist"
                                                            data-product_id="{{ $product->id }}">
                                                            <i class="flaticon-heart"></i>
                                                        </a>
                                                    @endif
                                                @endif
                                                <span>{{ $product->price }} ر.س</span>
                                            </div>
                                            <div class="exclusive--content--description">
                                                <p>
                                                    {{ $product->translate('ar')->description }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
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
            <?php
            $i = 0;
            ?>
            <div class="row justify-content-center">
                @foreach ($fastSellingProducts->take(3) as $fastSellingProduct)
                    <div class="col-lg-4 col-md-6 grid-item grid-sizer cat-two cat-three">
                        <div class="exclusive-item exclusive-item-three text-center mb-40">
                            <div class="exclusive-item-thumb circle-shape">

                                <div class="ko-progress-circle data-left-time" data-progress="90"
                                    data-end="{{ $fastSellingProduct->expiry_date }}"
                                    data-start="{{ $fastSellingProduct->product_date }}"
                                    data-diff="{{ $res[$i]['totalHoursDiff'] }}"
                                    data-maxprice="{{ $fastSellingProduct->max_price }}"
                                    data-minprice="{{ $fastSellingProduct->min_price }}"
                                    data-decresetime="{{ $res[$i]['secound'] }}"
                                    data-decreaseprice="{{ $res[$i]['total_for_one_item'] }}">

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
                                        <span> {{ $fastSellingProduct->max_price }}</span>ر.س
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

                                {{-- Add To WishList Button --}}
                                @if (Auth::user() == null)
                                    <div class="add-to-wishlist">
                                        <a href="#" class="like addFastProductToWishlist"
                                            data-product_id="{{ $fastSellingProduct->id }}">
                                            <i class="flaticon-heart"></i>
                                        </a>
                                    </div>
                                @else
                                    @if (DB::table('fastproduct_wishlist')->where('fastproduct_id', $fastSellingProduct->id)->where('user_id', Auth::user()->id)->exists())
                                        <div class="add-to-wishlist">
                                            <a href="#" class="like active addFastProductToWishlist"
                                                data-product_id="{{ $fastSellingProduct->id }}">
                                                <i class="flaticon-heart"></i>
                                            </a>
                                        </div>
                                    @else
                                        <div class="add-to-wishlist">
                                            <a href="#" class="like addFastProductToWishlist"
                                                data-product_id="{{ $fastSellingProduct->id }}">
                                                <i class="flaticon-heart"></i>
                                            </a>
                                        </div>
                                    @endif
                                @endif

                                {{-- Add To Cart Button & Quantity --}}
                                @if (!Auth::user() == null)
                                    @if (\App\Models\Cart::where('product_id', '=', $fastSellingProduct->id)->where('user_id', '=', Auth::user()->id)->exists())
                                        <div class="in-cart">
                                            <p>هذا المنتج موجود مسبقاً في العربة</p>
                                        </div>
                                    @else
                                        <div class="add-to-cart">
                                            <form action="#">
                                                <div class="cart-plus-minus">
                                                    <input type="text" name="quantity" id="quantity" value="1"
                                                        max="{{ $fastSellingProduct->quantity }}">
                                                </div>
                                                <button class="btn addToCart"
                                                    data-product_id="{{ $fastSellingProduct->id }}">
                                                    <i class="flaticon-supermarket"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                @else
                                    @if (Cookie::get($fastSellingProduct->id) !== null)
                                        <div class="in-cart">
                                            <p>هذا المنتج موجود مسبقاً في العربة</p>
                                        </div>
                                    @else
                                        <div class="add-to-cart">
                                            <form action="#">
                                                <div class="cart-plus-minus">
                                                    <input type="text" name="quantity" id="quantity" value="1"
                                                        max="{{ $fastSellingProduct->quantity }}">
                                                </div>
                                                <button class="btn addToCart"
                                                    data-product_id="{{ $fastSellingProduct->id }}">
                                                    <i class="flaticon-supermarket"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                @endif

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
                    <?php
                    $i++;
                    ?>
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
                    </div>
                    <div class="row deal-day-active">
                        @foreach ($products->take(10) as $product)
                            <div class="col-xl-3">
                                <div class="most-popular-viewed-item mb-30">
                                    <div class="viewed-item-top">
                                        <div class="most--popular--item--thumb mb-20">
                                            <a href="{{ $product->url }}">
                                                <img src="{{ asset($product->photo_name) }}" alt="">
                                            </a>
                                        </div>
                                        <div class="super-deal-content">
                                            <h6>
                                                <a href="shop-details.html">
                                                    {{ $product->translate('ar')->product_name }}
                                                </a>
                                            </h6>
                                            <p>{{ $product->price }} ر.س</p>
                                            <a class="fav like" href="#">
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
                                <a class="copy-code" herf="#">انسخ الكود</a>
                                <input type="hidden" value="{{ $Code->code }}" id="myInput">
                                <span class="copy-messege">
                                    <i class="fa fa-tr"></i>
                                    تم نسخ الكود
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
    </section>
    <!-- features-area-end -->
@endsection

@section('js')
    {{-- This Script Is To Add To Cart --}}
    <script>
        $(document).ready(function() {
            $('.addToCart').each(function() {
                $(this).on('click', function(e) {
                    e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var el, productName, productImg, productId, quantity, maxPrice = "";

                    el = $(this).parents('.add-to-cart');
                    productName = el.parent().find('h5 a').text();
                    productImg = el.parents(".exclusive-item").find('.exclusive-item-thumb img')
                        .attr('src');
                    productId = $(this).data('product_id');
                    quantity = parseInt($(this).siblings().find('input').val());
                    maxPrice = parseInt(el.siblings().find('.new-price span').text());
                    maxPrice = maxPrice.toString();

                    $.ajax({
                        type: "POST",
                        url: "{{ route('addToCart') }}",
                        data: {
                            product_id: productId,
                            quantity: quantity,
                            max_price: maxPrice
                        },

                        success: function(response) {
                            var shopBag_count, temp, parent, old_price, current_price,
                                new_price, product = "";
                            /**************************/
                            /* inc count of Shop Bag */
                            shopBag_count = $(
                                    '.menu-wrap .header-shop-cart a span.cart-count')
                                .text();
                            shopBag_count = Number(shopBag_count) + 1;
                            $('.menu-wrap .header-shop-cart a span.cart-count').text(
                                shopBag_count);
                            $('.mobile-menu .header-shop-cart a span.cart-count').text(
                                shopBag_count);

                            /***************************/
                            /* remove Add to Cart Btn */
                            temp = `
                                <div class="in-cart">
                                    <p>هذا المنتج موجود مسبقاً في العربة</p>
                                </div>`;
                            parent = el.parent();
                            el.remove();
                            parent.append(temp);

                            /****************************/
                            /* add product to Shop Bag And Change Total Price */
                            old_price = parseInt($('.header-shop-cart ul.minicart')
                                .find('.total-price span:last-child span').text()
                                .replace(',', ''));
                            current_price = quantity * parseInt(maxPrice);
                            new_price = old_price + current_price;

                            function addCommas(nStr) {
                                nStr += '';
                                var x = nStr.split('.');
                                var x1 = x[0];
                                var x2 = x.length > 1 ? '.' + x[1] : '';
                                var rgx = /(\d+)(\d{3})/;
                                while (rgx.test(x1)) {
                                    x1 = x1.replace(rgx, '$1' + ',' + '$2');
                                }
                                return x1 + x2;
                            }

                            new_price = addCommas(new_price);
                            $('.header-shop-cart ul.minicart').find(
                                '.total-price span:last-child span').text(new_price);

                            $('.header-shop-cart ul.minicart').find('li.empty-cart')
                                .remove();
                            current_price = current_price.toString();
                            product = `
                                <li class="d-flex align-items-start" data-id="${productId}">
                                    <div class="cart-img">
                                        <a href="#">
                                            <img src="${productImg}" alt="">
                                        </a>
                                    </div>

                                    <div class="cart-content">
                                        <h4>
                                            <a href="#">${productName}</a>
                                        </h4>

                                        <div class="cart-price">
                                            <span class="new">
                                                <span>${current_price.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")}</span> ر.س
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            `;
                            $('.header-shop-cart ul.minicart').prepend(product);
                        }
                    });

                });
            })
        });
    </script>

    {{-- This Script is to Add to Wishlist For External Products --}}
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

    {{-- This Script Is To Add To Wishlist For Fast Products --}}
    <script>
        $(document).ready(function() {

            $(document).on('click', '.addFastProductToWishlist', function(e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('user.AddFastProductToWishlist') }}",
                    data: {
                        'FastProductId': $(this).attr('data-product_id'),
                        'FastProductPrice': $(this).parent().siblings('.exclusive--item--price')
                            .find('.new-price span').text(),
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

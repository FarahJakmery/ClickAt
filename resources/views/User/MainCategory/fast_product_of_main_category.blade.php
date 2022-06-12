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
                            <?php
                            $i = 0;
                            ?>
                            @foreach ($MainCategory->fastproducts as $fastproduct)
                                @if (!DB::table('fastproducts')->where('fastproduct_id', $fastproduct->id)->where('status_for_show', '=', 1))
                                    <div class="col-lg-4 col-sm-6 grid-item grid-sizer cat-two cat-three">
                                        <div class="exclusive-item exclusive-item-three text-center mb-40">
                                            <div class="exclusive-item-thumb circle-shape">
                                                <div class="ko-progress-circle data-left-time" data-progress="90"
                                                    data-end="{{ $fastproduct->expiry_date }}"
                                                    data-start="{{ $fastproduct->product_date }}"
                                                    data-diff="{{ $res[$i]['totalHoursDiff'] }}"
                                                    data-maxprice="{{ $fastproduct->max_price }}"
                                                    data-minprice="{{ $fastproduct->min_price }}"
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
                                                        <span> {{ $fastproduct->max_price }}</span>ر.س
                                                    </span>
                                                    <input type="hidden" id="max_price"
                                                        value="{{ $fastproduct->max_price }}">
                                                </div>

                                                {{-- Description --}}
                                                <div class="exclusive--content--description">
                                                    <p class="fast-sell">
                                                        {{ $fastproduct->translate('ar')->description }}
                                                    </p>
                                                </div>

                                                {{-- Add To WishList Button --}}
                                                @if (Auth::user() == null)
                                                    <div class="add-to-wishlist">
                                                        <a href="#" class="like addtowishlist"
                                                            data-product_id="{{ $fastproduct->id }}">
                                                            <i class="flaticon-heart"></i>
                                                        </a>
                                                    </div>
                                                @else
                                                    @if (DB::table('fastproduct_wishlist')->where('fastproduct_id', $fastproduct->id)->where('user_id', Auth::user()->id)->exists())
                                                        <div class="add-to-wishlist">
                                                            <a href="#" class="like active addtowishlist"
                                                                data-product_id="{{ $fastproduct->id }}">
                                                                <i class="flaticon-heart"></i>
                                                            </a>
                                                        </div>
                                                    @else
                                                        <div class="add-to-wishlist">
                                                            <a href="#" class="like addtowishlist"
                                                                data-product_id="{{ $fastproduct->id }}">
                                                                <i class="flaticon-heart"></i>
                                                            </a>
                                                        </div>
                                                    @endif
                                                @endif

                                                {{-- Add To Cart Button & Quantity --}}
                                                @if (!Auth::user() == null)
                                                    @if (\App\Models\Cart::where('product_id', '=', $fastproduct->id)->where('user_id', '=', Auth::user()->id)->exists())
                                                        <div class="in-cart">
                                                            <p>هذا المنتج موجود مسبقاً في العربة</p>
                                                        </div>
                                                    @else
                                                        <div class="add-to-cart">
                                                            <form action="#">
                                                                <div class="cart-plus-minus">
                                                                    <input type="text" name="quantity" id="quantity"
                                                                        value="1" max="{{ $fastproduct->quantity }}">
                                                                </div>
                                                                <button class="btn addToCart"
                                                                    data-product_id="{{ $fastproduct->id }}">
                                                                    <i class="flaticon-supermarket"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    @endif
                                                @else
                                                    @if (Cookie::get($fastproduct->id) !== null)
                                                        <div class="in-cart">
                                                            <p>هذا المنتج موجود مسبقاً في العربة</p>
                                                        </div>
                                                    @else
                                                        <div class="add-to-cart">
                                                            <form action="#">
                                                                <div class="cart-plus-minus">
                                                                    <input type="text" name="quantity" id="quantity"
                                                                        value="1" max="{{ $fastproduct->quantity }}">
                                                                </div>
                                                                <button class="btn addToCart"
                                                                    data-product_id="{{ $fastproduct->id }}">
                                                                    <i class="flaticon-supermarket"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    @endif
                                                @endif

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
                                @endif
                                <?php
                                $i++;
                                ?>
                            @endforeach
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
    <!--{{-- This Script Is To Add To Cart --}}-->
    <!--  <script>
        -- >
        <
        !--$(document).ready(function() {
            -- >
            <
            !--$('.addToCart').each(function() {
                    -- >
                    <
                    !--$(this).on('click', function(e) {
                        -- >
                        <
                        !--e.preventDefault();
                        -- >

                        <
                        !--$.ajaxSetup({
                            -- >
                            <
                            !--headers: {
                                -- >
                                <
                                !--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                        'content') -- >
                                    <
                                    !--
                            }-- >
                            <
                            !--
                        });
                        -- >

                        <
                        !--
                        var productId = $(this).data('product_id');
                        -- >
                        <
                        !--
                        var quantity = $(this).siblings().find('input').val();
                        -- >
                        <
                        !--
                        var maxPrice = $(this).parents('.add-to-cart').siblings().find(-- >
                            <
                            !--'.new-price span').text();
                        -- >
                        <
                        !--console.log(productId);
                        -- >
                        <
                        !--console.log(quantity);
                        -- >
                        <
                        !--console.log(maxPrice);
                        -- >

                        <
                        !--$.ajax({
                            -- >
                            <
                            !--type: "POST",
                            -- >
                            <
                            !--url: "{{ route('addToCart') }}",
                            -- >
                            <
                            !--data: {
                                -- >
                                <
                                !--product_id: productId,
                                -- >
                                <
                                !--quantity: quantity,
                                -- >
                                <
                                !--max_price: maxPrice-- >
                                    <
                                    !--
                            },
                            -- >
                            <
                            !--dataType: "json",
                            -- >
                            <
                            !--success: function(response) {
                                    -- >
                                    <
                                    !--console.log(response);
                                    -- >
                                    <
                                    !--console.log(data);
                                    -- >
                                    <
                                    !--
                                    var countFirstEle = $(-- >
                                            <
                                            !--'.header-shop-cart:first a span.cart-count') -- >
                                        <
                                        !--
                                    var countAll = $('.header-shop-cart a span.cart-count') -- >
                                        // console.log(count.text())
                                        // console.log(parseInt(count.text()) + parseInt(quantity))
                                        <
                                        !--
                                    var cartQuantity = parseInt(countFirstEle.text()) + -- >
                                        <
                                        !--parseInt(quantity);
                                    -- >
                                    // if (cartQuantity > 99){
                                    //     countAll.text("+99")
                                    //     countAll.css({width : '27px'})
                                    // }else{
                                    <
                                    !--countAll.text(parseInt(countFirstEle.text()) + parseInt(
                                            -- >
                                            <
                                            !--quantity)) -- >
                                        // }
                                        <
                                        !--
                                }-- >
                                <
                                !--
                        });
                        -- >

                        <
                        !--
                    });
                    -- >
                    <
                    !--
                }) -- >
                <
                !--
        });
        -- >
        <
        !--
    </script>-->

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
                    maxPrice = el.siblings().find('.new-price span').text();

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

                            console.log(old_price)
                            console.log(current_price)
                            console.log(new_price)

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
                                                <span>${maxPrice.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")}</span> ر.س
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

    {{-- This Script Is To Add To Wishlist --}}
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
                    url: "{{ route('user.AddFastProductToWishlist') }}",
                    data: {
                        'FastProductId': $(this).attr('data-product_id'),
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

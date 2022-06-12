@extends('weblayouts.master')

@section('web_title')
    العربة
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
                        <h2>العربة</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.home') }}">الرئيسية</a></li>
                                <li class="breadcrumb-item active" aria-current="page">العربة</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    @if (Session::get('fail'))
        <div class="alert alert-danger">
            {{ Session::get('fail') }}
        </div>
    @endif

    @if (count($fastProduct_detailss) == 0)
        <!-- shop-cart-area -->
        <section class="shop-cart-area wishlist-area pt-100 pb-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="empty-cart">
                            <img src="{{ URL::asset('Web/assets/img/icon/cart.png') }}" alt="empty-cart">
                            <p>لا يوجد منتجات مضافة الى العربة</p>
                        </div>
                        <div class="shop-cart-bottom mt-20">
                            <div class="row">
                                <div class="col-md-7">

                                </div>
                                <div class="col-md-5">
                                    <div class="continue-shopping">
                                        <a href="{{ route('user.FastSellingProducts.index') }}"
                                            class="btn">متابعة التسوق</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-8">
                        <aside class="shop-cart-sidebar">
                            <div class="shop-cart-widget">
                                <h6 class="title">إجمالي العربة</h6>
                                <form action="#">
                                    <ul>

                                        <li class="cart-total-amount"><span>الاجمالي :</span> <span
                                                class="sub-price amount">0.00ر.س</span></li>
                                    </ul>
                                    <button class="btn">تأكيد العملية</button>
                                </form>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- shop-cart-area-end -->
    @else
        <!-- shop-cart-area -->
        <section class="shop-cart-area wishlist-area pt-100 pb-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="table-responsive-xl">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail"></th>
                                        <th class="product-name">المنتج</th>
                                        <th class="product-price">السعر</th>
                                        <th class="product-quantity">الكمية</th>
                                        <th class="product-subtotal">السعر الكلي</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($fastProduct_detailss as $fastProducts)
                                        <tr>

                                            <td class="product-thumbnail">
                                                <a href="#" class="wishlist-remove removeFromCart"
                                                    data-product_id="{{ $fastProducts['fast_product']->id }}">
                                                    <i class="flaticon-cancel-1"></i>
                                                </a>
                                                <a href="shop-details.html">
                                                    <img src="{{ asset($fastProducts['fast_product']->photo_name) }}"
                                                        alt="">
                                                </a>
                                            </td>

                                            <td class="product-name">
                                                <h4>
                                                    <a href="shop-details.html">
                                                        {{ $fastProducts['fast_product']->translate('ar')->name }}
                                                    </a>
                                                </h4>
                                            </td>
                                            {{-- @endforeach --}}


                                            <td class="product-price">
                                                <span>{{ number_format($fastProducts['price']) }}</span> ر.س
                                            </td>
                                            <td class="product-quantity">
                                                <div class="cart-plus">
                                                    <form action="#">
                                                        <div class="cart-plus-minus">
                                                            <input type="text"
                                                                value="{{ $fastProducts['fast_product_quantity'] }}"
                                                                max="{{ $fastProducts['fast_product']['quantity'] }}"
                                                                disabled>
                                                        </div>
                                                    </form>
                                                </div>
                                            </td>

                                            <td class="product-subtotal">
                                                <span>{{ number_format($fastProducts['all_price']) }}</span> ر.س
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="shop-cart-bottom mt-20">
                            <div class="row">
                                <div class="col-md-7">

                                </div>
                                <div class="col-md-5">
                                    <div class="continue-shopping">
                                        <a href="{{ route('user.FastSellingProducts.index') }}" class="btn">
                                            متابعة التسوق
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-8">
                        <aside class="shop-cart-sidebar">
                            <div class="shop-cart-widget">
                                <h6 class="title">إجمالي العربة</h6>
                                <form action="{{ route('user.checkoutpage') }}">
                                    <ul>
                                        <li class="cart-total-amount">
                                            <span>الاجمالي :</span>
                                            <span>
                                                <span>{{ number_format($price_for_all_thing) }}</span>
                                                ر.س
                                            </span>
                                        </li>
                                    </ul>
                                    <a href="#">
                                        <button class="btn">تأكيد العملية</button>
                                    </a>
                                </form>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- shop-cart-area-end -->
    @endif
@endsection


@section('js')
    <script>
        $(document).ready(function() {

            /* remove From Cart */
            $(document).on('click', '.removeFromCart', function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var el_tr_parent = $(this).parents('tr');
                var product_id = $(this).attr('data-product_id');
                var product_price = parseInt($(this).parents('tr').find('.product-subtotal span').text()
                    .replace(',', ''));

                $.ajax({
                    type: "delete",
                    url: "{{ route('user.removeFromCart') }}",
                    data: {
                        'product_id': $(this).attr('data-product_id'),
                    },
                    success: function(data) {
                        /**************************/
                        /* Remove Row From Table */
                        el_tr_parent.remove();

                        /*********************************/
                        /* Remove Product From MiniCart */
                        $('.header-shop-cart ul.minicart').find('li').each(function() {
                            if ($(this).attr('data-id') == product_id) {
                                $(this).remove();
                            }
                        });

                        /**************************************/
                        /* Dec Number Of Product In MiniCart */
                        var shopBag_count = $('.menu-wrap .header-shop-cart a span.cart-count')
                            .text();
                        shopBag_count = Number(shopBag_count) - 1;
                        $('.menu-wrap .header-shop-cart a span.cart-count').text(shopBag_count);
                        $('.mobile-menu .header-shop-cart a span.cart-count').text(
                            shopBag_count);

                        /********************************/
                        /* Dec Total Price In MiniCart */
                        var old_total_price = parseInt($('.header-shop-cart ul.minicart').find(
                            '.total-price span:last-child span').text().replace(',',
                            ''));
                        var new_total_price = old_total_price - product_price;

                        function addCommas(nStr) {
                            nStr += '';
                            x = nStr.split('.');
                            x1 = x[0];
                            x2 = x.length > 1 ? '.' + x[1] : '';
                            var rgx = /(\d+)(\d{3})/;
                            while (rgx.test(x1)) {
                                x1 = x1.replace(rgx, '$1' + ',' + '$2');
                            }
                            return x1 + x2;
                        }

                        new_total_price = addCommas(new_total_price);
                        $('.header-shop-cart ul.minicart').find(
                            '.total-price span:last-child span').text(new_total_price);

                        /*******************************************/
                        /* Show No Item In MiniCart If No Product */
                        if (new_total_price == 0) {
                            var no_item = `
                                <li class="empty-cart">
                                    <img src="https://zzgolden.online/Web/assets/img/icon/cart.png" alt="empty-cart">
                                    <p>لا يوجد منتجات مضافة الى العربة</p>
                                </li>
                            `;
                            $('.header-shop-cart ul.minicart').prepend(no_item);
                        }

                        /*****************************/
                        /* Dec Total Price In Cart  */
                        var old_total_cart_price = parseInt($(
                            '.shop-cart-widget ul li.cart-total-amount').find(
                            'span:last-child span').text().replace(',', ''));
                        var new_total_cart_price = old_total_cart_price - product_price;

                        new_total_cart_price = addCommas(new_total_cart_price);
                        $('.shop-cart-widget ul li.cart-total-amount').find(
                            'span:last-child span').text(new_total_cart_price);
                    }
                });

            });

            $(".qtybutton").on("click", function() {
                var $button = $(this);
                var oldValue = $button.parent().find("input").val();
                var maxValue = $button.parent().find("input").attr('max');
                var newVal;

                if ($button.text() == "+") {
                    // Don't allow incrementing more than Max value
                    if (oldValue < parseInt(maxValue)) {
                        newVal = parseInt(oldValue) + 1;
                    } else {
                        newVal = maxValue;
                    }
                } else {

                    // Don't allow decrementing below zero
                    if (oldValue > 1) {
                        newVal = parseInt(oldValue) - 1;
                    } else {
                        newVal = 1;
                    }
                }
                $button.parent().find("input").val(newVal);

                var product_id = $(this).parents('tr').find('td.product-thumbnail a').attr(
                    'data-product_id');

                if ($button.closest('tr').length) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "post",
                        url: "delete_cart_item",
                        data: {
                            productId: product_id,
                            quantity: newVal,
                        },
                        success: function(data) {
                            var proPrice = parseInt($button.parents('.product-quantity')
                                .siblings(".product-price").find('span').text().replace(',',
                                    ''));
                            var new_total = proPrice * newVal;

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

                            new_total = addCommas(new_total);
                            $button.parents('.product-quantity').siblings(".product-subtotal")
                                .find('span').text(new_total);

                            $('.header-shop-cart ul.minicart li.d-flex.align-items-start').each(
                                function() {
                                    if ($(this).attr('data-id') == product_id) {
                                        $(this).find('.new span').text(new_total);
                                    }
                                });

                            function totalPriceCalc() {
                                var totalPrice = 0;
                                $('.wishlist-area tbody .product-subtotal span').each(
                                    function() {
                                        var price = parseInt($(this).text().replace(',',
                                            ''));
                                        totalPrice += price;
                                    })

                                return totalPrice;
                            }

                            var total_price = totalPriceCalc();
                            total_price = addCommas(total_price);
                            $('.shop-cart-widget ul li.cart-total-amount span:last-child span')
                                .text(total_price);
                            $('.header-shop-cart ul.minicart').find(
                                '.total-price span:last-child span').text(total_price);
                        }
                    });
                }
            });
        });
    </script>
@endsection

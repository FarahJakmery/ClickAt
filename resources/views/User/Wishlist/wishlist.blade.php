@extends('weblayouts.master')

@section('web_title')
    المفضلة
@endsection

@section('css')
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ URL::asset('Web/assets/css/all.min.css') }}">
@endsection

@section('web_content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg"
        data-background="{{ URL::asset('Web/assets/img/bg/breadcrumb_bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2>المفضلة</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.home') }}">الرئيسية</a></li>
                                <li class="breadcrumb-item active" aria-current="page">المفضلة</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- wishlist-area -->
    <section class="wishlist-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-desc-wrap mb-100">
                        <ul class="nav nav-tabs mb-25" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="details-tab" data-toggle="tab" href="#details" role="tab"
                                    aria-controls="details" aria-selected="true">منتجات البيع السريع</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="val-tab" data-toggle="tab" href="#val" role="tab"
                                    aria-controls="val" aria-selected="false">منتجات خارجية</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="details" role="tabpanel"
                                aria-labelledby="details-tab">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            @if (!$Fastproducts->isEmpty())
                                                <div class="table-responsive-xl">
                                                    <table class="table mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th class="product-thumbnail"></th>
                                                                <th class="product-name">المنتج</th>
                                                                <th class="product-price">السعر</th>
                                                                <th class="product-quantity">الكمية</th>
                                                                <th class="product-subtotal">التكلفة</th>
                                                                <th class="product-add-to-cart"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $i = 0;
                                                            ?>
                                                            @foreach ($Fastproducts as $Fastproduct)
                                                                <tr>
                                                                    <td class="product-thumbnail">
                                                                        <a href="#"
                                                                            class="wishlist-remove removeFromwishlist1"
                                                                            data-product_id="{{ $Fastproduct->id }}"
                                                                            data-type="2">
                                                                            <i class="flaticon-cancel-1"></i>
                                                                        </a>
                                                                        <a href="shop-details.html">
                                                                            <img src="{{ asset($Fastproduct->photo_name) }}"
                                                                                alt="">
                                                                        </a>
                                                                    </td>
                                                                    <td class="product-name">
                                                                        <h4>
                                                                            <a
                                                                                href="#">{{ $Fastproduct->translate('ar')->name }}</a>
                                                                        </h4>
                                                                    </td>
                                                                    <td class="product-price">
                                                                        <span>{{ $Fastproduct->pivot->price }}</span>ر.س
                                                                    </td>
                                                                    <td class="product-quantity">
                                                                        @if ($aa[$i] != 1)
                                                                            <div class="cart-plus">
                                                                                <form action="#">
                                                                                    <div class="cart-plus-minus">
                                                                                        <input type="text" value="1"
                                                                                            max="{{ $Fastproduct->quantity }}"
                                                                                            disabled>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        @else
                                                                            <span>{{ $bb[$i] }}</span>
                                                                        @endif


                                                                    </td>
                                                                    <td class="product-subtotal">
                                                                        <span>{{ $Fastproduct->pivot->price }}</span>ر.س
                                                                    </td>
                                                                    <td class="product-add-to-cart">
                                                                        <span>أضيفت في
                                                                            {{ $Fastproduct->created_at->format('Y M d') }}</span>
                                                                        @if ($aa[$i] != 1)
                                                                            <span class="btn add_cart_wishlist">
                                                                                إضافة إلى العربة
                                                                            </span>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                $i++;
                                                                ?>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @else
                                                <!-- wishlist-area -->
                                                <section class="wishlist-area pt-100 pb-100">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="empty-wishlist">
                                                                    <div class="image-holder">
                                                                        <img src="{{ URL::asset('Web/assets/img/icon/wishlist.png') }}"
                                                                            alt="">
                                                                    </div>
                                                                    <h3>المفضلة فارغة</h3>
                                                                    <p>لا يوجد منتجات خارجية مضافة للمفضلة</p>
                                                                    <p>تسوق الآن و أضف بعض المنتجات</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                                <!-- wishlist-area-end -->
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="val" role="tabpanel" aria-labelledby="val-tab">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            @if (!$products->isEmpty())
                                                <div class="table-responsive-xl">
                                                    <table class="table mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th class="product-thumbnail"></th>
                                                                <th class="product-name">المنتج</th>
                                                                <th class="product-price">السعر</th>
                                                                <th class="product-add-to-cart"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($products as $product)
                                                                <tr>
                                                                    <td class="product-thumbnail">
                                                                        <a href="#" class="wishlist-remove"
                                                                            data-product_id="{{ $product->id }}"
                                                                            data-type="1">
                                                                            <i class="flaticon-cancel-1"></i>
                                                                        </a>
                                                                        <a href="{{ $product->url }}">
                                                                            <img src="{{ asset($product->photo_name) }}"
                                                                                alt="">
                                                                        </a>
                                                                    </td>
                                                                    <td class="product-name">
                                                                        <h4>
                                                                            <a href="#">
                                                                                {{ $product->translate('ar')->product_name }}
                                                                            </a>
                                                                        </h4>
                                                                    </td>
                                                                    <td class="product-price">
                                                                        <span>{{ $product->price }}</span> ر.س
                                                                    </td>
                                                                    <td class="product-add-to-cart">
                                                                        @php
                                                                            $product_in_wishlist = \App\Models;
                                                                        @endphp
                                                                        <span>أضيفت في
                                                                            {{ $product->created_at->format('Y M d') }}</span>

                                                                        <a href="{{ $product->url }}"
                                                                            class="btn">
                                                                            تسوق الآن
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @else
                                                <!-- wishlist-area -->
                                                <section class="wishlist-area pt-100 pb-100">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="empty-wishlist">
                                                                    <div class="image-holder">
                                                                        <img src="{{ URL::asset('Web/assets/img/icon/wishlist.png') }}"
                                                                            alt="">
                                                                    </div>
                                                                    <h3>المفضلة فارغة</h3>
                                                                    <p>لا يوجد منتجات خارجية مضافة للمفضلة</p>
                                                                    <p>تسوق الآن و أضف بعض المنتجات</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                                <!-- wishlist-area-end -->
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- wishlist-area-end -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {

            /* Remove Fast Products From Wishlist */
            $(document).on('click', '.removeFromwishlist1', function(e) {
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
                    type: "post",
                    url: "delete_wishlist_item",
                    data: {
                        'product_id': product_id,
                    },
                    success: function(data) {
                        /**************************/
                        /* Remove Row From Table */
                        el_tr_parent.remove();

                        /*********************************/
                        /* Remove Product From MiniCart */
                        var status = 0;
                        $('.header-shop-cart ul.minicart').find('li').each(function() {
                            if ($(this).attr('data-id') == product_id) {
                                status = 1;
                                $(this).remove();
                            }
                        });

                        /**************************************/
                        /* Dec Number Of Product In MiniCart */
                        if (status == 1) {
                            var shopBag_count = $(
                                '.menu-wrap .header-shop-cart a span.cart-count').text();
                            shopBag_count = Number(shopBag_count) - 1;
                            $('.menu-wrap .header-shop-cart a span.cart-count').text(
                                shopBag_count);
                            $('.mobile-menu .header-shop-cart a span.cart-count').text(
                                shopBag_count);
                        }

                        /********************************/
                        /* Dec Total Price In MiniCart */
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

                        if (status == 1) {
                            var old_total_price = parseInt($('.header-shop-cart ul.minicart')
                                .find('.total-price span:last-child span').text().replace(
                                    ',', ''));
                            var new_total_price = old_total_price - product_price;
                            new_total_price = addCommas(new_total_price);
                            $('.header-shop-cart ul.minicart').find(
                                '.total-price span:last-child span').text(new_total_price);
                        }

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
                    }
                });
            });


            /* Inc Dec item Val */
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

                var proPrice = parseInt($button.parents('.product-quantity').siblings(".product-price")
                    .find('span').text().replace(',', ''));
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
                $button.parents('.product-quantity').siblings(".product-subtotal").find('span').text(
                    new_total);
            });

            /* Add To Cart */
            $(".btn.add_cart_wishlist").on("click", function() {
                var btn = $(this);
                var product_id = parseInt(btn.parents("tr").find(".product-thumbnail .wishlist-remove")
                    .attr("data-product_id"));
                var quantity = parseInt(btn.parents("tr").find(".product-quantity input").val());
                var product_total_price = parseInt(btn.parents("tr").find(".product-subtotal span").text()
                    .replace(',', ''));
                var product_price = parseInt(btn.parents("tr").find(".product-price span").text().replace(
                    ',', ''));
                var productImg = btn.parents("tr").find(".product-thumbnail img").attr("src");
                var productName = btn.parents("tr").find(".product-name a").text();

                var buttom_parent = btn.parents("tr").find(".product-quantity");
                var buttom = btn.parents("tr").find(".product-quantity .cart-plus");

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('addToCart') }}",
                    data: {
                        product_id: product_id,
                        quantity: quantity,
                        max_price: product_price
                    },

                    success: function(response) {
                        var shopBag_count, temp, parent, old_price, current_price, new_price,
                            product = "";
                        /**************************/
                        /* inc count of Shop Bag */
                        shopBag_count = $('.menu-wrap .header-shop-cart a span.cart-count')
                            .text();
                        shopBag_count = Number(shopBag_count) + 1;
                        $('.menu-wrap .header-shop-cart a span.cart-count').text(shopBag_count);
                        $('.mobile-menu .header-shop-cart a span.cart-count').text(
                            shopBag_count);

                        /***************************/
                        /* remove Add to Cart Btn */
                        btn.remove();
                        buttom.remove();
                        var temp_price = `
                            <span>${quantity}</span>
                        `;
                        buttom_parent.append(temp_price);
                        /****************************/
                        /* add product to Shop Bag And Change Total Price */
                        old_price = parseInt($('.header-shop-cart ul.minicart').find(
                            '.total-price span:last-child span').text().replace(',',
                            ''));
                        new_price = old_price + product_total_price;

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

                        $('.header-shop-cart ul.minicart').find('li.empty-cart').remove();
                        product_total_price = product_total_price.toString();
                        product = `
                            <li class="d-flex align-items-start" data-id="${product_id}">
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
                                            <span>${product_total_price.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")}</span> ر.س
                                        </span>
                                    </div>
                                </div>
                            </li>
                        `;
                        $('.header-shop-cart ul.minicart').prepend(product);
                    }
                });
            });
        });
    </script>
@endsection

@extends('webLayouts.master')

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
                                                                        <span>{{ $Fastproduct->max_price }}</span>ر.س
                                                                    </td>
                                                                    <td class="product-quantity">
                                                                        <div class="cart-plus">
                                                                            <form action="#">
                                                                                <div class="cart-plus-minus">
                                                                                    <input type="text"
                                                                                        value="{{ $Fastproduct->quantity }}"
                                                                                        disabled>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </td>
                                                                    <td class="product-subtotal">
                                                                        <span></span>ر.س
                                                                    </td>
                                                                    <td class="product-add-to-cart">
                                                                        <span>أضيفت في
                                                                            {{ $product->created_at->format('Y M d') }}</span>
                                                                        <a href="{{ route('user.Cart') }}"
                                                                            class="btn">
                                                                            إضافة إلى العربة
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
                                                                        <a href="#"
                                                                            class="wishlist-remove removeFromwishlist1"
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

            $(document).on('click', '.removeFromwishlist1', function(e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "delete",
                    url: "{{ route('user.wishlistDestroy') }}",
                    data: {
                        'productId': $(this).attr('data-product_id'),
                        'type': $(this).attr('data-type'),
                    },
                    success: function(data) {
                        location.reload();
                    }
                });

            });

        });
    </script>
@endsection

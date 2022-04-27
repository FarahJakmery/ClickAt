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
                                <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                                <li class="breadcrumb-item active" aria-current="page">العربة</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

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
                                            <a href="#" class="wishlist-remove">
                                                <i class="flaticon-cancel-1"></i>
                                            </a>
                                            <a href="shop-details.html">
                                                <img src="{{ asset($fastProducts['fast_product']->photo_name) }}" alt="">
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
                                            <span>{{ $fastProducts['price'] }}</span>ر.س
                                        </td>
                                        <td class="product-quantity">
                                            <div class="cart-plus">
                                                <form action="#">
                                                    <div class="cart-plus-minus">
                                                        <input type="text"
                                                            value="{{ $fastProducts['fast_product_quantity'] }}" disabled>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="product-subtotal">
                                            <span>{{ $fastProducts['all_price'] }}</span>ر.س
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
                            <form action="#">
                                <ul>
                                    <li class="cart-total-amount">
                                        <span>الاجمالي :</span>
                                        <span>{{ $price_for_all_thing }}ر.س</span>
                                    </li>
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
@endsection

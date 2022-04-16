@extends('webLayouts.master')

@section('web_title')
    المفضلة
@endsection

@section('web_content')
    <!-- Start Header -->
    <!-- Start User Information List -->
    <div class="profile">
        <div class="user-list">
            <div class="hide-show">
                <i class="fas fa-cog"></i>
            </div>
            <div class="user-info">
                <img src="{{ URL::asset('Web/assets/img/tshirt-02.png') }}" alt="">
                <h3>{{ Auth::user()->first_name }}</h3>
            </div>
            <div class="options">
                <div class="option">
                    <div class="overlay-bg"></div>
                    <a href="#">
                        <span class="icon">
                            <i class="far fa-user"></i>
                        </span>
                        تعديل البيانات
                    </a>
                </div>
                <div class="option">
                    <div class="overlay-bg"></div>
                    <a href="{{ route('orders.index') }}">
                        <span class="icon">
                            <i class="fas fa-clipboard-list"></i>
                        </span>
                        طلباتي
                    </a>
                </div>
                <div class="option active">
                    <div class="overlay-bg"></div>
                    <a href="{{ route('wishlist.index') }}">
                        <span class="icon">
                            <i class="far fa-heart"></i>
                        </span>
                        المفضلة
                    </a>
                </div>
                <div class="option">
                    <div class="overlay-bg"></div>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <span class="icon">
                            <i class="fas fa-sign-out-alt fa-rotate-180"></i>
                        </span>
                        تسجيل الخروج
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>

        <div class="profile-ordres">
            <header>
                <h2 class="title">المفضلة</h2>
            </header>
            <div class="prudact-container">
                <div class="purchase-status">
                    @isset($products)
                        <ul class="head-list">
                            <li>اسم المنتج</li>
                            <li>رقم المنتج</li>
                            <li>السعر</li>
                            <li></li>
                            <li></li>
                        </ul>
                        @foreach ($products as $product)
                            <ul class="item-in-list">

                                <li class="img">
                                    {{-- <img src="{{ asset('images/The_Product/' . $product->images->id) }}" alt=""> --}}
                                </li>
                                <li class="prodact-name">{{ $product->translate('ar')->product_name }}</li>
                                <li class="prodact-name">#{{ $product->product_number }}</li>
                                <li class="price">${{ $product->max_price }}</li>
                                <li>
                                    <a class="removeFromwishlist" href="#" data-product_id="{{ $product->id }}">
                                        <button>
                                            إزالة من المفضلة
                                        </button>
                                    </a>
                                </li>
                                <li>
                                    <button>
                                        إضافة للعربة
                                    </button>
                                </li>
                            </ul>
                        @endforeach
                    @endisset

                    @empty($products)
                        // $records is "empty"...
                    @endempty


                </div>
            </div>
        </div>
    </div>
    <div class="prudact-page-number padbtm40">
        <ul class="page-number">
            <li class="number"><i class="fa fa-angle-right"></i></li>
            <li class="number active">1</li>
            <li class="number">2</li>
            <li class="number">3</li>
            <li class="number">4</li>
            <li class="number"><i class="fa fa-angle-left"></i></li>
        </ul>
    </div>

    <!-- End User Information List -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {

            $(document).on('click', '.removeFromwishlist', function(e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "delete",
                    url: "{{ route('wishlist.destroy') }}",
                    data: {
                        'productId': $(this).attr('data-product_id'),
                    },
                    success: function(data) {
                        location.reload();
                    }
                });

            });

        });
    </script>
@endsection

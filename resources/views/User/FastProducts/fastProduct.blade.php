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
                <ul class="nav nav-tabs mb-25" id="myTab" role="tablist">
                    @foreach ($mainCategories as $key => $mainCategory)
                        <li class="nav-item">
                            <a class="nav-link {{ $key == 0 ? 'active' : '' }}" id="Category{{ $mainCategory->id }}-tab"
                                data-toggle="tab" href="#Category{{ $mainCategory->id }}" role="tab"
                                aria-controls="Category{{ $mainCategory->id }}"
                                aria-selected="{{ $key == 0 ? 'true' : 'false' }}">
                                {{ $mainCategory->translate('ar')->category_name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content" id="myTabContent">
                    @foreach ($mainCategories as $key => $mainCategory)
                        <div class="tab-pane fade  {{ $key == 0 ? 'show active' : '' }}"
                            id="Category{{ $mainCategory->id }}" role="tabpanel"
                            aria-labelledby="Category{{ $mainCategory->id }}-tab">
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
                                        @foreach ($mainCategory->fastproducts()->paginate(1, ['*'], 'fastProduct') as $fastproduct)
                                            <div class="col-lg-4 col-sm-6 grid-item grid-sizer cat-two cat-three">
                                                <div class="exclusive-item exclusive-item-three text-center mb-40">
                                                    <div class="exclusive-item-thumb circle-shape">
                                                        <div class="ko-progress-circle data-left-time" data-progress="0"
                                                            data-end="{{ $fastproduct->expiry_date }}"
                                                            data-start="{{ $fastproduct->product_date }}">
                                                            <div class="ko-circle">
                                                                <div class="full ko-progress-circle__slice">
                                                                    <div class="ko-progress-circle__fill"></div>
                                                                </div>
                                                                <div class="ko-progress-circle__slice">
                                                                    <div class="ko-progress-circle__fill"></div>
                                                                    <div
                                                                        class="ko-progress-circle__fill ko-progress-circle__bar">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ko-progress-circle__overlay">
                                                                <div
                                                                    class="most--popular--item--thumb height-100 circle-shape">
                                                                    <a href="#">
                                                                        <img src="{{ asset($fastproduct->photo_name) }}"
                                                                            alt="">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="exclusive-item-content">
                                                        {{-- Name --}}
                                                        <h5>
                                                            <a href="#">
                                                                {{ $fastproduct->translate('ar')->name }}
                                                            </a>
                                                        </h5>
                                                        {{-- Current Price --}}
                                                        <div class="exclusive--item--price">
                                                            <span class="new-price">
                                                                {{ $fastproduct->max_price }}ر.س
                                                            </span>
                                                            <input type="hidden" class="max_price"
                                                                value="{{ $fastproduct->max_price }}">
                                                        </div>
                                                        {{-- Description --}}
                                                        <div class="exclusive--content--description">
                                                            <p class="fast-sell">
                                                                {{ $fastproduct->translate('ar')->description }}
                                                            </p>
                                                        </div>

                                                        {{-- Add To WishList Button --}}
                                                        <div class="add-to-wishlist addtowishlist">
                                                            <a href="#" class="like"
                                                                data-product_id="{{ $fastproduct->id }}">
                                                                <i class="flaticon-heart"></i>
                                                            </a>
                                                        </div>

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
                                                                                value="1"
                                                                                max="{{ $fastproduct->quantity }}">
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
                                                                                value="1"
                                                                                max="{{ $fastproduct->quantity }}">
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
                            <!-- exclusive-collection-area-end -->
                        </div>
                        {{ $mainCategory->fastproducts()->paginate(1, ['*'], 'fastProduct')->links() }}
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- exclusive-collection-area-end -->
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

                    var productId = $(this).data('product_id');
                    var quantity = $(this).siblings().find('input').val();
                    var maxPrice = $(this).parents('.add-to-cart').siblings().find(
                        '.new-price span').text();
                    console.log(productId);
                    console.log(quantity);
                    console.log(maxPrice);

                    $.ajax({
                        type: "POST",
                        url: "{{ route('addToCart') }}",
                        data: {
                            product_id: productId,
                            quantity: quantity,
                            max_price: maxPrice
                        },
                        dataType: "json",
                        success: function(response) {
                            console.log(response);
                            console.log(data);
                            var countFirstEle = $(
                                '.header-shop-cart:first a span.cart-count')
                            var countAll = $('.header-shop-cart a span.cart-count')
                            // console.log(count.text())
                            // console.log(parseInt(count.text()) + parseInt(quantity))
                            var cartQuantity = parseInt(countFirstEle.text()) +
                                parseInt(quantity);
                            // if (cartQuantity > 99){
                            //     countAll.text("+99")
                            //     countAll.css({width : '27px'})
                            // }else{
                            countAll.text(parseInt(countFirstEle.text()) + parseInt(
                                quantity))
                            // }
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

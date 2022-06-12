@extends('weblayouts.master')

@section('web_title')
    منتجات خارجية
@endsection

@section('css')
@endsection

@section('web_content')
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
                        {{-- <button class="active" data-filter="*">أفضل المبيعات</button> --}}
                        @foreach ($mainCategories as $key => $mainCategory)
                            <button class="{{ $key == 0 ? 'active' : '' }}" data-filter=".cat-{{ $mainCategory->id }}">
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

            {{-- Pagination --}}
            <div class="pagination-wrap">
                <ul>
                    <li class="prev"><a href="#"><i class="fas fa-long-arrow-alt-right"></i> السابق</a></li>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">...</a></li>
                    <li><a href="#">10</a></li>
                    <li class="next"><a href="#">التالي <i class="fas fa-long-arrow-alt-left"></i></a></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- exclusive-collection-area-end -->
@endsection

@section('js')
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

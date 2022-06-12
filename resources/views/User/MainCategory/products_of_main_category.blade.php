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
                        <h2 class="title">منتجات كليكات</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="row exclusive-active">

                        @forelse ($products as $product)
                            <div class="col-lg-4 col-sm-6 grid-item grid-sizer cat-two cat-three">
                                <div class="exclusive-item mb-40">
                                    <div class="exclusive-item-thumb exclusive-item-three" data-date="48:00:00">
                                        <a href="{{ $product->url }}">
                                            <img src="{{ asset($product->photo_name) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="exclusive-item-content">
                                        <div class="exclusive--content--bottom">
                                            <h5>
                                                <a
                                                    href="{{ $product->url }}">{{ $product->translate('ar')->product_name }}</a>
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
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="section-pagination">
                {{ $products->links() }}
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

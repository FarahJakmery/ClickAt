@extends('weblayouts.master')

@section('web_title')
    سجل الطلبات
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('Web/assets/css/all.min.css') }}">
@endsection

@section('web_content')
    <!-- main-area -->
    <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg"
            data-background="{{ URL::asset('Web/assets/img/bg/breadcrumb_bg.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content text-center">
                            <h2>سجل الطلبات</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('user.home') }}">الرئيسية</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">سجل الطلبات</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- contact-area -->
        <section class="contact-area primary-bg pt-100">
            <div class="container">
                <div class="contact-wrap-padding">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 col-sm-8">
                            <div class="contact-info-box text-center mb-30">
                                <div class="contact-info-content">
                                    <h5>إجمالي مبالغ الطلبات</h5>
                                    <p>ر.س<span class="odometer" data-count="1200">00</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-8">
                            <div class="contact-info-box text-center mb-30">
                                <div class="contact-info-content">
                                    <h5>إجمالي أخر الطلبات</h5>
                                    <p>ر.س<span class="odometer" data-count="379">00</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-8">
                            <div class="contact-info-box text-center mb-30">
                                <div class="contact-info-content">
                                    <h5>تاريخ أخر طلب</h5>
                                    <p><span class="odometer" data-count="2022">00</span>/<span class="odometer"
                                            data-count="3">00</span>/<span class="odometer" data-count="23">00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-area-end -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تفاصيل الطلب</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="shop-cart-area">
                            <div class="table-responsive-xl">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail"></th>
                                            <th class="product-name">المنتج</th>
                                            <th class="product-quantity">الكمية</th>
                                            <th class="product-subtotal">التكلفة</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orderItems as $orderItem)
                                            <tr>
                                                <td class="product-thumbnail">
                                                    <a href="#" class="wishlist-remove">
                                                        <i class="flaticon-cancel-1"></i>
                                                    </a>
                                                    <a href="shop-details.html">
                                                        <img src="{{ $orderItem->item_photo }}" alt="">
                                                    </a>
                                                </td>
                                                <td class="product-name">
                                                    <h4><a href="#">{{ $orderItem->item_name }}</a></h4>
                                                </td>
                                                <td class="product-quantity">{{ $orderItem->quantity }}</td>
                                                <td class="product-subtotal">
                                                    <span>{{ $orderItem->current_price }}</span>ر.س
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- wishlist-area -->
        <section class="wishlist-area pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive-xl">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th class="product-name">رمز الطلب</th>
                                        <th class="product-price">تاريخ الطلب</th>
                                        <th class="product-quantity">التكلفة</th>
                                        <th class="product-stock-status">وضع الطلب</th>
                                        <th class="product-add-to-cart">التفاصيل</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td class="product-name">{{ $order->order_number }}</td>
                                            <td class="product-quantity">{{ $order->created_at->format('Y M d') }}</td>
                                            <td class="product-price">
                                                <span>{{ $order->total_price }}</span>ر.س
                                            </td>
                                            <td class="product-stock-status">
                                                <span>{{ $order->order_status }}</span>
                                            </td>
                                            <td class="product-add-to-cart">
                                                <span class="btn" data-toggle="modal"
                                                    data-id="{{ $order->id }}" data-target="#exampleModal">
                                                    <i class="fa fa-info"></i>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- wishlist-area-end -->

    </main>
    <!-- main-area-end -->
@endsection

@section('js')
    {{-- This script return the Id of each Order for Showing the Order's Items --}}
    <script>
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })
    </script>
@endsection

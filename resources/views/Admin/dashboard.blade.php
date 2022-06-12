@extends('layouts.master')

@section('title')
    لوحة التحكم - ClickAt
@endsection

@section('css')
@endsection

@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">أهلاً، مرحبا بعودتك</h2>
                <p class="mg-b-0">لوحة تحكم كليكات</p>
            </div>
        </div>
        <div class="main-dashboard-header-right">
            {{-- <div>
                <label class="tx-13">Customer Ratings</label>
                <div class="main-star">
                    <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i
                        class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i
                        class="typcn typcn-star"></i> <span>(14,873)</span>
                </div>
            </div> --}}
            {{-- <div>
                <label class="tx-13">Online Sales</label>
                <h5>563,275</h5>
            </div>
            <div>
                <label class="tx-13">Offline Sales</label>
                <h5>783,675</h5>
            </div> --}}
        </div>
    </div>
    <!-- breadcrumb -->

    <!-- row -->
    <div class="row row-sm">
        {{-- المستخدمين --}}
        <div class="col-lg-6 col-xl-3 col-md-6 col-12">
            <div class="card bg-primary-gradient text-white ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="icon1 mt-2 text-center">
                                <i class="fe fe-users tx-40"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-0 text-center">
                                <span class="text-white">المستخدمين</span>
                                <h2 class="text-white mb-0">{{ \App\Models\User::count() }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- مدراء الموقع --}}
        <div class="col-lg-6 col-xl-3 col-md-6 col-12">
            <div class="card bg-success-gradient text-white ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="icon1 mt-2 text-center">
                                <i class="fe fe-users tx-40"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-0 text-center">
                                <span class="text-white">مدراء الموقع</span>
                                <h2 class="text-white mb-0">{{ \App\Models\Admin::count() }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- إجمالي الطلبات --}}
        <div class="col-lg-6 col-xl-3 col-md-6 col-12">
            <div class="card bg-danger-gradient text-white">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="icon1 mt-2 text-center">
                                <i class="fe fe-shopping-cart tx-40"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-0 text-center">
                                <span class="text-white">عدد الطلبات</span>
                                <h2 class="text-white mb-0">
                                    {{ \App\Models\Order::count() }}
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-4 col-md-12 col-lg-6">
            <div class="card">
                <div class="card-header pb-1">
                    <h3 class="card-title mb-2">إحصائيات ClickAt</h3>
                    <p class="tx-12 mb-0 text-muted">
                        من هنا يمكنك الإطلاع على كافة إحصائيات موقع كليكات
                    </p>
                </div>

                <div class="product-timeline card-body pt-2 mt-1">
                    <ul class="timeline-1 mb-0">
                        <li class="mt-0" id="mrg-8">
                            <i class="ti-wallet bg-warning-gradient text-white product-icon"></i>
                            <span class="font-weight-semibold mb-4 tx-14 ">
                                إجمالي التصنيفات الرئيسية
                            </span>
                            <a href="#" class="float-left tx-20 text-muted">
                                {{ \App\Models\Mcategory::count() }}
                            </a>
                        </li>
                        <li class="mt-0" id="mrg-8">
                            <i class="ti-pie-chart bg-primary-gradient text-white product-icon"></i>
                            <span class="font-weight-semibold mb-4 tx-14 ">
                                إجمالي منتجات البيع السريع
                            </span>
                            <a href="#" class="float-left tx-20 text-muted">
                                {{ \App\Models\Fastproduct::count() }}
                            </a>
                        </li>
                        <li class="mt-0" id="mrg-8">
                            <i class="mdi mdi-cart-outline bg-danger-gradient text-white product-icon"></i>
                            <span class="font-weight-semibold mb-4 tx-14 ">
                                إجمالي المنتجات الخارجية
                            </span>
                            <a href="#" class="float-left tx-20 text-muted">
                                {{ \App\Models\Product::count() }}
                            </a>
                        </li>
                        <li class="mt-0" id="mrg-8">
                            <i class="ti-bar-chart-alt bg-success-gradient text-white product-icon"></i>
                            <span class="font-weight-semibold mb-4 tx-14 ">
                                إجمالي الأكواد
                            </span>
                            <a href="#" class="float-left tx-20 text-muted">
                                {{ \App\Models\Codeproduct::count() }}
                            </a>
                        </li>

                        {{-- <li class="mt-0" id="mrg-8"> <i
                            class="si si-eye bg-purple-gradient text-white product-icon"></i> <span
                            class="font-weight-semibold mb-4 tx-14 ">Customer Visits</span> <a href="#"
                            class="float-left tx-11 text-muted">1 ago day</a>
                        <p class="mb-0 text-muted tx-12">15% increased</p>
                    </li>
                    <li class="mt-0 mb-0" id="mrg-8"> <i
                            class="icon-note icons bg-primary-gradient text-white product-icon"></i>
                        <span class="font-weight-semibold mb-4 tx-14 ">Customer Reviews</span> <a href="#"
                            class="float-left tx-11 text-muted">1 ago day</a>
                        <p class="mb-0 text-muted tx-12">1.5k reviews</p>
                    </li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

    <!-- row opened -->
    <div class="row row-sm">
        {{-- الطلبات المدفوعة --}}
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-danger-gradient">
                <div class="ps-3 pt-3 pe-3 pb-2 pt-0">
                    <div class="">
                        <a href="">
                            <h6 class="mb-3 tx-12 text-white">الطلبات المدفوعة</h6>
                        </a>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 fw-bold mb-1 text-white">
                                    {{ number_format(\App\Models\Order::where('order_status', 'مدفوع')->sum('total_price'), 2) }}
                                    ر.س
                                </h4>
                                <p class="mb-0 tx-12 text-white op-7">
                                    عدد الطلبات المدفوعة
                                    {{ \App\Models\Order::where('order_status', 'مدفوع')->count() }}
                                </p>
                            </div>
                            <span class="float-end my-auto ms-auto">
                                <i class="fas fa-arrow-circle-down text-white"></i>
                                <span class="text-white op-7">
                                    @php
                                        $all_order_count = \App\Models\Order::count();
                                        $Number_of_paid_orders = \App\Models\Order::where('order_status', 'مدفوع')->count();
                                        if ($Number_of_paid_orders == 0) {
                                            echo $Number_of_paid_orders = 0;
                                        } else {
                                            echo $Number_of_paid_orders = ($Number_of_paid_orders / $all_order_count) * 100 . '%';
                                        }
                                    @endphp
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
            </div>
        </div>
        {{-- الطلبات بانتظار الشحن --}}
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-success-gradient">
                <div class="ps-3 pt-3 pe-3 pb-2 pt-0">
                    <div class="">
                        <a href="">
                            <h6 class="mb-3 tx-12 text-white">الطلبات بانتظار الشحن</h6>
                        </a>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 fw-bold mb-1 text-white">
                                    {{ number_format(\App\Models\Order::where('order_status', 'انتظار الشحن')->sum('total_price'), 2) }}
                                    ر.س
                                </h4>
                                <p class="mb-0 tx-12 text-white op-7">
                                    عدد الطلبات بانتظار الشحن
                                    {{ \App\Models\Order::where('order_status', 'انتظار الشحن')->count() }}
                                </p>
                            </div>
                            <span class="float-end my-auto ms-auto">
                                <i class="fas fa-arrow-circle-up text-white"></i>
                                <span class="text-white op-7">
                                    @php
                                        $all_order_count = \App\Models\Order::count();
                                        $Number_of_orders_waiting_to_be_shipped = \App\Models\Order::where('order_status', 'انتظار الشحن')->count();
                                        if ($Number_of_orders_waiting_to_be_shipped == 0) {
                                            echo $Number_of_orders_waiting_to_be_shipped = 0;
                                        } else {
                                            echo $Number_of_orders_waiting_to_be_shipped = ($Number_of_orders_waiting_to_be_shipped / $all_order_count) * 100 . '%';
                                        }
                                    @endphp
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <span id="compositeline3"
                    class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
            </div>
        </div>
        {{-- الطلبات قيد الشحن --}}
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-warning-gradient">
                <div class="ps-3 pt-3 pe-3 pb-2 pt-0">
                    <div class="">
                        <a href="">
                            <h6 class="mb-3 tx-12 text-white">الطلبات قيد الشحن</h6>
                        </a>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 fw-bold mb-1 text-white">
                                    {{ number_format(\App\Models\Order::where('order_status', 'قيد الشحن')->sum('total_price'), 2) }}
                                    ر.س
                                </h4>
                                <p class="mb-0 tx-12 text-white op-7">
                                    عدد الطلبات قيد الشحن
                                    {{ \App\Models\Order::where('order_status', 'قيد الشحن')->count() }}
                                </p>
                            </div>
                            <span class="float-end my-auto ms-auto">
                                <i class="fas fa-arrow-circle-down text-white"></i>
                                <span class="text-white op-7">
                                    @php
                                        $all_order_count = \App\Models\Order::count();
                                        $Number_of_orders_being_shipped = \App\Models\Order::where('order_status', 'قيد الشحن')->count();
                                        if ($Number_of_orders_being_shipped == 0) {
                                            echo $Number_of_orders_being_shipped = 0;
                                        } else {
                                            echo $Number_of_orders_being_shipped = ($Number_of_orders_being_shipped / $all_order_count) * 100 . '%';
                                        }
                                    @endphp
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
            </div>
        </div>
        {{-- الطلبات المسلمة --}}
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-primary-gradient">
                <div class="ps-3 pt-3 pe-3 pb-2 pt-0">
                    <div class="">
                        <a href="">
                            <h6 class="mb-3 tx-12 text-white">الطلبات المُسَلمة</h6>
                        </a>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 fw-bold mb-1 text-white">
                                    {{ number_format(\App\Models\Order::where('order_status', 'تم التسليم')->sum('total_price'), 2) }}
                                    ر.س
                                </h4>
                                <p class="mb-0 tx-12 text-white op-7">
                                    عدد الطلبات قيد الشحن
                                    {{ \App\Models\Order::where('order_status', 'تم التسليم')->count() }}
                                </p>
                            </div>
                            <span class="float-end my-auto ms-auto">
                                <i class="fas fa-arrow-circle-up text-white"></i>
                                <span class="text-white op-7">
                                    @php
                                        $all_order_count = \App\Models\Order::count();
                                        $Number_of_of_orders_delivered = \App\Models\Order::where('order_status', 'تم التسليم')->count();
                                        if ($Number_of_of_orders_delivered == 0) {
                                            echo $Number_of_of_orders_delivered = 0;
                                        } else {
                                            echo $Number_of_of_orders_delivered = ($Number_of_of_orders_delivered / $all_order_count) * 100 . '%';
                                        }
                                    @endphp
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection

@section('scripts')
@endsection

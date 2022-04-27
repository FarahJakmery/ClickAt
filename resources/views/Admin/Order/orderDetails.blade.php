@extends('layouts.master')
@section('css')
@endsection
@section('title')
    تفاصيل الطلب
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">سجل الطلبات</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                        تفاصيل الطلب
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- row -->
    <div class="row row-sm">
        <div class="col-md-12 col-xl-12">
            <div class=" main-content-body-invoice">
                <div class="card card-invoice">
                    <div class="card-body">
                        <div class="invoice-header">
                            <h1 class="invoice-title">تفاصيل الطلب</h1>
                        </div>
                        <!-- invoice-header -->
                        <div class="row mg-t-20">
                            <div class="col-md">
                                <label class="tx-gray-600">معلومات الزبون</label>
                                <div class="billed-to">
                                    <h6>صاحب الطلب: {{ $order->user->name }}</h6><br>
                                    <p>رقم الموبايل: {{ $order->user->mobile_number }}</p><br>
                                    <p>البريد الإلكتروني: {{ $order->user->email }}</p>
                                </div>
                            </div>
                            <div class="col-md">
                                <label class="tx-gray-600">معلومات الطلب</label>
                                <p class="invoice-info-row"><span>رقم الطلب</span>
                                    <span>{{ $order->order_number }}</span>
                                </p>
                                <p class="invoice-info-row"><span>حالة الطلب</span>
                                    <span>{{ $order->order_status }}</span>
                                </p>
                                <p class="invoice-info-row"><span>تاريخ الطلب</span>
                                    <span>{{ $order->created_at }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="table-responsive mg-t-40">
                            <table class="table table-invoice border text-md-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th class="wd-20p">اسم المنتج</th>
                                        <th class="wd-40p">صورة المنتج</th>
                                        <th class="tx-center">الكمية</th>
                                        <th class="tx-right">السعر الإفرادي</th>
                                        <th class="tx-right">السعر الكلي</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderItems as $orderItem)
                                        <tr>
                                            <td>{{ $orderItem->item_name }}</td>
                                            <td>
                                                <img alt="Responsive image" class="img-thumbnail wd-75p wd-sm-75"
                                                    src="{{ asset($orderItem->item_photo) }}">
                                            </td>
                                            <td class="tx-center">{{ $orderItem->quantity }}</td>
                                            <td class="tx-right">{{ $orderItem->current_price }} ر.س</td>
                                            <td class="tx-right">
                                                {{ $orderItem->quantity * $orderItem->current_price }}
                                                ر.س</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td class="valign-middle" colspan="2" rowspan="4">
                                            <div class="invoice-notes">
                                                <label class="main-content-label tx-13"></label>
                                                <p></p>
                                            </div><!-- invoice-notes -->
                                        </td>
                                        <td class="tx-right">السعر الكلي للطلب</td>
                                        <td class="tx-right" colspan="2">{{ $order->total_price }} ر.س</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="#" class="btn btn-danger float-end mt-3 ms-2" onclick="javascript:window.print();">
                            <i class="mdi mdi-printer me-1"></i>طباعة الطلب
                        </a>
                    </div>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
    <!-- row closed -->
@endsection
@section('js')
@endsection

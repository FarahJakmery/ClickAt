@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/datatables.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/responsive.bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">

    <!--- Animations css-->
    <link href="{{ URL::asset('assets/css/animate.css') }}" rel="stylesheet">
    <!---Internal Owl Carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">

    <!---Internal  Multislider css-->
    <link href="{{ URL::asset('assets/plugins/multislider/multislider.css') }}" rel="stylesheet">

    <!--- Select2 css --->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <!--- Animations css-->
    <link href="{{ URL::asset('assets/css/animate.css') }}" rel="stylesheet">
@endsection
@section('title')
    الطلبات قيد الشحن
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">الطلبات</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                        الطلبات قيد الشحن</span>
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
        <!--Bordered Table-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                {{-- card-body --}}
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">رقم الطلب</th>
                                    <th class="border-bottom-0">تاريخ الطلب</th>
                                    <th class="border-bottom-0">الزبون</th>
                                    <th class="border-bottom-0">التكلفة الإجمالية</th>
                                    <th class="border-bottom-0">حالة الطلب</th>
                                    <th class="border-bottom-0">تفاصيل الطلب</th>
                                    <th class="border-bottom-0">الخيارات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->order_number }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->total_price }}</td>
                                        <td>
                                            @if ($order->order_status == 'paying')
                                                <h4 class="text-info">
                                                    <span class="badge bg-info">
                                                        مدفوع
                                                    </span>
                                                </h4>
                                            @elseif($order->order_status == 'wait_shimp')
                                                <h4 class="text-danger">
                                                    <span class="badge bg-danger">
                                                        بانتظار الشحن
                                                    </span>
                                                </h4>
                                            @elseif($order->order_status == 'shimp')
                                                <h4 class="text-warning">
                                                    <span class="badge bg-warning">
                                                        تم الشحن
                                                    </span>
                                                </h4>
                                            @elseif ($order->order_status == 'done')
                                                <h4 class="text-success">
                                                    <span class="badge bg-success">
                                                        تم التسليم
                                                    </span>
                                                </h4>
                                            @else
                                                <h4 class="text-danger">
                                                    <span class="badge bg-danger">
                                                        ملغي
                                                    </span>
                                                </h4>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.orders.show', $order->id) }}">
                                                <button class="btn btn-info btn-block">تفاصيل الطلب</button>
                                            </a>
                                        </td>
                                        <td>
                                            <button data-bs-toggle="dropdown" class="btn btn-primary btn-block">
                                                العمليات
                                                <i class="icon ion-ios-arrow-down tx-11 mg-l-3"></i>
                                            </button>

                                            <div class="dropdown-menu">
                                                <a class="modal-effect dropdown-item" data-bs-effect="effect-scale"
                                                    data-id="{{ $order->id }}"
                                                    data-order_number="{{ $order->order_number }}"
                                                    data-total_price="{{ $order->total_price }}"
                                                    data-user_name="{{ $order->user->name }}" data-bs-toggle="modal"
                                                    href="#modaldemo8">تغيير حالة الدفع</a>
                                                <a class="modal-effect dropdown-item" data-bs-effect="effect-flip-vertical"
                                                    data-id="{{ $order->id }}"
                                                    data-order_number="{{ $order->order_number }}" data-bs-toggle="modal"
                                                    href="#DeleteModal" title="حذف">
                                                    حذف الطلب
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
        <!-- Modal effects -->
        <div class="modal fade" id="modaldemo8">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">تغيير حالة الطلب</h6>
                        <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="orders/update" method="POST">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            {{-- حقل عرض رقم الطلب --}}
                            <div class=" form-group">
                                <label for="exampleInputEmail1">
                                    <b>رقم الطلب</b>
                                </label>
                                <input type="hidden" name="id" id="id" value="">
                                <input type="text" class="form-control" name="order_number" id="order_number" required
                                    readonly>
                            </div>
                            {{-- حقل عرض التكلفة الإجمالية --}}
                            <div class=" form-group">
                                <label for="exampleInputEmail1">
                                    <b>التكلفة الإجمالية</b>
                                </label>
                                <input type="text" class="form-control" name="total_price" id="total_price" required
                                    readonly>
                            </div>
                            {{-- حقل عرض اسم الزبون --}}
                            <div class=" form-group">
                                <label for="exampleInputEmail1">
                                    <b>اسم الزبون</b>
                                </label>
                                <input type="text" class="form-control" name="user_id" id="user_name" required readonly>
                            </div>
                            {{-- تغيير حالة الطلب --}}
                            <p class="mg-b-10">تغيير حالة الطلب</p>
                            <select id="order_status" name="order_status" required class="form-control SlectBox">
                                <!--placeholder-->
                                <option selected="true" disabled="disabled">-- حدد حالة الطلب --</option>
                                <option value="wait_shimp">بانتظار الشحن</option>
                                <option value="shimp">قيد الشحن</option>
                                <option value="done">تم التسليم</option>
                                <option value="canceled">ملغي</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-primary" type="submit">حفظ التعديلات</button>
                            <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">إغلاق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal effects-->
        <!-- Delete order -->
        <div class="modal fade" id="DeleteModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content tx-size-sm">
                    <form method="POST" action="orders/destroy">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body tx-center pd-y-20 pd-x-20">
                            <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block">
                            </i>
                            <h1 class="tx-danger mg-b-20">خطر !!</h1>
                            <p class="mg-b-20 mg-x-20">هل تريد حقا حذف هذا الطلب؟؟</h3>
                            </p>
                            <input type="hidden" name="id" id="id" value="">
                            <input class="form-control" name="order_number" id="order_number" type="text" readonly>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn ripple btn-danger">حفظ التغييرات</button>
                            <button type="button" class="btn ripple btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End modal -->
    </div>
@endsection
@section('js')
    <!--Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
    {{-- This script return the value of each input for editing it --}}
    <script>
        $('#modaldemo8').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var order_number = button.data('order_number')
            var total_price = button.data('total_price')
            var user_name = button.data('user_name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #order_number').val(order_number);
            modal.find('.modal-body #total_price').val(total_price);
            modal.find('.modal-body #user_name').val(user_name);
        })
    </script>
    {{-- This script return the value of each input for deleting it --}}
    <script>
        $('#DeleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var order_number = button.data('order_number')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #order_number').val(order_number);
        })
    </script>
@endsection

@extends('layouts.master')

@section('title')
    مدراء الموقع
@endsection

@section('css')
    <!---Internal Owl Carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">

    <!---Internal  Multislider css-->
    <link href="{{ URL::asset('assets/plugins/multislider/multislider.css') }}" rel="stylesheet">

    <!--- Select2 css --->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <!--- Animations css-->
    <link href="{{ URL::asset('assets/css/animate.css') }}" rel="stylesheet">
@endsection


@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                    مدراء الموقع</span>
            </div>
        </div>
        {{-- Add Product with code Button --}}
        <div class="main-dashboard-header-right">
            <a class="modal-effect btn btn-primary btn-block" data-bs-effect="effect-flip-vertical" data-bs-toggle="modal"
                href="#modaldemo8">إضافة مدير موقع</a>
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
    <!--Row-->
    <div class="row row-sm">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">جدول مدراء الموقع</h4>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">
                        يمكنك إدارة مدراء الموقع و البقاء على تواصل مع كافة المدراء من هنا
                    </p>
                </div>
                <div class="card-body">
                    <div class="table-responsive border-top userlist-table">
                        <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th class="wd-lg-8p"><span>#</span></th>
                                    <th class="wd-lg-8p"><span>مدير الموقع</span></th>
                                    <th class="wd-lg-20p"><span></span></th>
                                    <th class="wd-lg-20p"><span>مسجل على الموقع بتاريخ</span></th>
                                    <th class="wd-lg-20p"><span>حالة مدير الموقع</span></th>
                                    <th class="wd-lg-20p"><span>البريد الإلكتروني</span></th>
                                    <th class="wd-lg-20p">الخيارات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            <img alt="avatar" class="rounded-circle avatar-md me-2"
                                                src="../../assets/img/faces/1.jpg">
                                        </td>
                                        <td>{{ $admin->name }}</td>
                                        <td>
                                            {{ $admin->created_at->format('Y M d') }}
                                        </td>
                                        <td class="text-center">
                                            <span class="label text-success d-flex">
                                                <div class="dot-label bg-success me-1">
                                                </div>
                                                active
                                            </span>
                                        </td>
                                        <td>
                                            <a href="#">{{ $admin->email }}</a>
                                        </td>
                                        <td>
                                            <div class="btn-icon-list">
                                                {{-- The Edit Button --}}
                                                <a class="modal-effect btn btn-info btn-icon"
                                                    data-bs-effect="effect-newspaper" data-id="{{ $admin->id }}"
                                                    data-name="{{ $admin->name }}" data-email="{{ $admin->email }}"
                                                    data-bs-toggle="modal" href="#EditModal" title="تعديل">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                {{-- The Delete Button --}}
                                                <a class="modal-effect btn btn-danger btn-icon"
                                                    data-bs-effect="effect-flip-vertical" data-id="{{ $admin->id }}"
                                                    data-name="{{ $admin->name }}" data-bs-toggle="modal"
                                                    href="#DeleteModal" title="حذف">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <ul class="pagination mt-4 mb-0 float-end flex-wrap">
                        <li class="page-item page-prev disabled">
                            <a class="page-link" href="#" tabindex="-1">Prev</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item page-next">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- COL END -->
    </div>
    <!-- row closed  -->

    <!-- Add Product with code -->
    <div class="modal fade" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                {{-- Add Product with code Button --}}
                <div class="modal-header">
                    <h6 class="modal-title">إضافة مدير موقع</h6>
                    <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- The Form --}}
                <form action="{{ route('admin.admins.store') }}" method="POST" autocomplete="on">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        {{-- حقل ادخال اسم مدير الموقع --}}
                        <div class=" form-group">
                            <label for="exampleInputEmail1">
                                <b>اسم مدير الموقع</b>
                            </label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>

                        {{-- حقل ادخال البريد الإلكتروني --}}
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"><b>البريد الإلكتروني</b></label>
                            <input class="form-control" id="email" name="email" data-bs-placement="bottom"
                                data-bs-toggle="tooltip" title="يرجى ادخال البريد الإلكتروني الخاص بمدير الموقع" rows="3"
                                required>
                        </div>

                        {{-- حقل ادخال كلمة المرور --}}
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"><b>كلمة المرور</b></label>
                            <input class="form-control" id="password" name="password" data-bs-placement="bottom"
                                data-bs-toggle="tooltip" title="يرجى ادخال الكود الخاص بالمنتج" rows="3" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">تأكيد</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- End modal -->

    <!-- Edit Main Category -->
    <div class="modal fade" id="EditModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <form method="POST" action="admins/update">
                    <div class="modal-header">
                        <h6 class="modal-title">تعديل معلومات مدير الموقع</h6>
                        <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        {{-- حقل تعديل اسم المستخدم --}}
                        <div class=" form-group">
                            <input type="hidden" name="id" id="id" value="">
                            <label for="exampleInputEmail1">
                                <b>اسم مدير الموقع</b>
                            </label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>

                        {{-- حقل تعديل البريد الإلكتروني --}}
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"><b>البريد الإلكتروني</b></label>
                            <input class="form-control" id="email" name="email" rows="3" required>
                        </div>

                        {{-- حقل تعديل كلمة المرور --}}
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"><b>كلمة المرور</b></label>
                            <input class="form-control" id="password" name="password" rows="3" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">تأكيد</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End modal -->

    <!-- Delete Main Category -->
    <div class="modal fade" id="DeleteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content tx-size-sm">
                <form method="POST" action="admins/destroy">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body tx-center pd-y-20 pd-x-20">
                        <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block">
                        </i>
                        <h1 class="tx-danger mg-b-20">خطر !!</h1>
                        <p class="mg-b-20 mg-x-20">هل تريد حقا حذف مدير الموقع هذا ؟؟</h3>
                        </p>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" name="name" id="name" type="text" readonly>
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
@endsection

@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>

    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>

    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>

    {{-- This script return the value of each input for editing it --}}
    <script>
        $('#EditModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var email = button.data('email')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #email').val(email);
        })
    </script>

    {{-- This script return the value of each input for deleting it --}}
    <script>
        $('#DeleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
        })
    </script>
@endsection

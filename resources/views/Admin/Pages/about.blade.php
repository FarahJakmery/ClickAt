@extends('layouts.master')

@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--- Animations css-->
    <link href="{{ URL::asset('assets/css/animate.css') }}" rel="stylesheet">
@endsection

@section('title')
    عن كليكات
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">الصفحات</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                        عن كليكات </span>
                </div>
            </div>
        </div>
        {{-- Add Product with code Button --}}
        <div class="main-dashboard-header-right">
            <a class="modal-effect btn btn-primary btn-block" data-bs-effect="effect-flip-vertical" data-bs-toggle="modal"
                href="#modaldemo8">إضافة عن كليكات</a>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
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
                                    <th class="border-bottom-0">عن كليكات بالعربي</th>
                                    <th class="border-bottom-0">عن كليكات بالإنجليزية</th>
                                    <th class="border-bottom-0">الخيارات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($abouts as $about)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $about->translate('ar')->text }}</td>
                                        <td>{{ $about->translate('en')->text }}</td>
                                        <td>
                                            <div class="btn-icon-list">
                                                {{-- The Edit Button --}}
                                                <a class="modal-effect btn btn-info btn-icon"
                                                    data-bs-effect="effect-newspaper" data-id="{{ $about->id }}"
                                                    data-arabic_about="{{ $about->text }}" data-bs-toggle="modal"
                                                    href="#EditModal" data-bs-placement="bottom" data-bs-toggle="tooltip"
                                                    title="تعديل">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                {{-- The Delete Button --}}
                                                <a class="modal-effect btn btn-danger btn-icon"
                                                    data-bs-effect="effect-flip-vertical" data-id="{{ $about->id }}"
                                                    data-bs-toggle="modal" href="#DeleteModal" data-bs-placement="bottom"
                                                    data-bs-toggle="tooltip" title="حذف">
                                                    <i class="fa fa-trash"></i>
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

        <!-- Add Product with code -->
        <div class="modal fade" id="modaldemo8">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    {{-- Add About us Button --}}
                    <div class="modal-header">
                        <h6 class="modal-title">عن كليكات</h6>
                        <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{-- The Form --}}
                    <form action="{{ route('admin.about.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="panel panel-primary tabs-style-2">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#tab4" class="nav-link active" data-bs-toggle="tab">عربي</a></li>
                                            <li><a href="#tab5" class="nav-link" data-bs-toggle="tab">انجليزي</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">
                                        {{-- Add Product with code in Arabic --}}
                                        <div class="tab-pane active" id="tab4">
                                            <label for="exampleInputEmail1">
                                                <b>عن كليكات بالعربي</b>
                                            </label>
                                            <div class="col-lg">
                                                <textarea class="form-control" placeholder="Textarea" rows="3" name="text_ar"></textarea>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab5">
                                            <label for="exampleInputEmail1">
                                                <b>عن كليكات بالإنجليزي</b>
                                            </label>
                                            <div class="col-lg">
                                                <textarea class="form-control" placeholder="Textarea" rows="3" name="text_en"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

        <!-- Edit Product with code -->
        <div class="modal fade" id="EditModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">تعديل المنتج</h6><button aria-label="Close" class="close"
                            data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form method="POST" action="productWithCode/update" autocomplete="on" enctype="multipart/form-data">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="panel panel-primary tabs-style-2">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#tab8" class="nav-link active" data-bs-toggle="tab">عربي</a></li>
                                            <li><a href="#tab10" class="nav-link" data-bs-toggle="tab">انجليزي</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">
                                        {{-- Edit Main Category in Arabic --}}
                                        <div class="tab-pane active" id="tab8">
                                            {{-- حقل تعديل اسم المنتج باللغة العربية --}}
                                            <div class=" form-group">
                                                <input type="hidden" name="id" id="id" value="">
                                                <label for="exampleInputEmail1">
                                                    <b>اسم المنتج باللغة العربية</b>
                                                </label>
                                                <input type="text" class="form-control" name="codeproduct_name_ar"
                                                    id="arabic_codeproduct_name" data-bs-placement="bottom"
                                                    data-bs-toggle="tooltip" title="يرجى ادخال اسم المنتج باللغة العربية"
                                                    required>
                                            </div>
                                            {{-- حقل تعديل الرابط الخاص بالمنتج --}}
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1"><b>الرابط</b></label>
                                                <input class="form-control" id="url" name="url" data-bs-placement="bottom"
                                                    data-bs-toggle="tooltip" title="يرجى ادخال الرابط الخاص بالمنتج"
                                                    rows="3" required>
                                            </div>

                                            {{-- حقل تعديل الكود الخاص بالمنتج --}}
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1"><b>الكود</b></label>
                                                <input class="form-control" id="code" name="code"
                                                    data-bs-placement="bottom" data-bs-toggle="tooltip"
                                                    title="يرجى ادخال الكود الخاص بالمنتج" rows="3" required>
                                            </div>

                                            {{-- حقل اختيار الصورة الخاصة بالمنتج --}}
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1"><b>صورة المنتج</b></label>
                                                <p class="text-danger">Logo format jpeg, jpg, png</p>
                                                <input type="file" name="photo_name" class="dropify"
                                                    data-height="70" />
                                            </div>
                                        </div>

                                        {{-- Edit Product with code in English --}}
                                        <div class="tab-pane" id="tab10">
                                            {{-- حقل تعديل اسم المنتج باللغة العربية --}}
                                            <div class=" form-group">
                                                <label for="exampleInputEmail1">
                                                    <b>اسم المنتج باللغة الإنجليزية</b>
                                                </label>
                                                <input type="text" class="form-control" name="codeproduct_name_en"
                                                    id="english_codeproduct_name" data-bs-placement="bottom"
                                                    data-bs-toggle="tooltip" title="يرجى ادخال اسم المنتج باللغة الإنجليزية"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">تأكيد</button>
                            <button type="button" class="btn btn-secondary" data-ds-dismiss="modal">إغلاق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End modal -->

        <!-- Delete Product with code -->
        <div class="modal fade" id="DeleteModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content tx-size-sm">
                    <form method="POST" action="productWithCode/destroy" autocomplete="on">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body tx-center pd-y-20 pd-x-20">
                            <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block">
                            </i>
                            <h1 class="tx-danger mg-b-20">خطر !!</h1>
                            <p class="mg-b-20 mg-x-20">هل تريد حقا حذف هذا المنتج؟؟</h3>
                            </p>
                            <input type="hidden" name="id" id="id" value="">
                            <input class="form-control" name="codeproduct_name_ar" id="arabic_codeproduct_name"
                                type="text" readonly>
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
    <!--Internal  Select2 js -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
@endsection

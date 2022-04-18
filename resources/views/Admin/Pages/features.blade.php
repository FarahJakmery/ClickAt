@extends('layouts.master')

@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--- Animations css-->
    <link href="{{ URL::asset('assets/css/animate.css') }}" rel="stylesheet">
@endsection

@section('title')
    مميزات كليكات
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">الصفحات</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                        مميزات كليكات </span>
                </div>
            </div>
        </div>
        {{-- Add Product with code Button --}}
        <div class="main-dashboard-header-right">
            <a class="modal-effect btn btn-primary btn-block" data-bs-effect="effect-flip-vertical" data-bs-toggle="modal"
                href="#modaldemo8">إضافة مميزات لكليكات</a>
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
                                    <th class="border-bottom-0">توصيل سريع للزبون</th>
                                    <th class="border-bottom-0">نص الميزة الأولى</th>
                                    <th class="border-bottom-0">دفع آمن</th>
                                    <th class="border-bottom-0">نص الميزة الثانية</th>
                                    <th class="border-bottom-0">24/24 خدمة العملاء</th>
                                    <th class="border-bottom-0">نص الميزة الثالثة</th>
                                    <th class="border-bottom-0">الخيارات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($features as $feature)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $feature->translate('ar')->feature1 }}</td>
                                        <td>{{ $feature->translate('ar')->text1 }}</td>
                                        <td>{{ $feature->translate('ar')->feature2 }}</td>
                                        <td>{{ $feature->translate('ar')->text2 }}</td>
                                        <td>{{ $feature->translate('ar')->feature3 }}</td>
                                        <td>{{ $feature->translate('ar')->text3 }}</td>
                                        <td>
                                            <div class="btn-icon-list">
                                                {{-- The Edit Button --}}
                                                <a class="modal-effect btn btn-info btn-icon"
                                                    data-bs-effect="effect-newspaper" data-id="{{ $feature->id }}"
                                                    data-arabic_feature1="{{ $feature->translate('ar')->feature1 }}"
                                                    data-arabic_text1="{{ $feature->translate('ar')->text1 }}"
                                                    data-arabic_feature2="{{ $feature->translate('ar')->feature2 }}"
                                                    data-arabic_text2="{{ $feature->translate('ar')->text2 }}"
                                                    data-arabic_feature3="{{ $feature->translate('ar')->feature3 }}"
                                                    data-arabic_text3="{{ $feature->translate('ar')->text3 }}"
                                                    data-english_feature1="{{ $feature->translate('en')->feature1 }}"
                                                    data-english_text1="{{ $feature->translate('en')->text1 }}"
                                                    data-english_feature2="{{ $feature->translate('en')->feature2 }}"
                                                    data-english_text2="{{ $feature->translate('en')->text2 }}"
                                                    data-english_feature3="{{ $feature->translate('en')->feature3 }}"
                                                    data-english_text3="{{ $feature->translate('en')->text3 }}"
                                                    data-bs-toggle="modal" href="#EditModal" data-bs-placement="bottom"
                                                    data-bs-toggle="tooltip" title="تعديل">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                {{-- The Delete Button --}}
                                                <a class="modal-effect btn btn-danger btn-icon"
                                                    data-bs-effect="effect-flip-vertical" data-id="{{ $feature->id }}"
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
                        <h6 class="modal-title">مميزات كليكات</h6>
                        <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{-- The Form --}}
                    <form action="{{ route('admin.features.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="panel panel-primary tabs-style-2">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li>
                                                <a href="#tab4" class="nav-link active" data-bs-toggle="tab">
                                                    الميزةالأولى
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab5" class="nav-link" data-bs-toggle="tab">
                                                    الميزة الثانية
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab6" class="nav-link" data-bs-toggle="tab">
                                                    الميزة الثالثة
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">
                                        {{-- Add Product with code in Arabic --}}
                                        <div class="tab-pane active" id="tab4">
                                            <label for="exampleInputEmail1">
                                                <b>اسم المميزة الأولى بالعربي</b>
                                            </label>
                                            <input type="text" class="form-control" name="feature1_ar"
                                                id="arabic_feature1" required>
                                            <label for="exampleInputEmail1">
                                                <b>نص المميزة الأولى بالعربي</b>
                                            </label>
                                            <div class="col-lg">
                                                <textarea class="form-control" placeholder="Textarea" rows="3" name="text1_ar" id="english_feature1"></textarea>
                                            </div>
                                            <label for="exampleInputEmail1">
                                                <b>اسم المميزة الأولى بالإنجليزي</b>
                                            </label>
                                            <input type="text" class="form-control" name="feature1_en"
                                                id="english_feature1" required>
                                            <label for="exampleInputEmail1">
                                                <b>نص المميزة الأولى بالإنجليزي</b>
                                            </label>
                                            <div class="col-lg">
                                                <textarea class="form-control" placeholder="Textarea" rows="3" name="text1_en" id="english_text1"></textarea>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab5">
                                            <label for="exampleInputEmail1">
                                                <b>اسم المميزة الثانية بالعربي</b>
                                            </label>
                                            <input type="text" class="form-control" name="feature2_ar"
                                                id="arabic_feature2" required>
                                            <label for="exampleInputEmail1">
                                                <b>نص المميزة الثانية بالعربي</b>
                                            </label>
                                            <div class="col-lg">
                                                <textarea class="form-control" placeholder="Textarea" rows="3" name="text2_ar" id="arabic_text2"></textarea>
                                            </div>
                                            <label for="exampleInputEmail1">
                                                <b>اسم المميزة الثانية بالإنجليزي</b>
                                            </label>
                                            <input type="text" class="form-control" name="feature2_en"
                                                id="arabic_feature2" required>
                                            <label for="exampleInputEmail1">
                                                <b>نص المميزة الثانية بالإنجليزي</b>
                                            </label>
                                            <div class="col-lg">
                                                <textarea class="form-control" placeholder="Textarea" rows="3" name="text2_en" id="english_text2"></textarea>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab6">
                                            <label for="exampleInputEmail1">
                                                <b>اسم المميزة الثالثة بالعربي</b>
                                            </label>
                                            <input type="text" class="form-control" name="feature3_ar"
                                                id="arabic_feature3" required>
                                            <label for="exampleInputEmail1">
                                                <b>نص المميزة الثالثة بالعربي</b>
                                            </label>
                                            <div class="col-lg">
                                                <textarea class="form-control" placeholder="Textarea" rows="3" name="text3_ar" id="arabic_text3"></textarea>
                                            </div>
                                            <label for="exampleInputEmail1">
                                                <b>اسم المميزة الثالثة بالإنجليزي</b>
                                            </label>
                                            <input type="text" class="form-control" name="feature3_en"
                                                id="arabic_feature3" required>
                                            <label for="exampleInputEmail1">
                                                <b>نص المميزة الثالثة بالإنجليزي</b>
                                            </label>
                                            <div class="col-lg">
                                                <textarea class="form-control" placeholder="Textarea" rows="3" name="text3_en" id="english_text3"></textarea>
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

    <!--Internal quill js -->
    <script src="{{ URL::asset('assets/plugins/quill/quill.min.js') }}"></script>

    <!-- Internal Form-editor js -->
    <script src="{{ URL::asset('assets/js/form-editor.js') }}"></script>
@endsection

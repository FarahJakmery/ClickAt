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

    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">

    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />

    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />

    <!--Internal  Font Awesome -->
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!--Internal Sumoselect css-->
    <link href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}" rel="stylesheet">
@endsection

@section('title')
    منتج مع كود
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">الأكواد</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                        منتج مع كود</span>
                </div>
            </div>
        </div>
        {{-- Add Product with code Button --}}
        <div class="main-dashboard-header-right">
            <a class="modal-effect btn btn-primary btn-block" data-bs-effect="effect-flip-vertical" data-bs-toggle="modal"
                href="#modaldemo8">إضافة منتج مع كود</a>
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
                                    <th class="border-bottom-0">اسم المنتج عربي</th>
                                    <th class="border-bottom-0">اسم المنتج انجليزي</th>
                                    <th class="border-bottom-0">الرابط</th>
                                    <th class="border-bottom-0">الكود</th>
                                    <th class="border-bottom-0">صورة المنتج</th>
                                    <th class="border-bottom-0">الخيارات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($codes as $code)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $code->translate('ar')->codeproduct_name }}</td>
                                        <td>{{ $code->translate('en')->codeproduct_name }}</td>
                                        <td>{{ $code->url }}</td>
                                        <td>{{ $code->code }}</td>
                                        <td>
                                            <img alt="Responsive image" class="img-thumbnail wd-75p wd-sm-75"
                                                src="{{ asset($code->photo_name) }} ">
                                        </td>
                                        <td>
                                            <div class="btn-icon-list">
                                                {{-- The Edit Button --}}
                                                <a class="modal-effect btn btn-info btn-icon"
                                                    data-bs-effect="effect-newspaper" data-id="{{ $code->id }}"
                                                    data-arabic_codeproduct_name="{{ $code->translate('ar')->codeproduct_name }}"
                                                    data-english_codeproduct_name="{{ $code->translate('en')->codeproduct_name }}"
                                                    data-url="{{ $code->url }}" data-code="{{ $code->code }}"
                                                    data-bs-toggle="modal" href="#EditModal" data-bs-placement="bottom"
                                                    data-bs-toggle="tooltip" title="تعديل">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                {{-- The Delete Button --}}
                                                <a class="modal-effect btn btn-danger btn-icon"
                                                    data-bs-effect="effect-flip-vertical" data-id="{{ $code->id }}"
                                                    data-arabic_codeproduct_name="{{ $code->translate('ar')->codeproduct_name }}"
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
                    {{-- Add Product with code Button --}}
                    <div class="modal-header">
                        <h6 class="modal-title">إضافة منتج مع كود</h6>
                        <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{-- The Form --}}
                    <form action="{{ route('productWithCode.store') }}" method="POST" enctype="multipart/form-data"
                        autocomplete="on">
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
                                            {{-- حقل ادخال اسم المنتج باللغة العربية --}}
                                            <div class=" form-group">
                                                <label for="exampleInputEmail1">
                                                    <b>اسم المنتج باللغة العربية</b>
                                                </label>
                                                <input type="text" class="form-control" name="codeproduct_name_ar"
                                                    id="arabic_codeproduct_name" required>
                                            </div>

                                            {{-- حقل ادخال الرابط الخاص بالمنتج --}}
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1"><b>الرابط</b></label>
                                                <input class="form-control" id="url" name="url" data-bs-placement="bottom"
                                                    data-bs-toggle="tooltip" title="يرجى ادخال الرابط الخاص بالمنتج"
                                                    rows="3" required>
                                            </div>

                                            {{-- حقل ادخال الكود الخاص بالمنتج --}}
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
                                                <input type="file" name="photo_name" class="dropify" data-height="70"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab5">
                                            {{-- حقل ادخال اسم المنتج باللغة الإنجليزية --}}
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
    <!-- row closed -->
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

    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>

    <!-- Internal Select2.min js -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>

    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>

    <!-- Internal Treeview js -->
    <script src="{{ URL::asset('assets/plugins/treeview/treeview.js') }}"></script>

    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>

    <!--Internal  Clipboard js-->
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>

    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>

    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>

    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>

    {{-- This script return the value of each input for editing it --}}
    <script>
        $('#EditModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var arabic_codeproduct_name = button.data('arabic_codeproduct_name')
            var english_codeproduct_name = button.data('english_codeproduct_name')
            var url = button.data('url')
            var code = button.data('code')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #arabic_codeproduct_name').val(arabic_codeproduct_name);
            modal.find('.modal-body #english_codeproduct_name').val(english_codeproduct_name);
            modal.find('.modal-body #url').val(url);
            modal.find('.modal-body #code').val(code);
        })
    </script>

    {{-- This script return the value of each input for deleting it --}}
    <script>
        $('#DeleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var arabic_codeproduct_name = button.data('arabic_codeproduct_name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #arabic_codeproduct_name').val(arabic_codeproduct_name);
        })
    </script>
@endsection

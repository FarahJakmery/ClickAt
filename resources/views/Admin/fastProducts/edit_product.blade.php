@extends('layouts.master')

@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />

    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />

    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">

    <!--Internal  Font Awesome -->
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">

    //////
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{ URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css') }}"
        rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css') }}"
        rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/pickerjs/picker.min.css') }}" rel="stylesheet">

    <!-- Internal Spectrum-colorpicker css -->
    <link href="../../assets/plugins/spectrum-colorpicker/spectrum.css" rel="stylesheet">

    <!--- Animations css-->
    <link href="../../assets/css/animate.css" rel="stylesheet">
@endsection

@section('title')
    تعديل منتج بيع سريع
@endsection


@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">منتجات البيع السريع</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                    تعديل منتج بيع سريع</span>
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

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('fastSellingProduct.update', $product->id) }}" method="POST"
                        enctype="multipart/form-data" autocomplete="on">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        <h5>البيانات الأساسية للمنتج</h5>
                        <div class="card">
                            <div class="card-body">
                                {{-- Row 1 --}}
                                <div class="row">
                                    <div class="col">
                                        <label for="product_number" class="control-label">رقم المنتج</label>
                                        <input type="number" class="form-control" id="product_number"
                                            name="product_number"
                                            value="{{ old('product_number') ?? $product->product_number }}"
                                            data-bs-placement="bottom" data-bs-toggle="tooltip"
                                            title="يرجي ادخال رقم المنتج" placeholder="مثال: 12345" required>
                                    </div>

                                    <div class="col">
                                        <label>اسم المنتج باللغة العربية</label>
                                        <input type="text" class="form-control" id="arabic_name" name="name_ar"
                                            value="{{ old('name_ar') ?? $product->translate('ar')->name }}"
                                            data-bs-placement="bottom" data-bs-toggle="tooltip"
                                            title="يرجى ادخال اسم المنتج بالعربية" placeholder="مثال: بنطال جينز" required>
                                    </div>

                                    <div class="col">
                                        <label>اسم المنتج باللغة الإنجليزية</label>
                                        <input type="text" class="form-control" id="english_name" name="name_en"
                                            value="{{ old('name_en') ?? $product->translate('en')->name }}"
                                            data-bs-placement="bottom" data-bs-toggle="tooltip"
                                            title="يرجى ادخال اسم المنتج بالإنجليزية" placeholder="Jeans :Ex" required>
                                    </div>
                                </div><br>

                                {{-- Row 2 --}}
                                <div class="row">
                                    <div class="col">
                                        <div class="col">
                                            <p class="mg-b-20">تاريخ إنشاء المنتج</p>
                                            <div class="row row-sm">
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <div class="input-group-text">
                                                            <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input class="form-control fc-datepicker" name="product_date"
                                                        type="text" value="{{ date('Y-m-d') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="col">
                                            <p class="mg-b-20">تاريخ إنتهاء فترة عرض المنتج</p>
                                            <div class="row row-sm">
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <div class="input-group-text">
                                                            <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" value="2015-02-15 21:05" id="datetimepicker1"
                                                        name="expiry_date" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                                {{-- Row 3 --}}
                                <div class="row">
                                    <div class="col">
                                        <p class="mg-b-10">التصنيفات الرئيسية</p>
                                        <select multiple="multiple" class="testselect2" name="mcategories[]"
                                            id="mcategories[]" required>
                                            @foreach ($MCates as $MCate)
                                                <option value="{{ $MCate->id }}"
                                                    {{ in_array($MCate->id, $product->mcategories->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                    {{ $MCate->translate('en')->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><br>
                            </div>
                        </div>

                        <h5>البيانات التفصيلية للمنتج</h5>
                        <div class="card">
                            <div class="card-body">
                                {{-- Row 4 --}}
                                <div class="row">
                                    <div class="col">
                                        <label for="inputName" class="control-label">السعر الأقصى</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-text">
                                                <span class="input-group-text">00.</span>
                                            </div>
                                            <input aria-label="Amount (to the nearest dollar)" class="form-control"
                                                type="text" id="max_price" name="max_price"
                                                value="{{ old('max_price') ?? $product->max_price }}"
                                                data-bs-placement="bottom" data-bs-toggle="tooltip"
                                                title="يرجى ادخال السعر الأقصى للمنتج">
                                            <div class="input-group-text">
                                                <span class="input-group-text">$</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <label for="inputName" class="control-label">السعر الأدنى</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-text">
                                                <span class="input-group-text">00.</span>
                                            </div>
                                            <input aria-label="Amount (to the nearest dollar)" class="form-control"
                                                type="text" id="min_price" name="min_price"
                                                value="{{ old('min_price') ?? $product->min_price }}"
                                                data-bs-placement="bottom" data-bs-toggle="tooltip"
                                                title="يرجى ادخال السعر الأدنى للمنتج">
                                            <div class="input-group-text">
                                                <span class="input-group-text">$</span>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="col">
                                        <label for="inputName" class="control-label">قيمة تناقص سعر المنتج</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-text">
                                                <span class="input-group-text">00.</span>
                                            </div>
                                            <input aria-label="Amount (to the nearest dollar)" class="form-control"
                                                type="text" id="decreasing_value" name="decreasing_value"
                                                value="{{ old('decreasing_value') ?? $product->decreasing_value }}"
                                                data-bs-placement="bottom" data-bs-toggle="tooltip"
                                                title="يرجى ادخال قيمة تناقص سعر المنتج">
                                            <div class="input-group-text">
                                                <span class="input-group-text">$</span>
                                            </div>
                                        </div>
                                    </div> --}}

                                </div><br>

                                {{-- Row 5 --}}
                                <div class="row">
                                    <div class="col">
                                        <p class="mg-b-10">مدة تناقص السعر</p>
                                        <div class="input-group mb-3">
                                            <div class="input-group-text">
                                                <span class="input-group-text">دقيقة</span>
                                            </div>
                                            <input aria-label="Amount (to the nearest dollar)" class="form-control"
                                                type="number" id="minutes" name="minutes"
                                                value="{{ old('minutes') ?? $product->minutes }}"
                                                data-bs-placement="bottom" data-bs-toggle="tooltip"
                                                title="يرجى ادخال المدة التي سيتاقص بعدها سعر المنتج">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <h5>صورة المنتج</h5>
                        <div class="card">
                            <div class="card-body">
                                {{-- Row 6 --}}
                                <p class="text-danger">* صيغة الصورة pdf, jpeg ,.jpg , png</p>
                                <div class="col-sm-12 col-md-12">
                                    <input type="file" name="photo_name" class="dropify" data-height="70" />
                                </div><br>
                            </div>
                        </div>

                        {{-- Submit & cancel Buttons --}}
                        <div class="d-flex flex-row justify-content-end mg-b-20">
                            <div>
                                <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>

    <!-- Internal Select2 js -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>

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

    <!-- Internal  pickerjs js -->
    <script src="{{ URL::asset('assets/plugins/pickerjs/picker.min.js') }}"></script>

    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{ URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>

    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>

    <!-- Internal  Form-elements js -->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>

    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>

    <!-- Internal  pickerjs js -->
    <script src="{{ URL::asset('assets/plugins/pickerjs/picker.min.js') }}"></script>

    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{ URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>

    <script>
        var date = $('.fc-datepicker').datetimepicker({
            format: 'yyyy-mm-dd hh:ii',
            autoclose: true
        }).val();
    </script>

    <script>
        var date = $('#datetimepicker1').datetimepicker({
            format: 'yyyy-mm-dd hh:ii'
        }).val();
    </script>
@endsection

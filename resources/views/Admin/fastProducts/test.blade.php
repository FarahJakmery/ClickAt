@extends('layouts.master')

@section('css')
    <!-- Internal Select2 css -->
    <link href="../../assets/plugins/select2/css/select2.min.css" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="../../assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css" rel="stylesheet">
    <link href="../../assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css" rel="stylesheet">
    <link href="../../assets/plugins/pickerjs/picker.min.css" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="../../assets/plugins/spectrum-colorpicker/spectrum.css" rel="stylesheet">
    <!--- Animations css-->
    <link href="../../assets/css/animate.css" rel="stylesheet">
@endsection

@section('title')
    إضافة منتج بيع سريع
@endsection


@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">منتجات البيع السريع</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                    إضافة منتج بيع سريع</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
            <!--div-->
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        البيانات الأساسية للمنتج
                    </div>
                    <div class="row row-sm">
                        <div class="col-lg">
                            <label for="">رقم النتج</label>
                            <input class="form-control" placeholder="مثال:12345" type="text">
                        </div>
                        <div class="col-lg">
                            <label for="">اسم المنتج باللغة العربية</label>
                            <input class="form-control" placeholder="مثال: بنطال جينز" type="text">
                        </div>
                        <div class="col-lg">
                            <label for="">اسم المنتج باللغة الانكليزية</label>
                            <input class="form-control" placeholder="ex:jeans" type="text">
                        </div>
                    </div>
                    <div class="row row-sm mg-t-20">
                        <div class="col-lg">
                            <label for="">وصف المنتج باللغة العربية</label>
                            <textarea class="form-control" placeholder="وصف المنتج باللغة العربية" rows="3"></textarea>
                        </div>
                        <div class="col-lg">
                            <label for="">وصف المنتج باللغة الانكليزية</label>
                            <textarea class="form-control" placeholder="وصف المنتج باللغة الانكليزية" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row row-sm mg-t-20">
                        <div class="col-lg">
                            <label for="">تاريخ انشاء المنتج</label>
                            <div class="input-group col-md-12">
                                <div class="input-group-text">
                                    <div class="input-group-text">
                                        <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                    </div>
                                </div><input class="form-control" id="datetimepicker2" type="text"
                                    value="2018-12-20 21:05">
                            </div>
                        </div>
                        <div class="col-lg">
                            <label for="">تاريخ انشاء المنتج</label>
                            <div class="input-group col-md-12">
                                <div class="input-group-text">
                                    <div class="input-group-text">
                                        <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                    </div>
                                </div><input class="form-control" id="datetimepicker3" type="text"
                                    value="2018-12-20 21:05">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->

        <!--div-->
        <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        البيانات التفصيلية للنتج
                    </div>
                    <div class="row row-sm">
                        <div class="col-lg-4">
                            <label for="">السعر الأقصى</label>
                            <div class="input-group mb-3">
                                <div class="input-group-text">
                                    <span class="input-group-text">$</span>
                                </div><input aria-label="Amount (to the nearest dollar)" class="form-control" type="text">
                                <div class="input-group-text">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div><!-- input-group -->
                        </div>
                        <div class="col-lg-4">
                            <label for="">السعر الأدنى</label>
                            <div class="input-group mb-3">
                                <div class="input-group-text">
                                    <span class="input-group-text">$</span>
                                </div><input aria-label="Amount (to the nearest dollar)" class="form-control" type="text">
                                <div class="input-group-text">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div><!-- input-group -->
                        </div>
                        <div class="col-lg-4">
                            <label for="">قيمة تناقص سعر المنتج</label>
                            <div class="input-group mb-3">
                                <div class="input-group-text">
                                    <span class="input-group-text">$</span>
                                </div><input aria-label="Amount (to the nearest dollar)" class="form-control" type="text">
                                <div class="input-group-text">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div><!-- input-group -->
                        </div>
                        <div class="col-lg-12">
                            <label for="">مدة تناقص سعر المنتج</label>
                            <div class="input-group mb-3">
                                <div class="input-group-text">
                                    <span class="input-group-text">دقيقة</span>
                                </div><input aria-label="Amount (to the nearest dollar)" class="form-control" type="text">
                            </div><!-- input-group -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->

    </div>
    <!-- row closed -->
@endsection

@section('js')
    <!--Internal  Datepicker js -->
    <script src="../../assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>

    <!--Internal  jquery.maskedinput js -->
    <script src="../../assets/plugins/jquery.maskedinput/jquery.maskedinput.js"></script>

    <!--Internal  spectrum-colorpicker js -->
    <script src="../../assets/plugins/spectrum-colorpicker/spectrum.js"></script>

    <!-- Internal Select2.min js -->
    <script src="../../assets/plugins/select2/js/select2.min.js"></script>

    <!--Internal Ion.rangeSlider.min js -->
    <script src="../../assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>

    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="../../assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>

    <!-- Ionicons js -->
    <script src="../../assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js"></script>

    <!--Internal  pickerjs js -->
    <script src="../../assets/plugins/pickerjs/picker.min.js"></script>

    <!-- Internal form-elements js -->
    <script src="../../assets/js/form-elements.js"></script>
@endsection

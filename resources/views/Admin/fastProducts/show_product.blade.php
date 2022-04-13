@extends('layouts.master')

@section('css')
    <!--- Animations css-->
    <link href="{{ URL::asset('assets/css/animate.css') }}" rel="stylesheet">
@endsection

@section('title')
    تفاصيل المنتج
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">منتجات البيع السريع</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                    تفاصيل المنتج</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body h-100">
                    <div class="row row-sm ">
                        {{-- صورة المنتج --}}
                        <div class=" col-xl-5 col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{ asset($product->photo_name) }} ">
                                </div>
                            </div>
                            {{-- Options Buttons --}}
                            <div class="card">
                                <div class="card-body d-flex flex-row justify-content-center">
                                    <div class="action">
                                        <div class="row">
                                            <div class="col">
                                                <a href="{{ route('fastSellingProduct.edit', $product->id) }}">
                                                    <button class="btn btn-primary" type="button">
                                                        تعديل المنتج
                                                    </button>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <form action="{{ route('fastSellingProduct.destroy', $product->id) }}"
                                                    method="POST">
                                                    {{ method_field('delete') }}
                                                    {{ csrf_field() }}
                                                    <button class="btn btn-danger" type="submit" value="Delete">
                                                        حذف المنتج
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- تفاصيل المنتج --}}
                        <div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
                            <h5>البيانات الأساسية للمنتج</h5>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="product-title mb-3">رقم المنتج:
                                        <span class="h5 ms-2 text-primary">{{ $product->product_number }}</span>
                                    </h5>
                                    <h5 class="product-title mb-3">اسم المنتج باللغة العربية:
                                        <span class="h5 ms-2 text-primary">{{ $product->translate('ar')->name }}</span>
                                    </h5>
                                    <h5 class="product-title mb-3">اسم المنتج باللغة الإنجليزية:
                                        <span class="h5 ms-2 text-primary">{{ $product->translate('en')->name }}</span>
                                    </h5>
                                </div>
                            </div>

                            <h5>البيانات التفصيلية للمنتج</h5>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="product-title mb-3">التصنيفات الرئيسية:
                                        @foreach ($product->mcategories as $Mcate)
                                            <span
                                                class="h5 ms-2 text-primary">{{ $Mcate->translate('en')->category_name }}
                                            </span>
                                        @endforeach
                                    </h5>
                                    <h5 class="product-title mb-3">السعر الأقصى للمنتج:
                                        <span class="h5 ms-2 text-primary">{{ $product->max_price }}$</span>
                                    </h5>
                                    <h5 class="product-title mb-3">السعر الأدنى للمنتج:
                                        <span class="h5 ms-2 text-primary">{{ $product->min_price }}$</span>
                                    </h5>
                                    <h5 class="product-title mb-3">قيمة تناقص سعر المنتج :
                                        <span class="h5 ms-2 text-primary">{{ $product->decreasing_value }}$</span>
                                    </h5>
                                    <h5 class="product-title mb-3">فترة عرض المنتج في الموقع :
                                        <br><span class="h5 ms-2 text-primary">{{ $product->counter }}</span>
                                    </h5>
                                    <h5 class="product-title mb-3">مدة تناقص السعر
                                        <span class="h5 ms-2 text-primary">{{ $product->minutes }}دقيقة</span>
                                    </h5>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
@endsection

@section('js')
@endsection

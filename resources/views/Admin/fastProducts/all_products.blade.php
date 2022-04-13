@extends('layouts.master')

@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{ URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
@endsection

@section('title')
    المنتجات
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">المنتجات</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                        منتجات البيع السريع</span>
                </div>
            </div>
        </div>
        <div class="main-dashboard-header-right">
            <a href="fastSellingProduct/create">
                <button type="submit" class="btn btn-primary">إضافة منتج بيع سريع</button>
            </a>
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
        <div class="col-xl-12 col-lg-12 col-md-12">

            {{-- مربع البحث --}}
            <div class="card">
                <div class="card-body p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search ...">
                        <span class="input-group-text p-0">
                            <button class="btn btn-primary" type="button">Search</button>
                        </span>
                    </div>
                </div>
            </div>

            {{-- المنجات --}}
            <div class="row row-sm">
                @foreach ($products as $product)
                    <div class="col-md-6 col-lg-6 col-xl-4  col-sm-6">
                        <a href="{{ route('fastSellingProduct.show', $product->id) }}">
                            <div class="card">
                                <div class="card-body h-100">
                                    <div class="pro-img-box">
                                        {{-- <div class="d-flex product-sale">
                                            <div class="badge bg-pink">جديد</div>
                                        </div> --}}
                                        <img src="{{ asset($product->photo_name) }}">
                                    </div>

                                    <div class="text-center pt-3">
                                        <h3 class="h3 mb-2 mt-4 fw-bold text-uppercase">
                                            {{ $product->translate('en')->name }}
                                        </h3>

                                        <div>
                                            @foreach ($product->mcategories as $MCate)
                                                <span class="badge bg-info">
                                                    {{ $MCate->translate('en')->category_name }}
                                                </span>
                                            @endforeach
                                        </div>
                                        {{-- السعر بعد التخفيضات --}}
                                        <h4 class="h5 mb-0 mt-2 text-center fw-bold text-danger">
                                            ${{ $product->min_price }}
                                            {{-- السعر الأساسي --}}
                                            <span class="text-secondary fw-normal tx-13 ms-1 prev-price">
                                                ${{ $product->max_price }}
                                            </span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

                {{-- Pagination --}}
                <ul class="pagination product-pagination ms-auto float-end">
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
    </div>
    <!-- row closed -->
@endsection

@section('js')
    <!-- Internal Nice-select js-->
    <script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js') }}"></script>
@endsection

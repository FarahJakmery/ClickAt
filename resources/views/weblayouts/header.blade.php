<!-- header-area -->
<header class="header-style-two header-style-three">

    <!-- menu-area -->
    <div id="sticky-header" class="main-header menu-area">
        <div class="custom-container-two">
            <div class="row">
                <div class="col-12">
                    <div class="mobile-nav-toggler">
                        <i class="fas fa-bars"></i>
                    </div>
                    <div class="menu-wrap">
                        <nav class="menu-nav show">
                            <div class="logo">
                                <a href="{{ route('user.home') }}">
                                    <img class="logo" src="{{ URL::asset('Web/assets/img/logo-sm.png') }}"
                                        alt="Logo">
                                </a>
                            </div>
                            <div class="navbar-wrap main-menu d-none d-lg-flex">
                                <ul class="navigation">
                                    <li class="{{ Route::currentRouteName() == 'user.home' ? 'active' : '' }}">
                                        <a href="{{ route('user.home') }}">الرئيسية</a>
                                    </li>
                                    <li class="{{ Route::currentRouteName() == 'user.about' ? 'active' : '' }}">
                                        <a href="{{ route('user.about') }}">عن كليكات</a>
                                    </li>
                                    <li
                                        class="dropdown
                                        {{ Route::currentRouteName() == 'user.FastSellingProducts.index' ? 'active' : '' }}">
                                        <a href="{{ route('user.FastSellingProducts.index') }}">
                                            منتجات البيع السريع
                                        </a>
                                        <ul class="submenu">
                                            @foreach ($mainCategories as $mainCategory)
                                                <li>
                                                    <a
                                                        href="{{ route('user.showFastProductsForMainCategory', $mainCategory->id) }}">
                                                        {{ $mainCategory->translate('ar')->category_name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li
                                        class="dropdown {{ Route::currentRouteName() == 'user.Products.index' ? 'active' : '' }}">
                                        <a href="{{ route('user.Products.index') }}">منتجات خارجية</a>
                                        <ul class="submenu">
                                            @foreach ($mainCategories as $mainCategory)
                                                <li>
                                                    <a
                                                        href="{{ route('user.showProductsForMainCategory', $mainCategory->id) }}">
                                                        {{ $mainCategory->translate('ar')->category_name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li
                                        class="{{ Route::currentRouteName() == 'user.Codes.index' ? 'active' : '' }}">
                                        <a href="{{ route('user.Codes.index') }}">أكواد كليكات</a>
                                    </li>
                                    <li class="{{ Route::currentRouteName() == 'user.contact' ? 'active' : '' }}">
                                        <a href="{{ route('user.contact') }}">تواصل معنا</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="header-action d-none d-md-block">
                                <ul>
                                    {{-- User Info --}}
                                    @if (Auth::guest())
                                        <li class=" dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                                aria-expanded="false">
                                                <i class="flaticon-user"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('user.login') }}">
                                                    تسجيل الدخول
                                                </a>
                                                <a class="dropdown-item" href="{{ route('user.login') }}">
                                                    إنشاء حساب
                                                </a>
                                            </div>
                                        </li>
                                    @endif

                                    @if (!Auth::guest())
                                        <li class=" dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                                aria-expanded="false">
                                                <i class="flaticon-user"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('user.editProfile', Auth::user()->id) }}">
                                                    {{ Auth::user()->first_name }}
                                                </a>
                                                <a class="dropdown-item" href="{{ route('user.logout') }}"
                                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                    تسجيل خروج
                                                </a>
                                                <form action="{{ route('user.logout') }}" method="POST"
                                                    class="d-none" id="logout-form">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>

                                        {{-- Wishlist --}}
                                        <li>
                                            <a href="{{ route('user.wishlist.index') }}">
                                                <i class="flaticon-heart"></i>
                                            </a>
                                        </li>
                                    @endif

                                    {{-- Shop-Cart --}}
                                    <li class="header-shop-cart">

                                        <a href="#">
                                            <i class="flaticon-shopping-bag"></i>
                                            <span class="cart-count">{{ $array['count_items'] }}</span>
                                        </a>


                                        <ul class="minicart">
                                            @if (count($array['fastProduct_detailss']) == 0)
                                                <li class="empty-cart">
                                                    <img src="{{ URL::asset('Web/assets/img/icon/cart.png') }}"
                                                        alt="empty-cart">
                                                    <p>لا يوجد منتجات مضافة الى العربة</p>
                                                </li>
                                            @endif
                                            @foreach ($array['fastProduct_detailss'] as $fastProducts)
                                                <li class="d-flex align-items-start">
                                                    <div class="cart-img">
                                                        <a href="#">
                                                            <img src="{{ asset($fastProducts['fast_product']->photo_name) }}"
                                                                alt="">
                                                        </a>
                                                    </div>
                                                    <div class="cart-content">
                                                        <h4>
                                                            <a
                                                                href="#">{{ $fastProducts['fast_product']->translate('ar')->name }}</a>
                                                        </h4>
                                                        <div class="cart-price">
                                                            <span class="new">
                                                                <span>{{ number_format($fastProducts['price']) }}</span>
                                                                ر.س
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!--<div class="del-icon">-->
                                                    <!--    <a href="#"class="removeFromCart" data-product_id="{{ $fastProducts['fast_product']->id }}">-->
                                                    <!--        <i class="far fa-trash-alt"></i>-->
                                                    <!--    </a>-->
                                                    <!--</div>-->
                                                </li>
                                            @endforeach

                                            <li>
                                                <div class="total-price">
                                                    <span class="f-left">المجموع:</span>
                                                    <span class="f-right">
                                                        <span>{{ number_format($array['price_for_all_thing']) }}</span>
                                                        ر.س
                                                    </span>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="checkout-link">
                                                    <a href="{{ route('user.Cart') }}">حقيبة التسوق</a>
                                                    <a class="red-color"
                                                        href="{{ route('user.getPaymentPage') }}">الدفع</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>

                    <!-- Mobile Menu  -->
                    <div class="mobile-menu">
                        <div class="menu-backdrop"></div>
                        <div class="close-btn">
                            <i class="fas fa-times"></i>
                        </div>

                        <nav class="menu-box">
                            <div class="nav-logo">
                                <a href="{{ route('user.home') }}">
                                    <img src="{{ URL::asset('Web/assets/img/logo-sm.png') }}" alt="" title="">
                                </a>
                            </div>
                            <div class="menu-outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            <div class="header-action">
                                <ul class="navigation1">
                                    @if (Auth::guest())
                                        <li class="dropdown">
                                            <a href="#">
                                                <span><i class="flaticon-user"></i></span>
                                                <span class="text">حسابي</span>
                                            </a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="{{ route('user.login') }}">تسجيل الدخول</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('user.login') }}">إنشاء حساب</a>
                                                </li>
                                            </ul>
                                        </li>
                                    @endif

                                    @if (!Auth::guest())
                                        <li class="dropdown">
                                            <a href="{{ route('user.editProfile', Auth::user()->id) }}">
                                                <span><i class="flaticon-user"></i></span>
                                                <span class="text">حسابي</span>
                                            </a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="{{ route('user.logout') }}"
                                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                        <span><i class="flaticon-user"></i></span>
                                                        <span class="text">تسجيل خروج</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li>
                                            <a href="{{ route('user.wishlist.index') }}">
                                                <span><i class="flaticon-heart"></i></span>
                                                <span class="text">المفضلة</span>
                                            </a>
                                        </li>
                                    @endif

                                    <li class="header-shop-cart">
                                        <a href="{{ route('user.Cart') }}">
                                            <span>
                                                <i class="flaticon-shopping-bag"></i>
                                                <span class="cart-count">{{ $array['count_items'] }}</span>
                                            </span>
                                            <span class="text">العربة</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="social-links">
                                <ul class="clearfix">
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                                    <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                    <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                    <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <!-- End Mobile Menu -->
                </div>
            </div>
        </div>
    </div>
    <!-- menu-area-end -->

    <!-- header-search-area -->
    <div class="header-search-area d-none d-md-block">
        <div class="custom-container-two">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4 d-none d-lg-block">
                    <div class="header-category d-none d-lg-block">
                        <a href="{{ route('user.mcategories.index') }}" class="cat-toggle">
                            <i class="flaticon-menu"></i>
                            جميع الأقسام
                        </a>
                        <ul class="category-menu">
                            @foreach ($mainCategories->take(5) as $mainCategory)
                                <li>
                                    <a href="{{ route('user.showFastProductsForMainCategory', $mainCategory->id) }}">
                                        <div class="cat-menu-img">
                                            <img src="{{ asset($mainCategory->photo_name) }}" alt="">
                                        </div>
                                        {{ $mainCategory->translate('ar')->category_name }}
                                    </a>
                                </li>
                            @endforeach
                            <li>
                                <ul class="more_slide_open">
                                    <li>
                                        <a href="#">
                                            <div class="cat-menu-img">
                                                <img src="{{ URL::asset('Web/assets/img/product/category_menu_img01.png') }}"
                                                    alt="">
                                            </div> امرأة
                                            غربية
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="cat-menu-img">
                                                <img src="{{ URL::asset('Web/assets/img/product/category_menu_img02.png') }}"
                                                    alt="">
                                            </div> منتجات
                                            صحية
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="cat-menu-img">
                                                <img src="{{ URL::asset('Web/assets/img/product/category_menu_img03.png') }}"
                                                    alt="">
                                            </div> المنتجات
                                            الصناعية
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="more_categories">
                                أقسام أخرى
                                <i class="fas fa-angle-down"></i>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Search Area --}}
                <div class="col-xl-9 col-lg-8">
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-end">
                        <div class="header-search-wrap">
                            <form action="{{ route('user.search') }}" method="get">
                                {{ csrf_field() }}
                                <input type="text" placeholder="ابحث عن طلبك....." name="searchWord">
                                <select class="custom-select" name="mainCategoryId">
                                    <option selected="" value="null">اختر القسم</option>
                                    @foreach ($mainCategories as $mainCategory)
                                        <option value="{{ $mainCategory->id }}">
                                            {{ $mainCategory->translate('ar')->category_name }}
                                        </option>
                                    @endforeach
                                    <option>في جميع الفئات</option>
                                </select>
                                <button>
                                    <i class="flaticon-magnifying-glass-1"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- header-search-area-end -->

</header>
<!-- header-area-end -->


@section('js')
    <script>
        $(document).ready(function() {

            $(document).on('click', '.removeFromCart', function(e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "delete",
                    url: "{{ route('user.removeFromCart') }}",
                    data: {
                        'product_id': $(this).attr('data-product_id'),
                    },
                    success: function(data) {
                        location.reload();
                    }
                });

            });

        });
    </script>
@endsection

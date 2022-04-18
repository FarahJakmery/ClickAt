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
                                <a href="index.html">
                                    <img class="logo" src="{{ URL::asset('Web/assets/img/logo-sm.png') }}"
                                        alt="Logo">
                                </a>
                            </div>
                            <div class="navbar-wrap main-menu d-none d-lg-flex">
                                <ul class="navigation">
                                    <li class="active">
                                        <a href="{{ route('home') }}">الرئيسية</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.about') }}">عن كليكات</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="{{ route('user.fastSellingProduct.index') }}">
                                            منتجات البيع السريع
                                        </a>
                                        @foreach ($fastSellingProducts as $fastSellingProduct)
                                            <ul class="submenu">
                                                <li>
                                                    <a
                                                        href="{{ route('admin.fastSellingProduct.show', $fastSellingProduct->id) }}">
                                                        {{ $fastSellingProduct->name }}
                                                    </a>
                                                </li>
                                            </ul>
                                        @endforeach
                                        {{-- <li>
                                                <a href="#">السيارات</a>
                                            </li>
                                            <li>
                                                <a href="#">الأثاث</a>
                                            </li>
                                            <li>
                                                <a href="#">الأجهزة الكهربائية</a>
                                            </li>
                                            <li>
                                                <a href="#">الالكترونيات</a>
                                            </li> --}}
                                    </li>
                                    <li>
                                        <a href="{{ route('user.products.index') }}">منتجات خارجية</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.productWithCode.index') }}">أكواد كليكات</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact') }}">تواصل معنا</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="header-action d-none d-md-block">
                                <ul>
                                    <li>
                                        <a href="{{ route('user.wishlist.index') }}">
                                            <i class="flaticon-heart"></i>
                                        </a>
                                    </li>
                                    <li class="header-shop-cart">
                                        <a href="#">
                                            <i class="flaticon-shopping-bag"></i>
                                            <span class="cart-count">2</span>
                                        </a>
                                        <span class="cart-total-price">
                                            <span>128.00</span>ر.س</span>
                                        <ul class="minicart">
                                            <li class="d-flex align-items-start">
                                                <div class="cart-img">
                                                    <a href="#">
                                                        <img src="{{ asset('Web/assets/img/products/Mens-Casual-Shoes.jpg') }}"
                                                            alt="">
                                                    </a>
                                                </div>
                                                <div class="cart-content">
                                                    <h4>
                                                        <a href="#">حذاء رجالي</a>
                                                    </h4>
                                                    <div class="cart-price">
                                                        <span class="new">
                                                            <span>229.9</span>ر.س</span>
                                                    </div>
                                                </div>
                                                <div class="del-icon">
                                                    <a href="#">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="d-flex align-items-start">
                                                <div class="cart-img">
                                                    <a href="#">
                                                        <img src="{{ URL::asset('Web/assets/img/products/Stylish-Smart-Watch.jpg') }}"
                                                            alt="">
                                                    </a>
                                                </div>
                                                <div class="cart-content">
                                                    <h4>
                                                        <a href="#">ساعة ذكية</a>
                                                    </h4>
                                                    <div class="cart-price">
                                                        <span class="new"><span>229.9</span>ر.س</span>
                                                    </div>
                                                </div>
                                                <div class="del-icon">
                                                    <a href="#">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="total-price">
                                                    <span class="f-left">المجموع:</span>
                                                    <span class="f-right"><span>239.9</span>ر.س</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="checkout-link">
                                                    <a href="#">حقيبة التسوق</a>
                                                    <a class="red-color" href="#">الدفع</a>
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
                        <div class="close-btn"><i class="fas fa-times"></i></div>

                        <nav class="menu-box">
                            <div class="nav-logo">
                                <a href="index.html">
                                    <img src="{{ URL::asset('Web/assets/img/logo-sm.png') }}" alt="" title="">
                                </a>
                            </div>
                            <div class="menu-outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            <div class="social-links">
                                <ul class="clearfix">
                                    <li>
                                        <a href="#">
                                            <span class="fab fa-twitter"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="fab fa-facebook-square"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="fab fa-pinterest-p"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="fab fa-instagram"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="fab fa-youtube"></span>
                                        </a>
                                    </li>
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
                            {{-- <li class="has-dropdown">
                                <a href="#">
                                    <div class="cat-menu-img">
                                        <img src="{{ URL::asset('Web/assets/img/product/category_menu_img01.png') }}"
                                            alt="">
                                    </div> امرأة غربية
                                </a>
                                <ul class="mega-menu">
                                    <li>
                                        <ul>
                                            <li class="dropdown-title">إكسسوارات وقطع غيار</li>
                                            <li>
                                                <a href="#">الكابلات والمحولات</a>
                                            </li>
                                            <li>
                                                <a href="#">بطاريات</a>
                                            </li>
                                            <li>
                                                <a href="#">شواحن</a>
                                            </li>
                                            <li>
                                                <a href="#">الحقائب و الصناديق</a>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li class="dropdown-title">السجائر الإلكترونية</li>
                                            <li>
                                                <a href="#">الصوت والفيديو</a>
                                            </li>
                                            <li>
                                                <a href="#">التلفزيونات</a>
                                            </li>
                                            <li>
                                                <a href="#">مستقبلات التلفزيون</a>
                                            </li>
                                            <li>
                                                <a href="#">أجهزة عرض</a>
                                            </li>
                                            <li>
                                                <a href="#">لوحات مكبر الصوت</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li class="dropdown-title">الإلكترونيات الذكية</li>
                                            <li>
                                                <a href="#">الكابلات والمحولات</a>
                                            </li>
                                            <li>
                                                <a href="#">بطاريات</a>
                                            </li>
                                            <li>
                                                <a href="#">شواحن</a>
                                            </li>
                                            <li>
                                                <a href="#">الحقائب و الصناديق</a>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li class="dropdown-title">أجهزة الصوت والفيديو المحمولة</li>
                                            <li>
                                                <a href="#">الصوت والفيديو</a>
                                            </li>
                                            <li>
                                                <a href="#">التلفزيونات</a>
                                            </li>
                                            <li>
                                                <a href="#">مستقبلات التلفزيون</a>
                                            </li>
                                            <li>
                                                <a href="#">أجهزة عرض</a>
                                            </li>
                                            <li>
                                                <a href="#">لوحات مكبر الصوت</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li class="dropdown-title">إكسسوارات وقطع غيار</li>
                                            <li>
                                                <a href="#">الكابلات والمحولات</a>
                                            </li>
                                            <li>
                                                <a href="#">بطاريات</a>
                                            </li>
                                            <li>
                                                <a href="#">شواحن</a>
                                            </li>
                                            <li>
                                                <a href="#">الحقائب و الصناديق</a>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li class="dropdown-title">الصوت والفيديو</li>
                                            <li class="mega-menu-banner">
                                                <a href="#">
                                                    <img src="{{ URL::asset('Web/assets/img/images/megamenu_banner.jpg') }}"
                                                        alt="">
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-dropdown">
                                <a href="#">
                                    <div class="cat-menu-img">
                                        <img src="{{ URL::asset('Web/assets/img/product/category_menu_img02.png') }}"
                                            alt="">
                                    </div>تلفزيون ، أجهزة
                                </a>
                                <ul class="mega-menu">
                                    <li>
                                        <ul>
                                            <li class="dropdown-title">إكسسوارات وقطع غيار</li>
                                            <li>
                                                <a href="#">الكابلات والمحولات</a>
                                            </li>
                                            <li>
                                                <a href="#">بطاريات</a>
                                            </li>
                                            <li>
                                                <a href="#">شواحن</a>
                                            </li>
                                            <li>
                                                <a href="#">الحقائب و الصناديق</a>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li class="dropdown-title">السجائر الإلكترونية</li>
                                            <li>
                                                <a href="#">الصوت والفيديو</a>
                                            </li>
                                            <li>
                                                <a href="#">التلفزيونات</a>
                                            </li>
                                            <li>
                                                <a href="#">مستقبلات التلفزيون</a>
                                            </li>
                                            <li>
                                                <a href="#">أجهزة عرض</a>
                                            </li>
                                            <li>
                                                <a href="#">لوحات مكبر الصوت</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li class="dropdown-title">الإلكترونيات الذكية</li>
                                            <li>
                                                <a href="#">الكابلات والمحولات</a>
                                            </li>
                                            <li>
                                                <a href="#">بطاريات</a>
                                            </li>
                                            <li>
                                                <a href="#">شواحن</a>
                                            </li>
                                            <li>
                                                <a href="#">الحقائب و الصناديق</a>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li class="dropdown-title">أجهزة الصوت والفيديو المحمولة</li>
                                            <li>
                                                <a href="#">الصوت والفيديو</a>
                                            </li>
                                            <li>
                                                <a href="#">التلفزيونات</a>
                                            </li>
                                            <li>
                                                <a href="#">مستقبلات التلفزيون</a>
                                            </li>
                                            <li>
                                                <a href="#">أجهزة عرض</a>
                                            </li>
                                            <li>
                                                <a href="#">لوحات مكبر الصوت</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li class="dropdown-title">إكسسوارات وقطع غيار</li>
                                            <li>
                                                <a href="#">الكابلات والمحولات</a>
                                            </li>
                                            <li>
                                                <a href="#">بطاريات</a>
                                            </li>
                                            <li>
                                                <a href="#">شواحن</a>
                                            </li>
                                            <li>
                                                <a href="#">الحقائب و الصناديق</a>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li class="dropdown-title">الصوت والفيديو</li>
                                            <li class="mega-menu-banner"><a href="#">
                                                    <img src="{{ URL::asset('Web/assets/img/images/megamenu_banner.jpg') }}"
                                                        alt=""></a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="shop-left-sidebar.html">
                                    <div class="cat-menu-img">
                                        <img src="{{ URL::asset('Web/assets/img/product/category_menu_img03.png') }}"
                                            alt="">
                                    </div> منتجات الأطفال
                                </a>
                            </li>
                            <li>
                                <a href="shop-left-sidebar.html">
                                    <div class="cat-menu-img">
                                        <img src="{{ URL::asset('Web/assets/img/product/category_menu_img04.png') }}"
                                            alt="">
                                    </div> منتجات بقالة
                                </a>
                            </li>
                            <li>
                                <a href="shop-left-sidebar.html">
                                    <div class="cat-menu-img">
                                        <img src="{{ URL::asset('Web/assets/img/product/category_menu_img05.png') }}"
                                            alt="">
                                    </div> منتجات الجمال والصحة
                                </a>
                            </li>
                            <li>
                                <a href="shop-left-sidebar.html">
                                    <div class="cat-menu-img">
                                        <img src="{{ URL::asset('Web/assets/img/product/category_menu_img06.png') }}"
                                            alt="">
                                    </div> المنتجات الصناعية
                                </a>
                            </li>
                            <li>
                                <a href="shop-left-sidebar.html">
                                    <div class="cat-menu-img">
                                        <img src="{{ URL::asset('Web/assets/img/product/category_menu_img07.png') }}"
                                            alt="">
                                    </div> سيارة ، دراجة نارية
                                </a>
                            </li> --}}
                            @foreach ($mainCategories as $mainCategory)
                                <li>
                                    <a href="shop-left-sidebar.html">
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
                            <li class="more_categories">أقسام أخرى<i class="fas fa-angle-down"></i></li>
                        </ul>
                    </div>
                </div>

                {{-- Search Area --}}
                <div class="col-xl-9 col-lg-8">
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-end">
                        <div class="header-search-wrap">
                            <form action="{{ route('user.search', $mainCategory->id) }}" method="get">
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

<!-- footer-area -->
<footer class="footer-area footer-style-two">
    <div class="footer-top pt-65 pb-25">
        <div class="custom-container-two">
            <div class="row">
                <div class="col-xl-3 col-md-4 col-sm-12">
                    <div class="footer-widget mb-50">
                        <div class="footer-logo mb-30">
                            <a href="{{ route('user.home') }}">
                                <img src="{{ URL::asset('Web/assets/img/logo-sm.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="footer-widget mb-50">
                        <div class="fw-title mb-35">
                            <h5>روابط سريعة</h5>
                        </div>
                        <div class="fw-link">
                            <ul>
                                <li>
                                    <a href="{{ route('user.about') }}">عن كليكات</a>
                                </li>
                                <li>
                                    <a href="{{ route('user.FastSellingProducts.index') }}">منتجات بيع سريع</a>
                                </li>
                                <li>
                                    <a href="{{ route('user.Products.index') }}">منتجات كليكات</a>
                                </li>
                                <li>
                                    <a href="#">تواصل معنا</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="footer-widget mb-50">
                        <div class="fw-title mb-35">
                            <h5>الأقسام</h5>
                        </div>
                        <div class="fw-link">
                            <ul>
                                @foreach ($mainCategories as $mainCategory)
                                    <li>
                                        <a href="#">{{ $mainCategory->translate('ar')->category_name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="footer-widget mb-50">
                        <div class="fw-title mb-35">
                            <h5>حسابي</h5>
                        </div>
                        <div class="fw-link">
                            <ul>
                                <li>
                                    <a href="#">حسابي</a>
                                </li>
                                <li>
                                    <a href="#">الحسم</a>
                                </li>
                                <li>
                                    <a href="#">عائدات</a>
                                </li>
                                <li>
                                    <a href="#">تاريخ الطلبات</a>
                                </li>
                                <li>
                                    <a href="#">تتبع الطلب</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer-area-end -->

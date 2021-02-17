<div class="slim-navbar">
    <div class="container">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{url("/admin/dashboard")}}">
                    <i class="icon ion-ios-home-outline"></i>
                    <span>الرئيسية</span>
                </a>
            </li>
            <li class="nav-item with-sub">
                <a class="nav-link" href="#">
                    <i class="icon ion-ios-gear-outline"></i>
                    <span>الإعدادات</span>
                </a>
                <div class="sub-item">
                    <ul>
                        <li><a href="{{url("admin/langs")}}">اللغات</a></li>
                        <li><a href="{{url("admin/settings")}}">الإعدادات العامة</a></li>
                        <li><a href="{{url("admin/pages")}}">الصفحات التعريفية</a></li>
                        <li><a href="{{url("admin/social")}}">مواقع التواصل</a></li>
                    </ul>
                </div><!-- dropdown-menu -->
            </li>

            <li class="nav-item with-sub">
                <a class="nav-link" href="#">
                    <i class="icon ion-ios-person-circle-outline"></i>
                    <span>المستخدمين</span>
                </a>
                <div class="sub-item">
                    <ul>
                        <li><a href="{{url("admin/clients")}}"> العملاء</a></li>
                        <li><a href="{{url("admin/doctors")}}"> الأطباء</a></li>

                    </ul>
                </div><!-- dropdown-menu -->
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{url("/admin/promo_code")}}">
                    <span>Promo Codes</span>
                </a>
            </li>

        </ul>
    </div><!-- container -->
</div><!-- slim-navbar -->

<div class="slim-header {{(config('menu_display') == "sidebar")?"with-sidebar":""}}">
    <div class="{{(config('menu_display') == "sidebar")?"container-fluid":"container"}}">
        <div class="slim-header-left">

            <h2 class="slim-logo">
                <a href="{{url("branch/dashboard")}}">
                    <span>
                        <img src="{{get_image_or_default(site_data['logo_path'])}}-64,64">
                    </span>
                </a>
            </h2>

            <?php if(config('menu_display') == "sidebar"): ?>
                <a href="" id="slimSidebarMenu" class="slim-sidebar-menu"><span></span></a>
            <?php endif; ?>

        </div><!-- slim-header-left -->
        <div class="slim-header-right">

            <div class="toggle-wrapper">
                <div class="switch_toggle toggle-light"></div>
            </div>

            <div class="dropdown dropdown-c">
                <a href="{{url("branch/dashboard")}}" class="logged-user" data-toggle="dropdown">
                    <img src="{{get_image_or_default($current_user->logo_path)}}" alt="">
                    <span>{{$current_user->full_name}}</span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <nav class="nav">
                        <a href="{{url("branch/admins/edit/$current_user->user_id")}}" class="nav-link"><i class="icon ion-compose"></i> تعديل البيانات </a>
                        <a href="{{url("logout")}}" class="nav-link"><i class="icon ion-forward"></i> تسجيل خروج </a>
                    </nav>
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->

        </div><!-- header-right -->
    </div><!-- container -->
</div><!-- slim-header -->

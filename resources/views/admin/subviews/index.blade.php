@extends("admin.main_layout")

@section('additional_css')

    <link href="{{url("/")}}/public/admin/lib/chartist/css/chartist.css" rel="stylesheet">

@endsection

@section('additional_js')

    <script src="{{url("/")}}/public/admin/lib/chartist/js/chartist.js"></script>

    <script src="{{url("/")}}/public/admin/lib/d3/js/d3.js"></script>
    <script src="{{url("/")}}/public/admin/lib/rickshaw/js/rickshaw.min.js"></script>
    <script src="{{url("/")}}/public/admin/lib/jquery.sparkline.bower/js/jquery.sparkline.min.js"></script>

    <script src="{{url("/")}}/public/admin/js/ResizeSensor.js"></script>
    <script src="{{url("/")}}/public/admin/js/dashboard.js"></script>


@endsection

@section("subview")

    <div class="slim-mainpanel">
        <div class="container">

            <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">لوحة التحكم</li>
                </ol>
                <h6 class="slim-pagetitle">لوحة التحكم</h6>
            </div><!-- slim-pageheader -->


            <div class="card card-dash-one mg-t-20">
                <div class="row no-gutters">
                    <div class="col-lg-3">
                        <i class="icon ion-ios-analytics-outline"></i>
                        <div class="dash-content">
                            <label class="tx-primary">العملاء</label>
                            <h2>{{$users_count}}</h2>
                        </div><!-- dash-content -->
                    </div><!-- col-3 -->
                    <div class="col-lg-3">
                        <i class="icon ion-ios-pie-outline"></i>
                        <div class="dash-content">
                            <label class="tx-success">الاطباء</label>
                            <h2>{{$doctors_count}}</h2>
                        </div><!-- dash-content -->
                    </div><!-- col-3 -->
                    <div class="col-lg-3">
                        <i class="icon ion-ios-stopwatch-outline"></i>
                        <div class="dash-content">
                            <label class="tx-purple">الجلسات المحجوزة</label>
                            <h2>{{$booked_sessions_count}}</h2>
                        </div><!-- dash-content -->
                    </div><!-- col-3 -->
                    <div class="col-lg-3">
                        <i class="icon ion-ios-world-outline"></i>
                        <div class="dash-content">
                            <label class="tx-danger">الجلسات المنتهية</label>
                            <h2>{{$finished_sessions_count}}</h2>
                        </div><!-- dash-content -->
                    </div><!-- col-3 -->
                </div><!-- row -->
            </div><!-- card -->


        </div><!-- container -->
    </div><!-- slim-mainpanel -->

@endsection


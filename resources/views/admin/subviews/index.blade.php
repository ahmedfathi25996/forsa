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
                            <h2>822,490</h2>
                        </div><!-- dash-content -->
                    </div><!-- col-3 -->
                    <div class="col-lg-3">
                        <i class="icon ion-ios-pie-outline"></i>
                        <div class="dash-content">
                            <label class="tx-success">الاطباء</label>
                            <h2>465,183</h2>
                        </div><!-- dash-content -->
                    </div><!-- col-3 -->
                    <div class="col-lg-3">
                        <i class="icon ion-ios-stopwatch-outline"></i>
                        <div class="dash-content">
                            <label class="tx-purple">الجلسات المحجوزة</label>
                            <h2>781,524</h2>
                        </div><!-- dash-content -->
                    </div><!-- col-3 -->
                    <div class="col-lg-3">
                        <i class="icon ion-ios-world-outline"></i>
                        <div class="dash-content">
                            <label class="tx-danger">الجلسات المنتهية</label>
                            <h2>369,657</h2>
                        </div><!-- dash-content -->
                    </div><!-- col-3 -->
                </div><!-- row -->
            </div><!-- card -->

            <div class="row row-sm mg-t-20">
                <div class="col-lg-6">
                    <div class="card card-table">
                        <div class="card-header">
                            <h6 class="slim-card-title">Product Purchases</h6>
                        </div><!-- card-header -->
                        <div class="table-responsive">
                            <table class="table mg-b-0 tx-13">
                                <thead>
                                <tr class="tx-10">
                                    <th class="wd-10p pd-y-5">&nbsp;</th>
                                    <th class="pd-y-5">Item Details</th>
                                    <th class="pd-y-5 tx-right">Sold</th>
                                    <th class="pd-y-5">Gain</th>
                                    <th class="pd-y-5 tx-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="pd-l-20">
                                        <img src="http://via.placeholder.com/800x533" class="wd-55" alt="Image">
                                    </td>
                                    <td>
                                        <a href="" class="tx-inverse tx-14 tx-medium d-block">The Dothraki Shoes</a>
                                        <span class="tx-11 d-block"><span class="square-8 bg-danger mg-r-5 rounded-circle"></span> 20 remaining</span>
                                    </td>
                                    <td class="valign-middle tx-right">3,345</td>
                                    <td class="valign-middle"><span class="tx-success"><i class="icon ion-android-arrow-up mg-r-5"></i>33.34%</span> from last week</td>
                                    <td class="valign-middle tx-center">
                                        <a href="" class="tx-gray-600 tx-24"><i class="icon ion-android-more-horizontal"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pd-l-20">
                                        <img src="http://via.placeholder.com/800x533" class="wd-55" alt="Image">
                                    </td>
                                    <td>
                                        <a href="" class="tx-inverse tx-14 tx-medium d-block">Westeros Sneaker</a>
                                        <span class="tx-11 d-block"><span class="square-8 bg-success mg-r-5 rounded-circle"></span> In stock</span>
                                    </td>
                                    <td class="valign-middle tx-right">720</td>
                                    <td class="valign-middle"><span class="tx-danger"><i class="icon ion-android-arrow-down mg-r-5"></i>21.20%</span> from last week</td>
                                    <td class="valign-middle tx-center">
                                        <a href="" class="tx-gray-600 tx-24"><i class="icon ion-android-more-horizontal"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pd-l-20">
                                        <img src="http://via.placeholder.com/800x533" class="wd-55" alt="Image">
                                    </td>
                                    <td>
                                        <a href="" class="tx-inverse tx-14 tx-medium d-block">Selonian Hand Bag</a>
                                        <span class="tx-11 d-block"><span class="square-8 bg-success mg-r-5 rounded-circle"></span> In stock</span>
                                    </td>
                                    <td class="valign-middle tx-right">1,445</td>
                                    <td class="valign-middle"><span class="tx-success"><i class="icon ion-android-arrow-up mg-r-5"></i>23.34%</span> from last week</td>
                                    <td class="valign-middle tx-center">
                                        <a href="" class="tx-gray-600 tx-24"><i class="icon ion-android-more-horizontal"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pd-l-20">
                                        <img src="http://via.placeholder.com/800x533" class="wd-55" alt="Image">
                                    </td>
                                    <td>
                                        <a href="" class="tx-inverse tx-14 tx-medium d-block">Kel Dor Sunglass</a>
                                        <span class="tx-11 d-block"><span class="square-8 bg-warning mg-r-5 rounded-circle"></span> 45 remaining</span>
                                    </td>
                                    <td class="valign-middle tx-right">2,500</td>
                                    <td class="valign-middle"><span class="tx-success"><i class="icon ion-android-arrow-up mg-r-5"></i>28.78%</span> from last week</td>
                                    <td class="valign-middle tx-center">
                                        <a href="" class="tx-gray-600 tx-24"><i class="icon ion-android-more-horizontal"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pd-l-20">
                                        <img src="http://via.placeholder.com/800x533" class="wd-55" alt="Image">
                                    </td>
                                    <td>
                                        <a href="" class="tx-inverse tx-14 tx-medium d-block">Kubaz Sunglass</a>
                                        <span class="tx-11 d-block"><span class="square-8 bg-success mg-r-5 rounded-circle"></span> In stock</span>
                                    </td>
                                    <td class="valign-middle tx-14 tx-right">223</td>
                                    <td class="valign-middle"><span class="tx-danger"><i class="icon ion-android-arrow-down mg-r-5"></i>18.18%</span> from last week</td>
                                    <td class="valign-middle tx-center">
                                        <a href="" class="tx-gray-600 tx-24"><i class="icon ion-android-more-horizontal"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div><!-- table-responsive -->
                        <div class="card-footer tx-12 pd-y-15 bg-transparent">
                            <a href=""><i class="fa fa-angle-down mg-r-5"></i>View All Products</a>
                        </div><!-- card-footer -->
                    </div><!-- card -->
                </div><!-- col-6 -->
                <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                    <div class="card card-table">
                        <div class="card-header">
                            <h6 class="slim-card-title">User Transaction History</h6>
                        </div><!-- card-header -->
                        <div class="table-responsive">
                            <table class="table mg-b-0 tx-13">
                                <thead>
                                <tr class="tx-10">
                                    <th class="wd-10p pd-y-5">&nbsp;</th>
                                    <th class="pd-y-5">User</th>
                                    <th class="pd-y-5">Type</th>
                                    <th class="pd-y-5">Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="pd-l-20">
                                        <img src="http://via.placeholder.com/500x500" class="wd-36 rounded-circle" alt="Image">
                                    </td>
                                    <td>
                                        <a href="" class="tx-inverse tx-14 tx-medium d-block">Mark K. Peters</a>
                                        <span class="tx-11 d-block">TRANSID: 1234567890</span>
                                    </td>
                                    <td class="tx-12">
                                        <span class="square-8 bg-success mg-r-5 rounded-circle"></span> Email verified
                                    </td>
                                    <td>Just Now</td>
                                </tr>
                                <tr>
                                    <td class="pd-l-20">
                                        <img src="http://via.placeholder.com/500x500" class="wd-36 rounded-circle" alt="Image">
                                    </td>
                                    <td>
                                        <a href="" class="tx-inverse tx-14 tx-medium d-block">Karmen F. Brown</a>
                                        <span class="tx-11 d-block">TRANSID: 1234567890</span>
                                    </td>
                                    <td class="tx-12">
                                        <span class="square-8 bg-warning mg-r-5 rounded-circle"></span> Pending verification
                                    </td>
                                    <td>Apr 21, 2017 8:34am</td>
                                </tr>
                                <tr>
                                    <td class="pd-l-20">
                                        <img src="http://via.placeholder.com/500x500" class="wd-36 rounded-circle" alt="Image">
                                    </td>
                                    <td>
                                        <a href="" class="tx-inverse tx-14 tx-medium d-block">Gorgonio Magalpok</a>
                                        <span class="tx-11 d-block">TRANSID: 1234567890</span>
                                    </td>
                                    <td class="tx-12">
                                        <span class="square-8 bg-success mg-r-5 rounded-circle"></span> Purchased success
                                    </td>
                                    <td>Apr 10, 2017 4:40pm</td>
                                </tr>
                                <tr>
                                    <td class="pd-l-20">
                                        <img src="http://via.placeholder.com/500x500" class="wd-36 rounded-circle" alt="Image">
                                    </td>
                                    <td>
                                        <a href="" class="tx-inverse tx-14 tx-medium d-block">Ariel T. Hall</a>
                                        <span class="tx-11 d-block">TRANSID: 1234567890</span>
                                    </td>
                                    <td class="tx-12">
                                        <span class="square-8 bg-warning mg-r-5 rounded-circle"></span> Payment on hold
                                    </td>
                                    <td>Apr 02, 2017 6:45pm</td>
                                </tr>
                                <tr>
                                    <td class="pd-l-20">
                                        <img src="http://via.placeholder.com/500x500" class="wd-36 rounded-circle" alt="Image">
                                    </td>
                                    <td>
                                        <a href="" class="tx-inverse tx-14 tx-medium d-block">John L. Goulette</a>
                                        <span class="tx-11 d-block">TRANSID: 1234567890</span>
                                    </td>
                                    <td class="tx-12">
                                        <span class="square-8 bg-pink mg-r-5 rounded-circle"></span> Account deactivated
                                    </td>
                                    <td>Mar 30, 2017 10:30am</td>
                                </tr>
                                </tbody>
                            </table>
                        </div><!-- table-responsive -->
                        <div class="card-footer tx-12 pd-y-15 bg-transparent">
                            <a href=""><i class="fa fa-angle-down mg-r-5"></i>View All Transaction History</a>
                        </div><!-- card-footer -->
                    </div><!-- card -->
                </div><!-- col-6 -->
            </div><!-- row -->

            <div class="row row-sm mg-t-20">
                <div class="col-lg-4">
                    <div class="card card-info">
                        <div class="card-body pd-40">
                            <div class="d-flex justify-content-center mg-b-30">
                                <img src="{{url("/")}}/public/admin/img/icon1.svg" class="wd-100" alt="">
                            </div>
                            <h5 class="tx-inverse mg-b-20">Safe &amp; Secure</h5>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia. Even the all-powerful Pointing has no control about the blind texts.</p>
                            <a href="" class="btn btn-primary btn-block">Getting Started</a>
                        </div><!-- card -->
                    </div><!-- card -->
                </div><!-- col-4 -->
                <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                    <div class="card card-info">
                        <div class="card-body pd-40">
                            <div class="d-flex justify-content-center mg-b-30">
                                <img src="{{url("/")}}/public/admin/img/icon2.svg" class="wd-100" alt="">
                            </div>
                            <h5 class="tx-inverse mg-b-20">Instant Exchange</h5>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia. Even the all-powerful Pointing has no control about the blind texts.</p>
                            <a href="" class="btn btn-primary btn-block">Take a Tour</a>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col-4 -->
                <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                    <div class="card card-sales">
                        <h6 class="slim-card-title tx-primary">Sales Report</h6>
                        <div class="row">
                            <div class="col">
                                <label class="tx-12">Today</label>
                                <p>1,898</p>
                            </div><!-- col -->
                            <div class="col">
                                <label class="tx-12">This Week</label>
                                <p>32,112</p>
                            </div><!-- col -->
                            <div class="col">
                                <label class="tx-12">This Month</label>
                                <p>72,067</p>
                            </div><!-- col -->
                        </div><!-- row -->

                        <div class="progress mg-b-5">
                            <div class="progress-bar bg-primary wd-50p" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                        </div>
                        <p class="tx-12 mg-b-0">Maecenas tempus, tellus eget conditum rhon.</p>
                    </div><!-- card -->

                    <div class="card card-impression mg-t-20">
                        <div class="card-body pd-b-0">
                            <h6 class="slim-card-title tx-primary">Page Impressions</h6>
                            <h2 class="tx-lato tx-inverse">323,360</h2>
                            <p class="tx-12"><span class="tx-primary">2.5%</span> change from yesterday</p>
                        </div><!-- card-body -->
                        <div id="rs3" class="ht-50 ht-sm-70 mg-r--1"></div>
                    </div><!-- card -->
                </div><!-- col-4 -->
            </div><!-- row -->

        </div><!-- container -->
    </div><!-- slim-mainpanel -->

@endsection


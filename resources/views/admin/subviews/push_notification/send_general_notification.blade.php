@extends('admin.main_layout')

@section('additional_css')

    <link href="{{url("/")}}/public/admin/lib/jquery.steps/css/jquery.steps.css" rel="stylesheet">
    <link href="{{url("/")}}/public/admin/lib/select2/css/select2.min.css" rel="stylesheet">


@endsection

@section('additional_js')

    <script src="{{url("/")}}/public/admin/lib/select2/js/select2.full.min.js"></script>
    <script src="{{url("/")}}/public/admin/lib/jquery.steps/js/jquery.steps.js"></script>
    <script src="{{url("/")}}/public/admin/lib/parsleyjs/js/parsley.js"></script>


@endsection

@section('subview')

    <div class="slim-mainpanel">
        <div class="container">
            <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ارسال اشعارات للاجهزة</li>
                </ol>
                <h6 class="slim-pagetitle">ارسال اشعارات للاجهزة</h6>
            </div><!-- slim-pageheader -->

            <div class="section-wrapper">

                <p class="mg-b-20 mg-sm-b-40"></p>

                <div class="table-wrapper">

                    <form id="save_form" action="{{url("admin/send_general_notification")}}" method="POST" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-12">

                                <div class="section-wrapper mg-t-20">

                                    <label class="section-title">البيانات الأساسية</label>
                                    <p class="mg-b-20 mg-sm-b-40"></p>


                                        <div class="panel-body global_setting" >

                                            <div class="col-md-12 col-md-offset-4">
                                                <label for="">
                                                    <b>إختار نوع الجهاز</b>
                                                </label>
                                                <select name="device_type" class="form-control">
                                                    <option value="all">الجميع</option>
                                                    <option value="android">أندرويد</option>
                                                    <option value="ios">ايفون</option>
                                                </select>
                                            </div>

                                            <div class="col-md-12">
                                                <label for="">
                                                    <b>العنوان</b>
                                                </label>
                                                <input type="text" required class="form-control" name="title">
                                            </div>

                                            <div class="col-md-12">
                                                <label for="">
                                                    <b>الإشعار</b>
                                                </label>
                                                <textarea name="message" required class="form-control" cols="30" rows="10"></textarea>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>



                        {{csrf_field()}}

                        <div class="form-layout-footer">
                            <input id="submit" type="submit" value="ارسال" class="btn btn-primary bd-0">
                        </div>

                    </form>

                </div><!-- table-wrapper -->
            </div><!-- section-wrapper -->

        </div><!-- container -->
    </div><!-- slim-mainpanel -->

@endsection




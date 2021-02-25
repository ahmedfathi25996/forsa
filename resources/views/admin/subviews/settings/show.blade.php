@extends('admin.main_layout')

@section('additional_css')

    <link href="{{url("/")}}/public/admin/lib/jquery.steps/css/jquery.steps.css" rel="stylesheet">
    <link href="{{url("/")}}/public/admin/lib/select2/css/select2.min.css" rel="stylesheet">

@endsection

@section('additional_js')

    <script src="{{url("/")}}/public/admin/lib/jquery.steps/js/jquery.steps.js"></script>
    <script src="{{url("/")}}/public/admin/lib/parsleyjs/js/parsley.js"></script>
    <script src="{{url("/")}}/public/admin/lib/select2/js/select2.full.min.js"></script>

@endsection

@section('subview')

    <?php
        $required_sign  = ' <span class="tx-danger">*</span> ';
    ?>

    <div class="slim-mainpanel">
        <div class="container">

            <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">الإعدادات</li>
                </ol>
                <h6 class="slim-pagetitle">الإعدادات</h6>
            </div><!-- slim-pageheader -->

            <div class="section-wrapper">

                <p class="mg-b-20 mg-sm-b-40"></p>

                <div class="table-wrapper">

                    <form id="save_form" action="{{url("admin/settings")}}" method="POST" enctype="multipart/form-data">

                        <div class="section-wrapper mg-t-20">
                            <label class="section-title">التحكم في إعدادات السيستيم</label>
                            <p class="mg-b-20 mg-sm-b-40"></p>

                                <div id="wizard3">
                                    <h3> <i class="fa fa-tablet"></i> الاعدادات </h3>
                                    <section>
                                        @include("admin.subviews.settings.components.app_settings")
                                    </section>
                                </div>
                        </div><!-- section-wrapper -->


                        {{csrf_field()}}

                        <div class="form-layout-footer">
                            <input id="submit" type="submit" value="حفظ" class="btn btn-primary bd-0">
                        </div>

                    </form>

                </div><!-- table-wrapper -->
            </div><!-- section-wrapper -->

        </div><!-- container -->
    </div><!-- slim-mainpanel -->

@endsection

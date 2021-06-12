@extends('admin.main_layout')

@section('additional_css')

    <link href="{{url("/")}}/public/admin/lib/datatables/css/jquery.dataTables.css" rel="stylesheet">
    <link href="{{url("/")}}/public/admin/lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="{{url("/")}}/public/admin/lib/bootstrap-datetimepicker2/bootstrap-datetimepicker.css" rel="stylesheet">
    <link href="{{url("/")}}/public/admin/lib/jt.timepicker/css/jquery.timepicker.css" rel="stylesheet">



@endsection

@section('additional_js')

    <script src="{{url("/")}}/public/admin/lib/datatables/js/jquery.dataTables.js"></script>
    <script src="{{url("/")}}/public/admin/lib/datatables-responsive/js/dataTables.responsive.js"></script>
    <script src="{{url("/")}}/public/admin/lib/select2/js/select2.min.js"></script>
    <script src="{{url("/")}}/public/admin/lib/bootstrap-datetimepicker2/bootstrap-datetimepicker.min.js"></script>
    <script src="{{url("/")}}/public/admin/lib/parsleyjs/js/parsley.js"></script>
    <script src="{{url("/")}}/public/admin/lib/jt.timepicker/js/jquery.timepicker.js"></script>
    <script src="{{url("/")}}/public/admin/lib/moment/js/moment.js"></script>
    <script src="{{url("/")}}/public/admin/lib/jquery-ui/js/jquery-ui.js"></script>

@endsection

@section('subview')

    <?php

    $required_sign          = ' <span style="color: red;font-weight: bold;">*</span>';

    ?>

    <div class="slim-mainpanel">
        <div class="container">
            <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="{{url("admin/doctors/$doctor_id/sessions")}}">الجلسات</a></li>
                </ol>
                <h6 class="slim-pagetitle"> الجلسات</h6>
            </div><!-- slim-pageheader -->

            <div class="section-wrapper">

                <p class="mg-b-20 mg-sm-b-40"></p>

                <div class="table-wrapper">

                    <form id="save_form" action="{{url("admin/doctors/$doctor_id/sessions/save/$session_id")}}" method="POST" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-12">

                                <div class="section-wrapper mg-t-20">

                                    <label class="section-title">البيانات الأساسية</label>
                                    <p class="mg-b-20 mg-sm-b-40"></p>

                                    <div class="row">

                                        <?php
                                        echo
                                        generate_select_tags(
                                            $field_name         = "session_id",
                                            $label_name         = "إختار الوقت ؟".$required_sign,
                                            $text               =  $results->pluck("time_from")->all(),
                                            $values             = $results->pluck("session_id")->all(),
                                            $selected_value     = "",
                                            $class              = "form-control select_2_primary",
                                            $multiple           = "",
                                            $required           = "",
                                            $disabled           = "",
                                            $data               = "" ,
                                            $grid               = "col-md-12"
                                        );



                                        ?>

                                    </div>

                                </div>

                            </div>

                        </div>

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




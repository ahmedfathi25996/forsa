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

    $session_id      = "";
    $required_sign          = ' <span style="color: red;font-weight: bold;">*</span>';

    if (is_object($item_data)) {
        $session_id                     = $item_data->session_id;
    }

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
                                        echo generate_select_tags(
                                            $field_name         = "session_day",
                                            $label_name         = "يوم الجلسة",
                                            $text               = ["الأحد", "الإثنين","الثلاثاء","الأربعاء","الخميس","الجمعة","السبت"],
                                            $values             = ["Sun", "Mon","Tue","Wed","Thur","Fri","Sat"],
                                            $selected_value     = "",
                                            $class              = "form-control",
                                            $multiple           = "",
                                            $required           = "",
                                            $disabled           = "",
                                            $data               = $item_data ,
                                            $grid               = "col-md-12"
                                        );


                                        $normal_tags =
                                            [
                                                "time_from",
                                                "time_to"

                                            ];

                                        $attrs          = generate_default_array_inputs_html(
                                            $fields_name        = $normal_tags,
                                            $data               = $item_data,
                                            $key_in_all_fields  = "yes",
                                            $required           = "",
                                            $grid_default_value = 6
                                        );

                                        $attrs[0]["time_from"]          = ' الوقت من '. $required_sign;
                                        $attrs[0]["time_to"]            = ' الوقت إلي '. $required_sign;

                                        $attrs[3]["time_from"]          = "time";
                                        $attrs[3]["time_to"]            = "time";

                                        echo
                                        generate_inputs_html(
                                            reformate_arr_without_keys($attrs[0]),
                                            reformate_arr_without_keys($attrs[1]),
                                            reformate_arr_without_keys($attrs[2]),
                                            reformate_arr_without_keys($attrs[3]),
                                            reformate_arr_without_keys($attrs[4]),
                                            reformate_arr_without_keys($attrs[5]),
                                            reformate_arr_without_keys($attrs[6])
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




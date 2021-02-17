@extends('branch.main_layout')

@section('additional_css')

    <link href="{{url("/")}}/public/admin/lib/jquery.steps/css/jquery.steps.css" rel="stylesheet">
    <link href="{{url("/")}}/public/admin/lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="{{url("/")}}/public/admin/lib/jt.timepicker/css/jquery.timepicker.css" rel="stylesheet">



@endsection

@section('additional_js')

    <script src="{{url("/")}}/public/admin/lib/select2/js/select2.full.min.js"></script>
    <script src="{{url("/")}}/public/admin/lib/jquery.steps/js/jquery.steps.js"></script>
    <script src="{{url("/")}}/public/admin/lib/parsleyjs/js/parsley.js"></script>
    <script src="{{url("/")}}/public/admin/lib/jt.timepicker/js/jquery.timepicker.js"></script>


@endsection

@section('subview')

    <?php

    $header_text            = "جديد";
    $id      = "";
    $required_sign          = ' <span style="color: red;font-weight: bold;">*</span>';

    if (is_object($item_data)) {
        $header_text            = $item_data->day_name;
        $id                     = $item_data->id;
    }

    ?>

    <div class="slim-mainpanel">
        <div class="container">
            <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url("branch/dashboard")}}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$header_text}}</li>
                </ol>
                <h6 class="slim-pagetitle">ايام العمل</h6>
            </div><!-- slim-pageheader -->

            <div class="section-wrapper">

                <p class="mg-b-20 mg-sm-b-40"></p>

                <div class="table-wrapper">

                    <form id="save_form" action="{{url("branch/working_days/save/$id")}}" method="POST" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-12">

                                <div class="section-wrapper mg-t-20">

                                    <label class="section-title">البيانات الأساسية</label>
                                    <p class="mg-b-20 mg-sm-b-40"></p>

                                    <div class="row">

                                        <?php
                                        echo
                                        generate_select_tags(
                                            $field_name         = "day_id",
                                            $label_name         = "إختار اليوم ؟".$required_sign,
                                            $text               = $days->pluck("day_name")->all(),
                                            $values             = $days->pluck("day_id")->all(),
                                            $selected_value     = "",
                                            $class              = "form-control select_2_primary",
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




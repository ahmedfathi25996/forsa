@extends('admin.main_layout')

@section('additional_css')

    <link href="{{url("/")}}/public/admin/lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="{{url("/")}}/public/admin/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="{{url("/")}}/public/admin/lib/bootstrap-datetimepicker2/bootstrap-datetimepicker.css" rel="stylesheet">
    <link href="{{url("/")}}/public/admin/lib/jquery.steps/css/jquery.steps.css" rel="stylesheet">
    <link href="{{url("/")}}/public/admin/lib/summernote/css/summernote-bs4.css" rel="stylesheet">

@endsection

@section('additional_js')

    <script src="{{url("/")}}/public/admin/lib/select2/js/select2.full.min.js"></script>
    <script src="{{url("/")}}/public/admin/lib/bootstrap-datetimepicker2/bootstrap-datetimepicker.min.js"></script>
    <script src="{{url("/")}}/public/admin/lib/moment/js/moment.js"></script>
    <script src="{{url("/")}}/public/admin/lib/jquery-ui/js/jquery-ui.js"></script>

    <script src="{{url("/")}}/public/admin/lib/jquery.steps/js/jquery.steps.js"></script>
    <script src="{{url("/")}}/public/admin/lib/parsleyjs/js/parsley.js"></script>
    <script src="{{url("/")}}/public/admin/lib/summernote/js/summernote-bs4.min.js"></script>

    <script src="{{url("/")}}/public/jscode/admin/promo_code.js"></script>

@endsection

@section('subview')

    <?php

    $header_text           = "جديد";
    $code_id               = "";
    $required_sign         = ' <span style="color: red;font-weight: bold;">*</span>';

    if (is_object($item_data)) {
        $header_text    = $item_data->code_text;
        $code_id        = $item_data->code_id;
    }

    ?>

    <div class="slim-mainpanel">
        <div class="container">
            <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="{{url("admin/promo_code")}}">Promo Code</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$header_text}}</li>
                </ol>
                <h6 class="slim-pagetitle">Promo Code</h6>
            </div><!-- slim-pageheader -->

            <div class="section-wrapper">
                <label class="section-title">
                    <a class="btn btn-primary mg-b-6" href="{{url("admin/promo_code/save")}}"> جديد <i class="fa fa-plus"></i></a>
                </label>
                <p class="mg-b-20 mg-sm-b-40"></p>

                <div class="table-wrapper">

                    <form id="save_form" action="{{url("admin/promo_code/save/$code_id")}}" method="POST" enctype="multipart/form-data">

                        <div class="row">

                            <div class="col-md-12">
                                <div class="section-wrapper mg-t-20">

                                    <label class="section-title">البيانات الأساسية</label>
                                    <p class="mg-b-20 mg-sm-b-40"></p>

                                    <div class="row">

                                        <?php

                                        $normal_tags            =
                                            [
                                                "code_text", "start_date","end_date","code_value"
                                            ];

                                        $attrs                    = generate_default_array_inputs_html(
                                            $fields_name          = $normal_tags,
                                            $data                 = $item_data,
                                            $key_in_all_fields    = "yes",
                                            $required             = "",
                                            $grid_default_value   = 6
                                        );

                                        $attrs[0]["code_text"]          = " الكود ". $required_sign;
                                        $attrs[0]["start_date"]         = " تاريخ البدايه ". $required_sign;
                                        $attrs[0]["end_date"]           = " تاريخ النهاية ". $required_sign;
                                        $attrs[0]["code_value"]         = " الخصم ". $required_sign;

                                        $attrs[3]["start_date"]         = "date_time";
                                        $attrs[3]["end_date"]           = "date_time";
                                        $attrs[3]["code_value"]         = "number";

                                        $attrs[6]["code_text"]          = "12" ;


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



                                {{csrf_field()}}

                            </div>
                        </div>

                        <div class="form-layout-footer">
                            <input id="submit" type="submit" value="حفظ" class="btn btn-primary bd-0">
                        </div>

                    </form>

                </div><!-- table-wrapper -->
            </div><!-- section-wrapper -->

        </div><!-- container -->
    </div><!-- slim-mainpanel -->

@endsection




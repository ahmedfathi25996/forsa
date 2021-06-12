@extends('admin.main_layout')

@section('additional_css')

    <link href="{{url("/")}}/public/admin/lib/jquery.steps/css/jquery.steps.css" rel="stylesheet">

@endsection

@section('additional_js')

    <script src="{{url("/")}}/public/admin/lib/jquery.steps/js/jquery.steps.js"></script>
    <script src="{{url("/")}}/public/admin/lib/parsleyjs/js/parsley.js"></script>

@endsection

@section('subview')

    <?php

    $header_text           = "جديد";
    $team_id        = "";
    $required_sign         = ' <span style="color: red;font-weight: bold;">*</span>';

    if (is_object($item_data)) {
        $header_text            = $item_data->name;
        $team_id         = $item_data->team_id;
        $img_id                 = $item_data->img_id;
    }

    ?>

    <div class="slim-mainpanel">
        <div class="container">
            <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="{{url("admin/team")}}">team member</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$header_text}}</li>
                </ol>
                <h6 class="slim-pagetitle">team member</h6>
            </div><!-- slim-pageheader -->

            <div class="section-wrapper">
                <label class="section-title">
                    <a class="btn btn-primary mg-b-6" href="{{url("admin/team/save")}}"> جديد <i class="fa fa-plus"></i></a>
                </label>
                <p class="mg-b-20 mg-sm-b-40"></p>

                <div class="table-wrapper">

                    <form id="save_form" action="{{url("admin/team/save/$team_id")}}" method="POST" enctype="multipart/form-data">

                        <div class="row">

                            <div class="col-md-12">
                                <div class="section-wrapper mg-t-20">

                                    <label class="section-title">البيانات الأساسية</label>
                                    <p class="mg-b-20 mg-sm-b-40"></p>

                                    <div class="row">

                                        <?php

                                        $normal_tags            = [
                                            "name","title"
                                        ];

                                        $attrs                  = generate_default_array_inputs_html(
                                            $fields_name        = $normal_tags,
                                            $data               = $item_data,
                                            $key_in_all_fields  = "yes",
                                            $required           = "",
                                            $grid_default_value = 6
                                        );

                                        $attrs[0]["name"]  = " الاسم ". $required_sign;
                                        $attrs[0]["title"]  = " المسمى الوظيفى ". $required_sign;


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
                                <div class="section-wrapper mg-t-20">

                                    <label class="section-title">الصور</label>
                                    <p class="mg-b-20 mg-sm-b-40"></p>

                                    <div class="row">
                                        <?php
                                        $img_obj                    = $item_data->user_img_id ?? "";

                                        echo generate_img_tags_for_form(
                                            $filed_name             = "team_img_file",
                                            $filed_label            = "team_img_file",
                                            $required_field         = " accept='image/*' ",
                                            $checkbox_field_name    = "team_img_checkbox",
                                            $need_alt_title         = "no",
                                            $required_alt_title     = "no",
                                            $old_path_value         = "",
                                            $old_title_value        = "",
                                            $old_alt_value          = "",
                                            $recomended_size        = "",
                                            $disalbed               = "",
                                            $displayed_img_width    = "50",
                                            $display_label          = "إرفع الصورة ",
                                            $img_obj,
                                            $grid                   = "col-md-6"
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




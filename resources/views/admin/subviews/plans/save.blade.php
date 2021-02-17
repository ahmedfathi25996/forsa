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

    <?php

    $header_text            = "جديد";
    $plan_id      = "";
    $required_sign          = ' <span style="color: red;font-weight: bold;">*</span>';

    if (is_object($item_data)) {
        $header_text            = $item_data->plan_name;
        $plan_id      = $item_data->plan_id;
    }

    ?>

    <div class="slim-mainpanel">
        <div class="container">
            <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="{{url("admin/plans")}}">الخطط</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$header_text}}</li>
                </ol>
                <h6 class="slim-pagetitle">الخطط</h6>
            </div><!-- slim-pageheader -->

            <div class="section-wrapper">

                <p class="mg-b-20 mg-sm-b-40"></p>

                <div class="table-wrapper">

                    <form id="save_form" action="{{url("admin/plans/save/$plan_id")}}" method="POST" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-12">

                                <div class="section-wrapper mg-t-20">

                                    <label class="section-title">البيانات الأساسية</label>
                                    <p class="mg-b-20 mg-sm-b-40"></p>

                                    <div class="row">

                                        <?php

                                        $normal_tags =
                                            [
                                                "offers_number",
                                                "price","num_of_days"
                                            ];

                                            if($plan_id == 1)
                                            {
                                                $normal_tags =
                                                    [
                                                        "offers_number","num_of_days"
                                                    ];
                                            }


                                            $attrs          = generate_default_array_inputs_html(
                                                $fields_name        = $normal_tags,
                                                $data               = $item_data,
                                                $key_in_all_fields  = "yes",
                                                $required           = "",
                                                $grid_default_value = 6
                                            );


                                            $attrs[0]["offers_number"]          = ' عدد العروض'.'(-1 تعني عدد لا نهائي من العروض)'.$required_sign;
                                            $attrs[0]["price"]                  = 'السعر';

                                            $attrs[0]["num_of_days"]            = "عدد الايام".$required_sign;
                                            $attrs[3]["price"]                  = "number";
                                            $attrs[3]["num_of_days"]            = "number";

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

                            <div class="col-md-12">

                                <div class="section-wrapper mg-t-20">
                                    <label class="section-title">بيانات الترجمة</label>
                                    <p class="mg-b-20 mg-sm-b-40"></p>

                                    <div id="wizard6">

                                        <?php foreach($all_langs as $lang_key => $item): ?>

                                        <?php
                                        $lang_id        = $item->lang_id;
                                        $required_sign  = ' <span style="color: red;font-weight: bold;">*</span>';
                                        ?>

                                        <h3>
                                            <img src="{{get_image_or_default($item->lang_img_path)}}-25,25" width="25px" height="25px">
                                            &nbsp;&nbsp;{{$item->lang_text}} {!! $required_sign !!}
                                        </h3>

                                        <section>
                                            <div class="row">
                                                <?php

                                                $translate_data = [];

                                                $current_row = $item_data_translate->filter(function ($value, $key) use($lang_id) {
                                                    if ($value->lang_id == $lang_id)
                                                    {
                                                        return $value;
                                                    }

                                                });

                                                if(is_object($current_row->first())){
                                                    $translate_data = $current_row->first();
                                                }

                                                $normal_tags =
                                                    [
                                                        "plan_name","plan_type","plan_description",
                                                    ];

                                                $attrs          = generate_default_array_inputs_html(
                                                    $fields_name        = $normal_tags,
                                                    $data               = $translate_data,
                                                    $key_in_all_fields  = "yes",
                                                    $required           = "",
                                                    $grid_default_value = 6
                                                );

                                                foreach ($attrs[1] as $key => $value) {
                                                    $attrs[1][$key]     .= "[]";
                                                }

                                                $attrs[0]["plan_name"] = 'الإسم'.$required_sign;
                                                $attrs[0]["plan_type"] = 'نوع الخطة'.$required_sign;
                                                $attrs[0]["plan_description"]    = 'الوصف';
                                                $attrs[3]["plan_description"]    = 'textarea';
                                                $attrs[6]["plan_description"]    = 12;



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
                                        </section>

                                        <?php endforeach; ?>

                                    </div>

                                </div><!-- section-wrapper -->


                                <div class="section-wrapper mg-t-20">

                                    <label class="section-title">الصور</label>
                                    <p class="mg-b-20 mg-sm-b-40"></p>

                                    <div class="row">
                                        <?php
                                        $img_obj                    = $item_data->plan_img_id ?? "";

                                        echo generate_img_tags_for_form(
                                            $filed_name             = "plan_img_file",
                                            $filed_label            = "plan_img_file",
                                            $required_field         = " accept='image/*' ",
                                            $checkbox_field_name    = "plan_checkbox",
                                            $need_alt_title         = "no",
                                            $required_alt_title     = "no",
                                            $old_path_value         = "",
                                            $old_title_value        = "",
                                            $old_alt_value          = "",
                                            $recomended_size        = "",
                                            $disalbed               = "",
                                            $displayed_img_width    = "50",
                                            $display_label          = "إرفع صورة الخطة",
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




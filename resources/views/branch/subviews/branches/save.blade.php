@extends('branch.main_layout')

@section('additional_css')

    <link href="{{url("/")}}/public/admin/lib/jquery.steps/css/jquery.steps.css" rel="stylesheet">
    <link href="{{url("/")}}/public/admin/lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="{{url("/")}}/public/admin/lib/bootstrap-datetimepicker2/bootstrap-datetimepicker.css" rel="stylesheet">


@endsection

@section('additional_js')

    <script src="{{url("/")}}/public/admin/lib/select2/js/select2.full.min.js"></script>
    <script src="{{url("/")}}/public/admin/lib/jquery.steps/js/jquery.steps.js"></script>
    <script src="{{url("/")}}/public/admin/lib/parsleyjs/js/parsley.js"></script>
    <script src="{{url("/")}}/public/admin/lib/bootstrap-datetimepicker2/bootstrap-datetimepicker.min.js"></script>


@endsection

@section('subview')

    <?php

    $header_text            = "جديد";
    $branch_id      = "";
    $required_sign          = ' <span style="color: red;font-weight: bold;">*</span>';

    if (is_object($item_data)) {
        $header_text            = $item_data->branch_name;
        $branch_id      = $item_data->branch_id;
    }

    ?>

    <div class="slim-mainpanel">
        <div class="container">
            <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url("branch/dashboard")}}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$header_text}}</li>
                </ol>
                <h6 class="slim-pagetitle">بيانات الفرع</h6>
            </div><!-- slim-pageheader -->

            <div class="section-wrapper">

                <p class="mg-b-20 mg-sm-b-40"></p>

                <div class="table-wrapper">

                    <form id="save_form" action="{{url("branch/branches/save/$branch_id")}}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="section-wrapper mg-t-20">

                                    <label class="section-title">بيانات الفرع</label>
                                    <p class="mg-b-20 mg-sm-b-40"></p>

                                    <div class="row">

                                        <?php
                                        echo generate_depended_selects(
                                            $field_name_1           = "city_id",
                                            $field_label_1          = "إختار المدينة ؟ ".$required_sign,
                                            $field_text_1           = collect($cities)->pluck("city_name")->all(),
                                            $field_values_1         = collect($cities)->pluck("city_id")->all(),
                                            $field_selected_value_1 = $item_data->city_id ?? '' ,
                                            $field_required_1       = "",
                                            $field_class_1          = "form-control select2_search",

                                            $field_name_2           = "district_id",
                                            $field_label_2          = "إختار الحي ؟ ".$required_sign,
                                            $field_text_2           = collect($districts)->pluck('district_name')->all(),
                                            $field_values_2         = collect($districts)->pluck('district_id')->all(),
                                            $field_selected_value_2 = $item_data->district_id ?? ''  ,
                                            $field_2_depend_values  = collect($districts)->pluck('city_id')->all(),
                                            $field_required_2       = "",
                                            $field_class_2          = "form-control "
                                        );

                                        $normal_tags =
                                            [
                                                "phone_number"
                                            ];

                                        $attrs          = generate_default_array_inputs_html(
                                            $fields_name        = $normal_tags,
                                            $data               = $item_data,
                                            $key_in_all_fields  = "yes",
                                            $required           = "",
                                            $grid_default_value = 6
                                        );


                                        $attrs[0]["phone_number"]          = 'رقم التليفون'.$required_sign;
                                        $attrs[3]["phone_number"]            = "number";

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
                                                        "branch_name","branch_description"
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

                                                $attrs[0]["branch_name"] = 'الإسم'.$required_sign;
                                                $attrs[0]["branch_description"] = 'الوصف';
                                                $attrs[3]["branch_description"] = 'textarea';
                                                $attrs[6]["branch_description"] = 12;





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

                                <div class="col-md-12">
                                    <div class="section-wrapper mg-t-20">

                                        <label class="section-title">إحداثي الموقع</label>
                                        <p class="mg-b-20 mg-sm-b-40"></p>

                                        <?php
                                        echo generate_map_helper(
                                            is_object($item_data)?$item_data->map_lat:"",
                                            is_object($item_data)?$item_data->map_lng:""
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




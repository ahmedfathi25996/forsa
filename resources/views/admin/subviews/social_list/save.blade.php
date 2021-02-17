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
        $social_list_id        = "";
        $required_sign         = ' <span style="color: red;font-weight: bold;">*</span>';

        if (is_object($item_data)) {
            $header_text            = $item_data->name;
            $social_list_id         = $item_data->social_list_id;
            $img_id                 = $item_data->img_id;
        }

    ?>

    <div class="slim-mainpanel">
        <div class="container">
            <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="{{url("admin/social")}}">مواقع التواصل</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$header_text}}</li>
                </ol>
                <h6 class="slim-pagetitle">مواقع التواصل</h6>
            </div><!-- slim-pageheader -->

            <div class="section-wrapper">
                <label class="section-title">
                    <a class="btn btn-primary mg-b-6" href="{{url("admin/social/save")}}"> جديد <i class="fa fa-plus"></i></a>
                </label>
                <p class="mg-b-20 mg-sm-b-40"></p>

                <div class="table-wrapper">

                    <form id="save_form" action="{{url("admin/social/save/$social_list_id")}}" method="POST" enctype="multipart/form-data">

                        <div class="row">

                            <div class="col-md-12">
                                <div class="section-wrapper mg-t-20">

                                    <label class="section-title">البيانات الأساسية</label>
                                    <p class="mg-b-20 mg-sm-b-40"></p>

                                    <div class="row">

                                        <?php

                                            $normal_tags            = [
                                                "social_url"
                                            ];

                                            $attrs                  = generate_default_array_inputs_html(
                                                $fields_name        = $normal_tags,
                                                $data               = $item_data,
                                                $key_in_all_fields  = "yes",
                                                $required           = "",
                                                $grid_default_value = 12
                                            );

                                            $attrs[0]["social_url"]  = " اللينك ". $required_sign;


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
                                    <label class="section-title">بيانات الترجمة</label>
                                    <p class="mg-b-20 mg-sm-b-40"></p>

                                    <div id="wizard6">

                                        <?php foreach($all_langs as $lang_key => $item): ?>

                                        <?php
                                            $lang_id = $item->lang_id;
                                            $required_sign = ' <span style="color: red;font-weight: bold;">*</span>';
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
                                                            "name"
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

                                                    $attrs[0]["name"] = 'الإسم'.$required_sign;


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
                                            $img_obj                    = $item_data->social_img_id ?? "";

                                            echo generate_img_tags_for_form(
                                                $filed_name             = "social_img_file",
                                                $filed_label            = "social_img_file",
                                                $required_field         = " accept='image/*' ",
                                                $checkbox_field_name    = "social_img_checkbox",
                                                $need_alt_title         = "no",
                                                $required_alt_title     = "no",
                                                $old_path_value         = "",
                                                $old_title_value        = "",
                                                $old_alt_value          = "",
                                                $recomended_size        = "",
                                                $disalbed               = "",
                                                $displayed_img_width    = "50",
                                                $display_label          = "إرفع لوجو التواصل ",
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




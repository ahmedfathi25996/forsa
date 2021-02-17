@extends('admin.main_layout')

@section('additional_css')

    <link href="{{url("/")}}/public/admin/lib/select2/css/select2.min.css" rel="stylesheet">

@endsection

@section('additional_js')

    <script src="{{url("/")}}/public/admin/lib/select2/js/select2.full.min.js"></script>

@endsection

@section('subview')

    <?php

        $header_text    = "جديد";
        $lang_id        = "";

        if (is_object($item_data)) {
            $header_text    = $item_data->lang_text;
            $lang_id        = $item_data->lang_id;
        }

    ?>

    <div class="slim-mainpanel">
        <div class="container">
            <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="{{url("admin/langs")}}">اللغات</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$header_text}}</li>
                </ol>
                <h6 class="slim-pagetitle">اللغات</h6>
            </div><!-- slim-pageheader -->

            <div class="section-wrapper">
                <label class="section-title">
                    <a class="btn btn-primary mg-b-6" href="{{url("admin/langs/save")}}"> جديد <i class="fa fa-plus"></i></a>
                </label>
                <p class="mg-b-20 mg-sm-b-40"></p>

                <div class="table-wrapper">

                    <form id="save_form" action="{{url("admin/langs/save/$lang_id")}}" method="POST" enctype="multipart/form-data">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="section-wrapper mg-t-20">

                                    <label class="section-title">البيانات الأساسية</label>
                                    <p class="mg-b-20 mg-sm-b-40"></p>

                                    <div class="row">

                                        <?php

                                            $normal_tags    = [
                                                "lang_symbole", "lang_text"
                                            ];

                                            $attrs          = generate_default_array_inputs_html(
                                                $fields_name        = $normal_tags,
                                                $data               = $item_data,
                                                $key_in_all_fields  = "yes",
                                                $required           = "",
                                                $grid_default_value = 6
                                            );

                                            $attrs[0]["lang_symbole"]   = " كود اللغه ويجب ان يتكون من حرفين فقط ".' <span style="color: red;font-weight: bold;">*</span>';
                                            $attrs[0]["lang_text"]      = " اسم اللغه ".' <span style="color: red;font-weight: bold;">*</span>';

                                            $attrs[2]["lang_symbole"]   = "required";

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

                                            echo
                                                generate_select_tags(
                                                    $field_name         = "lang_direction",
                                                    $label_name         = "اتجاة اللغه في العرض".' <span style="color: red;font-weight: bold;">*</span>',
                                                    $text               = ["من اليسار لليمين","من اليمين لليسار"],
                                                    $values             = ["ltr","rtl"],
                                                    $selected_value     = "",
                                                    $class              = "form-control select_2_primary",
                                                    $multiple           = "",
                                                    $required           = "",
                                                    $disabled           = "",
                                                    $data               = $item_data ,
                                                    $grid               = "col-md-6"
                                                );

                                        ?>

                                    </div>

                                </div>

                                <div class="section-wrapper mg-t-20">

                                    <label class="section-title">الصور</label>
                                    <p class="mg-b-20 mg-sm-b-40"></p>

                                    <div class="row">
                                        <?php
                                        $img_obj                    = $item_data->lang_img ?? "";
                                        echo generate_img_tags_for_form(
                                            $filed_name             = "lang_img_file",
                                            $filed_label            = "lang_img_file",
                                            $required_field         = " accept='image/*' ",
                                            $checkbox_field_name    = "lang_img_checkbox",
                                            $need_alt_title         = "no",
                                            $required_alt_title     = "no",
                                            $old_path_value         = "",
                                            $old_title_value        = "",
                                            $old_alt_value          = "",
                                            $recomended_size        = "",
                                            $disalbed               = "",
                                            $displayed_img_width    = "50",
                                            $display_label          = "إرفع صورة العلم",
                                            $img_obj,
                                            $grid                   = "col-md-6"
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




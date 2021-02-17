@extends('admin.main_layout')

@section('additional_css')

    <link href="{{url("/")}}/public/admin/lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="{{url("/")}}/public/admin/lib/Ionicons/css/ionicons.css" rel="stylesheet">

@endsection

@section('additional_js')

    <script src="{{url("/")}}/public/admin/lib/select2/js/select2.full.min.js"></script>

@endsection

@section('subview')
    <?php

    $header_text    = " ";
    $city_id        = "";

    if (is_object($item_data)) {
        $header_text    = $item_data->full_name;
        $user_id        = $item_data->user_id;
        $required_sign  = ' <span style="color: red;font-weight: bold;">*</span>';
    }

    ?>


    <div class="slim-mainpanel">
        <div class="container">
            <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$header_text}}</li>
                </ol>
                <h6 class="slim-pagetitle">تعديل البيانات</h6>
            </div><!-- slim-pageheader -->

            <div class="section-wrapper">

                <p class="mg-b-20 mg-sm-b-40"></p>

                <div class="table-wrapper">

                    <form id="save_form" action="<?=url("admin/admins/edit/$user_id")?>" method="POST" enctype="multipart/form-data">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="section-wrapper mg-t-20">

                                    <label class="section-title">البيانات الأساسية</label>
                                    <p class="mg-b-20 mg-sm-b-40"></p>

                                    <div class="row">

                                        <?php

                                        $normal_tags            =
                                            [
                                                "full_name", "email"
                                            ];

                                        $attrs                    = generate_default_array_inputs_html(
                                            $fields_name          = $normal_tags,
                                            $data                 = $item_data,
                                            $key_in_all_fields    = "yes",
                                            $required             = "",
                                            $grid_default_value   = 6
                                        );

                                        $attrs[0]["full_name"]    = " الاسم ". $required_sign;
                                        $attrs[0]["email"]        = " البريد الالكتروني ". $required_sign;


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

                                    <label class="section-title">تغيير الرقم السري</label>
                                    <p class="mg-b-20 mg-sm-b-40"></p>

                                    <div class="row">

                                        <?php

                                        $normal_tags2            =
                                            [
                                                "current_password", "password","password_confirmation"
                                            ];

                                        $attrs                    = generate_default_array_inputs_html(
                                            $fields_name          = $normal_tags2,
                                            $data                 = $item_data,
                                            $key_in_all_fields    = "yes",
                                            $required             = "",
                                            $grid_default_value   = 6
                                        );
                                        $attrs[0]["current_password"]       = "كلمة المرور الحالية";
                                        $attrs[3]["current_password"]       = "password";
                                        $attrs[4]["current_password"]       = "";
                                        $attrs[6]["current_password"]       = 12;

                                        $attrs[0]["password"]               = "كلمة المرور الجديدة";
                                        $attrs[3]["password"]               = "password";
                                        $attrs[4]["password"]               = "";


                                        $attrs[0]["password_confirmation"]   = "تاكيد كلمة المرور";
                                        $attrs[3]["password_confirmation"]   = "password";
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
                                        $img_obj                    = $item_data->logo_img_id ?? "";

                                        echo generate_img_tags_for_form(
                                            $filed_name             = "logo_img_file",
                                            $filed_label            = "logo_img_file",
                                            $required_field         = " accept='image/*' ",
                                            $checkbox_field_name    = "logo_checkbox",
                                            $need_alt_title         = "no",
                                            $required_alt_title     = "no",
                                            $old_path_value         = "",
                                            $old_title_value        = "",
                                            $old_alt_value          = "",
                                            $recomended_size        = "",
                                            $disalbed               = "",
                                            $displayed_img_width    = "50",
                                            $display_label          = "إرفع الصورة الشخصية  ",
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




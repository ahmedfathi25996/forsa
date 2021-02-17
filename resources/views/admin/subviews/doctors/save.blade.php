@extends('admin.main_layout')

@section('additional_css')

    <link href="{{url("/")}}/public/admin/lib/jquery.steps/css/jquery.steps.css" rel="stylesheet">
    <link href="{{url("/")}}/public/admin/lib/summernote/css/summernote-bs4.css" rel="stylesheet">
    <link href="{{url("/")}}/public/admin/lib/select2/css/select2.min.css" rel="stylesheet">

@endsection

@section('additional_js')
    <script src="{{url("/")}}/public/admin/lib/jquery.steps/js/jquery.steps.js"></script>
    <script src="{{url("/")}}/public/admin/lib/parsleyjs/js/parsley.js"></script>
    <script src="{{url("/")}}/public/admin/lib/summernote/js/summernote-bs4.min.js"></script>
    <script src="{{url("/")}}/public/admin/lib/select2/js/select2.full.min.js"></script>

@endsection

@section('subview')

    <?php

    $header_text    = "جديد";
    $doctor_id       = "";
    $required_sign  = ' <span style="color: red;font-weight: bold;">*</span>';

    if (is_object($item_data)) {
        $header_text    = $item_data->full_name;
        $doctor_id       = $item_data->doctor_id;
    }

    ?>

    <div class="slim-mainpanel">
        <div class="container">
            <div class="manager-header">
                <div class="slim-pageheader">
                    <ol class="breadcrumb slim-breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{url("admin/doctors")}}">الاطباء</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$header_text}}</li>
                    </ol>
                    <h6 class="slim-pagetitle">الاطباء</h6>
                </div><!-- slim-pageheader -->
                <a id="contactNavicon"  href="" class="contact-navicon"><i class="icon ion-navicon-round"></i></a>
            </div><!-- manager-header -->

            <div class="manager-wrapper">

                <div class="manager-right">
                    <div class="table-wrapper">

                        <form id="save_form" action="{{url("admin/doctors/save/$doctor_id")}}" method="POST" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-md-12">

                                    <div class="section-wrapper mg-t-20">

                                        <label class="section-title">بيانات المستخدم</label>
                                        <p class="mg-b-20 mg-sm-b-40"></p>

                                        <div class="row">

                                            <?php

                                            $normal_tags =
                                                [
                                                    "username","email","password","password_confirmation"
                                                ];

                                            $attrs          = generate_default_array_inputs_html(
                                                $fields_name        = $normal_tags,
                                                $data               = $item_data,
                                                $key_in_all_fields  = "yes",
                                                $required           = "",
                                                $grid_default_value = 6
                                            );

                                            $attrs[0]["username"]                            = 'اسم المستخدم'.$required_sign;
                                            $attrs[0]["email"]                            = 'البريد الالكتروني'.$required_sign;
                                            $attrs[0]["password"]                         = 'كلمة المرور';
                                            $attrs[0]["password_confirmation"]            = 'تاكيد كلمة المرور';
                                            $attrs[3]["password"]                         = "password";
                                            $attrs[3]["password_confirmation"]            = "password";

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

                                        <label class="section-title">البيانات الأساسية</label>
                                        <p class="mg-b-20 mg-sm-b-40"></p>

                                        <div class="row">

                                            <?php

                                            $normal_tags =
                                                [
                                                    "price","years_of_experience","session_duration"
                                                ];

                                            $attrs          = generate_default_array_inputs_html(
                                                $fields_name        = $normal_tags,
                                                $data               = $item_data,
                                                $key_in_all_fields  = "yes",
                                                $required           = "",
                                                $grid_default_value = 6
                                            );


                                            $attrs[0]["price"]                            = 'السعر '.$required_sign;
                                            $attrs[3]["price"]            = "number";
                                            $attrs[0]["years_of_experience"]                            = 'سنوات الخبرة'.$required_sign;
                                            $attrs[3]["years_of_experience"]            = "number";
                                            $attrs[0]["session_duration"]                            = 'مدة الجلسة'.$required_sign;
                                            $attrs[3]["session_duration"]            = "number";

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
                                                            "full_name","job_title","country","brief_bio","specialties"
                                                        ];

                                                    $attrs          = generate_default_array_inputs_html(
                                                        $fields_name        = $normal_tags,
                                                        $data               = $translate_data,
                                                        $key_in_all_fields  = "yes",
                                                        $required           = "",
                                                        $grid_default_value = 12
                                                    );

                                                    foreach ($attrs[1] as $key => $value) {
                                                        $attrs[1][$key]     .= "[]";
                                                    }

                                                    $attrs[0]["full_name"]         = 'الإسم'.$required_sign;
                                                    $attrs[0]["job_title"]         = 'الاسم الوظيفى'.$required_sign;
                                                    $attrs[0]["country"]         = 'البلد'.$required_sign;
                                                    $attrs[0]["brief_bio"]         = 'السيرة الذاتية'.$required_sign;
                                                    $attrs[3]["brief_bio"]         = "textarea";
                                                    $attrs[0]["specialties"]         = 'التخصصات'.$required_sign;
                                                    $attrs[3]["specialties"]         = "textarea";

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
                                </div>

                                <div class="col-md-12">
                                    <div class="section-wrapper mg-t-20">

                                        <label class="section-title">الصورة الشخصية</label>
                                        <p class="mg-b-20 mg-sm-b-40"></p>

                                        <div class="row">
                                            <?php
                                            $img_obj                    = $item_data->doctor_img_id ?? "";

                                            echo generate_img_tags_for_form(
                                                $filed_name             = "doctor_img_file",
                                                $filed_label            = "doctor_img_file",
                                                $required_field         = " accept='image/*' ",
                                                $checkbox_field_name    = "doctor_img_checkbox",
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


                                <div class="col-md-12">
                                    <div class="section-wrapper mg-t-20">

                                        <label class="section-title">شهادات الخبرة</label>
                                        <p class="mg-b-20 mg-sm-b-40"></p>

                                        <?php
                                       // dd($item_data->slider_imgs);
                                        echo
                                        generate_slider_imgs_tags(
                                            $slider_photos  = $item_data->slider_imgs ?? "",
                                            $field_name     = "gallery_slider_file",
                                            $field_label    = " Certificates Slider",
                                            $field_id       = "gallery_slider_file_id",
                                            $accept         = "image/*",
                                            $need_alt_title = "no"
                                        );
                                        ?>

                                    </div>
                                </div>


                            </div>

                            {{csrf_field()}}

                            <div class="form-layout-footer">
                                <input id="submit" type="submit" value="حفظ" class="btn btn-primary bd-0">
                            </div>

                        </form>

                    </div>
                </div><!-- manager-right -->

                <div class="manager-left">

                    <a href="{{url("admin/doctors/save")}}" class="btn btn-contact-new">جديد</a>

                    @include('admin.subviews.doctors.components.sidebar')

                </div><!-- manager-left -->

            </div><!-- manager-wrapper -->

        </div><!-- container -->
    </div><!-- slim-mainpanel -->


@endsection




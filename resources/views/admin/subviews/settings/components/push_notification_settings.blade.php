<div class="form-layout">

    <div class="row mg-b-25">

        <?php

            echo
            generate_select_tags(
                $field_name         = "dry_run",
                $label_name         = "إختر مرحلة التطبيق ؟ ".$required_sign,
                $text               = ["التطوير", "اللايف"],
                $values             = ["1", "0"],
                $selected_value     = [$settings['dry_run'][0]->setting_value],
                $class              = "form-control select_2_primary",
                $multiple           = "",
                $required           = "",
                $disabled           = "",
                $data               = "" ,
                $grid               = "col-lg-6"
            );


            $normal_tags =
                [
                    "android_key"
                ];

            $attrs          = generate_default_array_inputs_html(
                $fields_name        = $normal_tags,
                $data               = "",
                $key_in_all_fields  = "yes",
                $required           = "",
                $grid_default_value = 12
            );

            $attrs[0]["android_key"]       = 'مفتاح الإشعارات للأندرويد '.$required_sign;

            $attrs[4]["android_key"]       = $settings['android_key'][0]->setting_value;

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

    </div><!-- row -->

    <div class="row mg-b-25">

        <?php

            $img_obj                    = $settings['pem_file'][0]->pem_file_obj ?? "";
            echo generate_img_tags_for_form(
                $filed_name             = "pem_file_input",
                $filed_label            = "pem_file_input",
                $required_field         = " accept='.pem' ",
                $checkbox_field_name    = "pem_file_checkbox",
                $need_alt_title         = "no",
                $required_alt_title     = "no",
                $old_path_value         = "",
                $old_title_value        = "",
                $old_alt_value          = "",
                $recomended_size        = "",
                $disalbed               = "",
                $displayed_img_width    = "50",
                $display_label          = "إرفع ملف الإشعارات للأيفون .pem",
                $img_obj,
                $grid                   = "col-lg-8"
            );

        ?>

    </div>


</div>
<div class="form-layout">
    <div class="row mg-b-25">

        <?php

            $normal_tags =
                [
                    "name","website_percentage"
                ];

            $attrs          = generate_default_array_inputs_html(
                $fields_name        = $normal_tags,
                $data               = "",
                $key_in_all_fields  = "yes",
                $required           = "",
                $grid_default_value = 6
            );

            $attrs[0]["name"]               = 'اسم التطبيق '.$required_sign;
            $attrs[0]["website_percentage"]    = 'نسبة السيستم من كل حجز ';


            $attrs[3]["website_percentage"]    = "number";

            $attrs[4]["name"]               = $settings['name'][0]->setting_value;
            $attrs[4]["website_percentage"]    = $settings['website_percentage'][0]->setting_value;

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

            $img_obj                    = $settings['logo'][0]->logo_img ?? "";
            echo generate_img_tags_for_form(
                $filed_name             = "logo_img_file",
                $filed_label            = "logo_img_file",
                $required_field         = " accept='image/*' ",
                $checkbox_field_name    = "logo_img_checkbox",
                $need_alt_title         = "no",
                $required_alt_title     = "no",
                $old_path_value         = "",
                $old_title_value        = "",
                $old_alt_value          = "",
                $recomended_size        = "",
                $disalbed               = "",
                $displayed_img_width    = "50",
                $display_label          = "إرفع صورة الشعار",
                $img_obj,
                $grid                   = "col-lg-8"
            );

            $img_obj                    = $settings['icon'][0]->icon_img ?? "";
            echo generate_img_tags_for_form(
                $filed_name             = "icon_img_file",
                $filed_label            = "icon_img_file",
                $required_field         = " accept='image/*' ",
                $checkbox_field_name    = "icon_img_checkbox",
                $need_alt_title         = "no",
                $required_alt_title     = "no",
                $old_path_value         = "",
                $old_title_value        = "",
                $old_alt_value          = "",
                $recomended_size        = "",
                $disalbed               = "",
                $displayed_img_width    = "50",
                $display_label          = "إرفع صورة الأيقونه",
                $img_obj,
                $grid                   = "col-lg-8"
            );

        ?>

    </div>




</div>
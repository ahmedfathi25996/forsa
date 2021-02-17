<div class="form-layout">
    <div class="row mg-b-25">

        <?php

            $normal_tags =
                [
                    "name", "version","referral_points"
                ];

            $attrs          = generate_default_array_inputs_html(
                $fields_name        = $normal_tags,
                $data               = "",
                $key_in_all_fields  = "yes",
                $required           = "",
                $grid_default_value = 6
            );

            $attrs[0]["name"]               = 'اسم التطبيق '.$required_sign;
            $attrs[0]["version"]            = 'النسخه الحالية للتطبيق ';
            $attrs[0]["referral_points"]    = 'عدد النقاط التي يحصل عليها المستخدم من مشاركة الرقم التسلسلي ';

            $attrs[2]["version"]            = "disabled";

            $attrs[3]["referral_points"]    = "number";

            $attrs[4]["name"]               = $settings['name'][0]->setting_value;
            $attrs[4]["version"]            = $settings['version'][0]->setting_value;
            $attrs[4]["referral_points"]    = $settings['referral_points'][0]->setting_value;

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
                $field_name         = "allowed_countries",
                $label_name         = "إختار الدول المتاح فيها البيع ؟ ".$required_sign,
                $text               = array_values(list_countries()),
                $values             = array_keys(list_countries()),
                $selected_value     = json_decode($settings['allowed_countries'][0]->setting_value),
                $class              = "form-control select2",
                $multiple           = "multiple",
                $required           = "",
                $disabled           = "",
                $data               = "" ,
                $grid               = "col-lg-12"
            );


            echo
            generate_select_tags(
                $field_name         = "type",
                $label_name         = "إختار المجال ؟ ".$required_sign,
                $text               = ["مطاعم", "ملابس", "صيدليات", "ماركت", "أخري"],
                $values             = ["restaurants", "clothes", "pharmacies", "markets", "other"],
                $selected_value     = [$settings['type'][0]->setting_value],
                $class              = "form-control select_2_primary",
                $multiple           = "",
                $required           = "",
                $disabled           = "",
                $data               = "" ,
                $grid               = "col-lg-6"
            );

            echo
            generate_select_tags(
                $field_name         = "timezone",
                $label_name         = "إختار التوقيت ؟ ".$required_sign,
                $text               = $timezones,
                $values             = $timezones,
                $selected_value     = [$settings['timezone'][0]->setting_value],
                $class              = "form-control select2_search",
                $multiple           = "",
                $required           = "",
                $disabled           = "",
                $data               = "" ,
                $grid               = "col-lg-6"
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


    <?php if(false): ?>
        <div class="row mg-b-25">
            <p class="alert alert-warning">
                <i class="icon ion-information-circled"></i>
                <b>برجاء العلم انه اذا تم تغيير المنطقه فسيتم تغيير تواريخ العرض في التطبيق !</b> <br>
            </p>
        </div>
    <?php endif; ?>


</div>
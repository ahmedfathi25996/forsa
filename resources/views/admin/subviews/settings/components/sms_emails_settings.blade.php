<div class="form-layout">
    <div class="row mg-b-25 sms_emails_settings_div">

        <?php

            echo
            generate_select_tags(
                $field_name         = "verification_type",
                $label_name         = "إختار نوع التحقق للرسائل ؟ ".$required_sign,
                $text               = ["بالبريد الإلكتروني", "رساله نصية", "الإثنان معا"],
                $values             = ["email", "sms", "both"],
                $selected_value     = [$settings['verification_type'][0]->setting_value],
                $class              = "form-control select_2_primary change_verification_type",
                $multiple           = "",
                $required           = "",
                $disabled           = "",
                $data               = "" ,
                $grid               = "col-lg-12"
            );

        ?>

        <?php

            echo
            generate_select_tags(
                $field_name         = "mail_type",
                $label_name         = "إختار إعدادات الإيميل ؟ ".$required_sign,
                $text               = ["Mail", "SMTP"],
                $values             = ["mail", "smtp"],
                $selected_value     = [$settings['mail_type'][0]->setting_value],
                $class              = "form-control select_2_primary change_mail_type",
                $multiple           = "",
                $required           = "",
                $disabled           = "",
                $data               = "" ,
                $grid               = "col-lg-6 mail_type_div"
            );

        ?>

        <div class="col email_input_div">
            <?php

                $normal_tags =
                    [
                        "email"
                    ];

                $attrs          = generate_default_array_inputs_html(
                    $fields_name        = $normal_tags,
                    $data               = "",
                    $key_in_all_fields  = "yes",
                    $required           = "",
                    $grid_default_value = 12
                );

                $attrs[0]["email"]          = 'البريد الإلكتروني للسيستيم '.$required_sign;

                $attrs[4]["email"]          = $settings['email'][0]->setting_value;

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
    </div><!-- row -->


    <div class="smtp_settings_div">
        <h3 class="alert alert-info"><b>إعدادات SMTP</b></h3>
        <div class="row mg-b-25">
            <?php

            $normal_tags =
                [
                    "smtp_port", "smtp_host", "smtp_user", "smtp_pass"
                ];

            $attrs          = generate_default_array_inputs_html(
                $fields_name        = $normal_tags,
                $data               = "",
                $key_in_all_fields  = "yes",
                $required           = "",
                $grid_default_value = 6
            );

            $attrs[0]["smtp_port"]          = ' البورت ';
            $attrs[0]["smtp_host"]          = ' المضيف ';
            $attrs[0]["smtp_user"]          = ' اسم المستخدم ';
            $attrs[0]["smtp_pass"]          = ' كلمة السر ';

            $attrs[4]["smtp_port"]          = $settings['smtp_port'][0]->setting_value;
            $attrs[4]["smtp_host"]          = $settings['smtp_host'][0]->setting_value;
            $attrs[4]["smtp_user"]          = $settings['smtp_user'][0]->setting_value;
            $attrs[4]["smtp_pass"]          = $settings['smtp_pass'][0]->setting_value;

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

    <div class="sms_settings_div">
        <h3 class="alert alert-info"><b>إعدادات بوابة الرسائل النصيه</b></h3>
        <div class="row mg-b-25">

            <?php

                $normal_tags =
                    [
                        "sms_username", 'sms_sender_name', "sms_password"
                    ];

                $attrs          = generate_default_array_inputs_html(
                    $fields_name        = $normal_tags,
                    $data               = "",
                    $key_in_all_fields  = "yes",
                    $required           = "",
                    $grid_default_value = 6
                );

                $attrs[0]["sms_username"]      = 'اسم المستخدم ';
                $attrs[0]["sms_sender_name"]   = 'اسم الراسل ';
                $attrs[0]["sms_password"]      = 'كلمة السر ';

                $attrs[4]["sms_username"]      = $settings['sms_username'][0]->setting_value;
                $attrs[4]["sms_sender_name"]   = $settings['sms_sender_name'][0]->setting_value;
                $attrs[4]["sms_password"]      = $settings['sms_password'][0]->setting_value;

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
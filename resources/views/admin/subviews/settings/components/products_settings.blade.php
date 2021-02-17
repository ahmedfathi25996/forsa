<div class="form-layout">
    <div class="row mg-b-25">

        <?php

            echo
            generate_select_tags(
                $field_name         = "currency",
                $label_name         = "إختار العملة ؟ ".$required_sign,
                $text               = array_values(list_currency()),
                $values             = array_keys(list_currency()),
                $selected_value     = [$settings['currency'][0]->setting_value],
                $class              = "form-control select2_search",
                $multiple           = "",
                $required           = "",
                $disabled           = "",
                $data               = "" ,
                $grid               = "col-lg-6"
            );

            $normal_tags =
                [
                    "currency_rate"
                ];

            $attrs          = generate_default_array_inputs_html(
                $fields_name        = $normal_tags,
                $data               = "",
                $key_in_all_fields  = "yes",
                $required           = "",
                $grid_default_value = 6
            );

            $attrs[0]["currency_rate"]      = 'قيمة التحويل للدولار '.$required_sign;

            $attrs[3]["currency_rate"]      = "number";

            $attrs[4]["currency_rate"]      = $settings['currency_rate'][0]->setting_value;

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
        <p class="alert alert-warning">
            <i class="icon ion-information-circled"></i>
            <b>برجاء العلم انه غير مسموح بتغيير العمله اذا وجد طلبات سابقه في النظام !</b> <br>
        </p>
    </div>

</div>
<div class="section-wrapper mg-t-20">

    <label class="section-title">بيانات باي بال</label>
    <p class="mg-b-20 mg-sm-b-40"></p>

    <div class="row">

        <?php

            $normal_tags            = [
                "client_id","secret_key","client_email"
            ];

            $attrs                   = generate_default_array_inputs_html(
                $fields_name         = $normal_tags,
                $data                = json_decode($item_data->payment_credentials),
                $key_in_all_fields   = "yes",
                $required            = "",
                $grid_default_value  = 12
            );
            $attrs[0]["client_id"]   = " Client id ". $required_sign;
            $attrs[0]["secret_key"]  = "Secret Key". $required_sign;
            $attrs[0]["client_email"]= "Client Email". $required_sign;

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
                $field_name         = "sandbox",
                $label_name         =  "Sandbox".$required_sign,
                $text               = ['true','false'],
                $values             = ['true','false'],
                $selected_value     = "",
                $class              = "form-control select_2_primary",
                $multiple           = "",
                $required           = "",
                $disabled           = "",
                $data               = json_decode($item_data->payment_credentials) ,
                $grid               = "col-md-6"
            );

        ?>

    </div>

</div>

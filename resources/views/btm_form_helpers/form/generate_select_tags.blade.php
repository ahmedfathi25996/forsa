<?php

    if ($selected_value == "") {
        $selected_value = [""];
    }

    if (isset($data->$field_name)) {
        $selected_value     = $data->$field_name;
        if (!is_array($data->$field_name)) {
            $selected_value = array($data->$field_name);
        }
    }

    if ($multiple != "" && $remove_multiple == false) {
        $field_name .= "[]";
    }

    $field_id       = $field_name . "_id";


?>


<div class="form-group {{$grid}}">

    <?php if(!$hide_label):?>
    <label style="width: 100%;" for="">{!! $label_name !!}</label>
    <?php endif;?>

    <select {{$disabled}} {{$multiple}} name="{{$field_name}}" id="{{$field_id}}" class="{{$class}}" {{$required}} >

        <?php foreach($values as $key => $value): ?>
        <?php
            $selected = "";
            if (in_array($value, $selected_value)) {
                $selected = "selected";
            }
        ?>
        <option value="{{$values[$key]}}" {{$selected}} >{{$text[$key]}}</option>
        <?php endforeach; ?>
    </select>
</div>


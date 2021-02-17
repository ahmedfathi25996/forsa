<?php foreach($fields_name as $key => $value): ?>

    <?php $grid_col = "12"; ?>

    <?php if (isset($grid[$key])): ?>
        <?php $grid_col = $grid[$key]; ?>
    <?php endif;?>

    <div data-hidediv="{{$fields_name[$key]}}_div_id'.'" class="{{((strpos($class[$key],"clear_both")!==false)?"clear_both":"")}}  col-md-{{$grid_col}} form-group {{$fields_name[$key]}}_div_class'.'">

        <div id="{{$fields_name[$key]}}"></div>

        <?php if($type[$key] != 'checkbox'):?>
             <label for="{{$fields_name[$key]}}_id">{!! $labels_name[$key] !!}</label>
        <?php endif;?>

        <div {{(($type[$key]=="checkbox")?'style="height: 34px;"':"")}} >
            <!-- Case for Type -->
            <?php if($type[$key] == 'textarea'):?>
                     <textarea name="{{$value}}" style="resize:vertical" class="form-control {{string_safe($fields_name[$key])}}_class  {{$class[$key]}}" id="{{$fields_name[$key]}}_id">{{$values[$key]}}</textarea>
            <?php elseif ($type[$key] == 'number'): ?>
                 <input type="{{$type[$key]}}" min="0" step="0.0001" class="form-control {{$class[$key]}} {{$fields_name[$key]}}"
                        {{$required[$key]}} name="{{$value}}" value="{{$values[$key]}}" id="{{$fields_name[$key]}}_id">
            <?php elseif ($type[$key] == 'checkbox'): ?>

                <label class="form-control" for="{{$fields_name[$key]}}_id">

                    <?php
                        $class[$key] = str_replace("form-control", " ", $class[$key]);
                    ?>
                    <input type="{{$type[$key]}}" value="1" class="{{$class[$key]}}" {{$required[$key]}} name="{{$value}}"  {{(($values[$key]==1)?"checked":"")}} id="{{$fields_name[$key]}}_id">
                    {{$labels_name[$key]}}
                </label>

            <?php elseif ($type[$key] == "date_time"): ?>
                <?php

                    if ($values[$key] != "" && $values[$key] != "0000-00-00 00:00:00") {
                        $values[$key] = date('Y-m-d H:i:s', strtotime($values[$key]));
                        if ($values[$key] == "01/1/1970 2:00 am") {
                            $values[$key] = "";
                        }
                    } else {
                        $values[$key] = "";
                    }
                ?>

                <div class='input-group' id='datetimepicker_{{$key}}'>
                    <!-- 01/30/2017 4:29 PM  -->
                    <input type="text" autocomplete="off" data-date-format="yyyy-mm-dd hh:ii" class="form-control date fire_datetimepicker {{$class[$key]}}  {{$fields_name[$key]}}" value="{{$values[$key]}}" {{$required[$key]}} name="{{$fields_name[$key]}}" id="{{$fields_name[$key]}}_id"/>
                    <div class="input-group-prepend calendar_icon">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </div>
                </div>

            <?php elseif ($type[$key] == "date"): ?>
                <!-- 01/30/2017 4:29 PM -->
                <div class='input-group' id='datepicker_{{$fields_name[$key]}}'>

                    <?php

                        if ($values[$key] != "" && $values[$key] != "1970-01-01" && $values[$key] != "0000-00-00") {
                            $values[$key] = date('Y-m-d', strtotime($values[$key]));
                        } else {
                            $values[$key] = "";
                        }

                    ?>
                    <input type="text" autocomplete="off" class="form-control fire_datepicker {{$class[$key]}} {{$fields_name[$key]}} " value="{{$values[$key]}}" {{$required[$key]}} name="{{$fields_name[$key]}}" id="{{$fields_name[$key]}}_id"/>
                    <div class="input-group-prepend calendar_icon">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </div>
                 </div>

            <?php elseif ($type[$key] == "time"): ?>
                <div class='input-group' id='timepicker_{{$fields_name[$key]}}'>
                    <?php
                        //01/30/2017 4:29 PM

                        if ($values[$key] != "") {
                            $values[$key] = date('H:i', strtotime($values[$key]));
                        } else {
                            $values[$key] = "";
                        }
                    ?>

                    <input type="text" autocomplete="off"  data-date-format="hh:ii" class="form-control fire_timepicker {{$class[$key]}}  {{$fields_name[$key]}} " value="{{$values[$key]}}" {{$required[$key]}} name="{{$fields_name[$key]}}" id="{{$fields_name[$key]}}_id" />
                    <div class="input-group-prepend calendar_icon">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </div>
                </div>

            <?php else: ?>
                <input type="{{$type[$key]}}" class="form-control {{$class[$key]}} {{$fields_name[$key]}} " {{$required[$key]}} name="{{$fields_name[$key]}}" value="{{$values[$key]}}" id="{{$fields_name[$key]}}_id" >
            <?php endif;?>
        </div>
    </div>

<?php endforeach; ?>

<?php

/*
  ---------------------------------------------------------
    New Functions
  ---------------------------------------------------------
 */

function generate_fields_for_edit_content($fields_arr,$default_field_type="text"){
    $return_fields_arr=array();


    foreach ($fields_arr as $key => $field) {
        $return_fields_arr[$field]=array(
            "field_name"=>"$field",
            "field_type"=>"$default_field_type",
            "field_class"=>"form-control"
        );
    }

    return $return_fields_arr;
}

function generate_arr_fields_for_edit_content($fileds_arr){

    $return_fields=array();
    foreach ($fileds_arr as $key => $field) {
        $return_fields[$field]=array(
            "label_name"=>$field,
            "field_name"=>$field,
            "field_type"=>"text",
            "field_class"=>"form-control",
            "add_tiny_mce"=>"no"
        );
    }


    return $return_fields;
}

function generate_imgs_fields_for_edit_content($fields_arr){
    $return_fields=array();

    foreach ($fields_arr as $key => $field) {
        $return_fields[$field]=array(
            "field_name"=>"$field"."[]",
            "field_name_without_brackets"=>"$field",
            "required"=>"yes",
            "need_alt_title"=>"no",
            "width"=>"0",
            "height"=>"0",
        );
    }

    return $return_fields;
}

function generate_slider_fieldes_for_edit_content($fields_arr){
    $return_fields=array();
    foreach ($fields_arr as $key => $field) {

        $field_name=$field["field_name"];

        $additional_inputs_arr="";
        if(isset($field["additional_inputs_arr"])){
            $additional_inputs_arr=$field["additional_inputs_arr"];
        }


        $return_fields[$field_name]=array(
            "field_name"=>"$field_name",
            "label_name"=>"$field_name",
            "field_id"=>"$field_name"."_id",
            "accept"=>"image/*",
            "need_alt_title"=>"no",
            "additional_inputs_arr"=>$additional_inputs_arr,
            "width"=>"0",
            "height"=>"0",
            "folder"=>"edit_content_folder"
        );
    }

    return $return_fields;
}

function generate_select_tags_for_edit_content($fields_arr){
    $return_fields=array();

    foreach ($fields_arr as $key => $field) {
        $return_fields[$field]=array(
            "field_name"=>"$field",
            "label_name"=>"$field",
            "text"=>array(""),
            "values"=>array(""),
            "selected_value"=>array(""),
            "class"=>"form-control",
            "multiple"=>"",
            "required"=>"",
            "disabled"=> ""
        );

    }
    return $return_fields;
}

function generate_default_array_inputs_html($fields_name,$data,$key_in_all_fields="",$requried="required",$grid_default_value=12){
    $labels_name=array();
    $required=array();
    $type=array();
    $values=array();
    $class=array();
    $grid=array();



    foreach ($fields_name as $key => $value) {

        if ($key_in_all_fields!="") {
            $labels_name[$value]=capitalize_string($value);
            $required[$value]=$requried;

            if (isset($data->$value)) {
                $values[$value]=$data->$value;
            }else{
                $values[$value]="";
            }
        }
        else{
            $labels_name[]=capitalize_string($value);
            $required[]=$requried;

            if (isset($data->$value)) {
                $values[]=$data->$value;
            }else{
                $values[]="";
            }
        }


        $type[$value]="text";
        $class[$value]="form-control";
        $grid[$value]=$grid_default_value;
    }


    return array($labels_name , array_combine($fields_name,$fields_name) , $required , $type , $values , $class,$grid);
}

function reformate_arr_without_keys($arr){

    $new_arr=array();

    foreach ($arr as $key => $value) {
        $new_arr[]=$value;
    }

    return $new_arr;
}

/*
  =========================================================
    END New Functions
  =========================================================
 */

function generate_img_tags_for_form($filed_name,$filed_label,$required_field="",$checkbox_field_name,$need_alt_title="yes",$required_alt_title="",$old_path_value="",$old_title_value="",$old_alt_value="",$recomended_size="",$disalbed="",$displayed_img_width="50",$display_label="",$img_obj="",$grid=""){

    return \App\btm_form_helpers\form::generate_img_tags_for_form(
        $filed_name,
        $filed_label,
        $required_field,
        $checkbox_field_name,
        $need_alt_title,
        $required_alt_title,
        $old_path_value,
        $old_title_value,
        $old_alt_value,
        $recomended_size,
        $disalbed,
        $displayed_img_width,
        $display_label,
        $img_obj,
        $grid
    );

}

function generate_inputs_html($labels_name , $fields_name , $required , $type , $values , $class,$grid="")
{

    return \App\btm_form_helpers\form::generate_inputs_html(
        $labels_name,
        $fields_name,
        $required,
        $type,
        $values,
        $class,
        $grid
    );

}

function generate_select_years($already_selected_value="" , $earliest_year , $class , $name,$label="",$data="",$grid="12")
{
    return \App\btm_form_helpers\form::generate_select_years(
        $already_selected_value,
        $earliest_year,
        $class,
        $name,
        $label,
        $data,
        $grid

    );
}

//generate_array_input create array of items of array of fields field
//like that
//(1)
//<input type="text" name="field[]" value="1" />
//<textarea>1</textarea>
//(/1)
//(2)
//<input type="text" name="field[]" value="2" />
//<textarea>2</textarea>
//(/2)

//$label_name,$field_name,$required,$type,$values,$class all of these prameters are arraies
//except $values its array of arraies
//$values = array(
//  array("Home","First Page","About Us"),
//  array("Home","First Page","About Us")
//);
//$default_values = array(
//  "Home","First Page","About Us"
//);

function generate_array_input($label_name,$field_name,$required,$type,$values,$class,$add_tiny_mce="",$default_values=array(),$data=""){

    return \App\btm_form_helpers\form::generate_array_input(
        $label_name,$field_name,$required,$type,$values,$class,$add_tiny_mce,$default_values,$data
    );
}

/**
 * generate_slider_imgs_tags
 *
 * @return slider tags
 *
 * @param $slider_photos array of img obj
 * @param string $field_name ex slider_file
 * @param string $field_label field label
 * @param string $field_id field id
 * @param string $accept file accept like image/*
 * @param string $need_alt_title if yes you can add title&alt else no title& alt generated
 * @param arr $additional_inputs_arr get params of generate_inputs_html($labels_name , $fields_name , $required , $type , $values , $class)
 *
 *
 */
function generate_slider_imgs_tags(
    $slider_photos=array(),$field_name="",$field_label="",$field_id="",$accept="image/*",
    $need_alt="yes",$need_title="yes",$additional_inputs_arr=array(),$show_as_link=false,$add_item_label="جديد")
{
    return \App\btm_form_helpers\form::generate_slider_tags(
        $slider_photos,
        $field_name,
        $field_label,
        $accept,
        $need_alt_title=$need_alt,
        $additional_inputs_arr,
        $show_as_link,
        $add_item_label
    );
}

/**
 * generate_select_tags
 *
 * @return select tag with it selected option
 *
 * @param field_name string
 * @param $label_name string
 * @param $text array() option text
 * @param $values array() option value
 * @param $selected_value array of selected values
 * @param $class string do not forget to add form-control
 * @param stirng $multiple put multipe if u want to select mutiple value
 */
function generate_select_tags($field_name,$label_name,$text,$values,$selected_value,$class="",$multiple="",$required="",$disabled = "",$data = "",$grid = "col-md-12",$hide_label=false,$remove_multiple = false){

    return \App\btm_form_helpers\form::generate_select_tags(
        $field_name,
        $label_name,
        $text,
        $values,
        $selected_value,
        $class,
        $multiple,
        $required,
        $disabled,
        $data,
        $grid,
        $hide_label,
        $remove_multiple
    );


}


function generate_radio_btns($input_type="radio",$field_name,$label_name,$text,$values,$selected_value="",$class="",$data = "",$grid = "col-md-12",$hide_label=false,$additional_data="",$custom_style="",$item_grid="",$multiple=""){

    return \App\btm_form_helpers\form::generate_radio_btns(
        $input_type,
        $field_name,
        $label_name,
        $text,
        $values,
        $selected_value,
        $class,
        $data ,
        $grid ,
        $hide_label,
        $additional_data,
        $custom_style,
        $item_grid,
        $multiple
    );


}



/**
 * generate_depended_selects
 *
 * @return string 2 select elements ,on change of first element
 * second elment change relativley
 *
 * @param string $field_name_1
 * @param string $field_label_1
 * @param string_array $field_text_1 array of first select options text
 * @param string_array $field_values_1 array of first select options values
 * @param string $field_required_1 this field is required or not
 * @param string $field_class_1 elemet classes pls do not forget form-control
 *
 * @param string $field_name_2
 * @param string $field_label_2
 * @param string_array $field_text_2 array of second select options text
 * @param string_array $field_values_2 array of second select options values
 * @param string_array $field_2_depend_values depended values that select2 will change by select 1 values
 * @param string $field_required_2 this field is required or not
 * @param string $field_class_2 elemet classes pls do not forget form-control
 * @param string $field_data_name1 ex:data-fieldname
 * @param string_Array $field_data_values1 data_values_of_first_select
 * @param string $field_data_name2 ex:data-fieldname
 * @param string_Array $field_data_values2 data_values_of_sec_select
 */

function generate_depended_selects(

    $field_name_1,$field_label_1,$field_text_1,$field_values_1,$field_selected_value_1
    ,$field_required_1="",$field_class_1="",
    $field_name_2,$field_label_2,$field_text_2,$field_values_2,$field_selected_value_2,
    $field_2_depend_values,$field_required_2="",$field_class_2="",
    $field_data_name1 = "",$field_data_values1="",
    $field_data_name2 = "",$field_data_values2="",
    $data_obj=""

)
{
    return \App\btm_form_helpers\form::generate_depended_selects(
        $field_name_1, $field_label_1, $field_text_1, $field_values_1, $field_selected_value_1,
        $field_required_1 , $field_class_1 ,
        $field_name_2, $field_label_2, $field_text_2, $field_values_2, $field_selected_value_2,
        $field_2_depend_values, $field_required_2 , $field_class_2 ,
        $field_data_name1 , $field_data_values1 ,
        $field_data_name2 , $field_data_values2 ,
        $data_obj
    );
}

function generate_depended_selects_old(
    $field_name_1,$field_label_1,$field_text_1,$field_values_1,$field_selected_value_1
    ,$field_required_1="",$field_class_1="",
    $field_name_2,$field_label_2,$field_text_2,$field_values_2,$field_selected_value_2,
    $field_2_depend_values,$field_required_2="",$field_class_2="",
    $field_data_name1 = "",$field_data_values1="",
    $field_data_name2 = "",$field_data_values2="",
    $data_obj=""

){

    if(is_object($data_obj)&&isset($data_obj->{$field_name_1})){
        $field_selected_value_1=$data_obj->{$field_name_1};
    }

    if(is_object($data_obj)&&isset($data_obj->{$field_name_2})){
        $field_selected_value_2=$data_obj->{$field_name_2};
    }


    $field_id_1=$field_name_1."_id";
    $field_id_2=$field_name_2."_id";

    $field_div_container_2=$field_name_2."_div_container";

    $html_tags="";

    $html_tags.='<script type="text/javascript">'.PHP_EOL;
    $html_tags.='$(function(){'.PHP_EOL;
    $html_tags.='$("#'.$field_id_1.'").change(function(){'.PHP_EOL;
    $html_tags.='var select_1_value=$(this).val();'.PHP_EOL;
    $html_tags.='console.log(select_1_value);'.PHP_EOL;
    $html_tags.='$("#'.$field_id_2.' option").hide();'.PHP_EOL;
    $html_tags.='$(".'.$field_div_container_2.'").show();'.PHP_EOL;
    $html_tags.='var childs=$("#'.$field_id_2.' option[data-targetid=\'"+select_1_value+"\']");'.PHP_EOL;
    $html_tags.='$.each(childs,function(index,value){'.PHP_EOL;
    $html_tags.='$(this).show();'.PHP_EOL;
    $html_tags.='if (index==0) {'.PHP_EOL;
    $html_tags.='$(this).attr("selected","selected")'.PHP_EOL;
    $html_tags.='}'.PHP_EOL;
    $html_tags.='});'.PHP_EOL;
    $html_tags.='});'.PHP_EOL;
    $html_tags.='});'.PHP_EOL;
    $html_tags.='</script>'.PHP_EOL;


    $html_tags.='<div class="col-md-12 form-group">';
    $html_tags.='<div class="row">';
    //first select
    $html_tags.='<div class="col-md-6">';
    $html_tags.='<label style="width: 100%;">'.$field_label_1.'</label>';
    $html_tags.='<select id="'.$field_id_1.'" name="'.$field_name_1.'" class="'.$field_class_1.'" '.$field_required_1.'>';
    $html_tags.='<option value=""></option>';

    foreach ($field_values_1 as $key => $value) {
        $selected_value_1="";
        if ($value==$field_selected_value_1) {
            $selected_value_1="selected";
        }

        $additional_attr="";
        if (isset($field_data_values1[$key])) {
            $additional_attr="data-$field_data_name1='".$field_data_values1[$key]."'";
        }

        $html_tags.='<option '.$additional_attr.' value="'.$field_values_1[$key].'" '.$selected_value_1.' >'.$field_text_1[$key].'</option>';
    }

    $html_tags.='</select>';
    $html_tags.='</div>';

    //second select
    $display_none_select_2="";


    if ($field_selected_value_2=="") {
        $display_none_select_2="display:none;";
    }
    $html_tags.='<div class="col-md-6 '.$field_div_container_2.'" style="'.$display_none_select_2.'" >';
    $html_tags.='<label style="width: 100%;">'.$field_label_2.'</label>';
    $html_tags.='<select id="'.$field_id_2.'" name="'.$field_name_2.'" class="'.$field_class_2.'" '.$field_required_2.'>';

    $html_tags.='<option value="" data-targetid="0" >'."".'</option>';

    foreach ($field_values_2 as $key => $value) {
        $selected_option="";
        $hide_option="style='display:none;'";
        if ($field_2_depend_values[$key]==$field_selected_value_1) {
            $hide_option="";
        }
        if ($value==$field_selected_value_2) {
            $selected_option="selected";
        }

        $additional_attr_sec="";
        if (isset($field_data_values2[$key])) {
            $additional_attr_sec="data-$field_data_name2='".$field_data_values2[$key]."'";
        }

        $html_tags.='<option '.$additional_attr_sec.' value="'.$field_values_2[$key].'" data-targetid="'.$field_2_depend_values[$key].'" '.$selected_option.' '.$hide_option.' >'.$field_text_2[$key].'</option>';
    }

    $html_tags.='</select>';
    $html_tags.='</div>';

    $html_tags.='</div>';
    $html_tags.='</div>';


    return $html_tags;
}

// generate div of text depend on first select
function generate_depended_selects_and_text(
    $field_name_1,$field_label_1,$field_text_1,$field_values_1,$field_selected_value_1
    ,$field_required_1="",$field_class_1="",
    $field_name_2,$field_label_2,$field_text_2,$field_values_2,$field_selected_value_2,
    $field_2_depend_values,$field_required_2="",$field_class_2=""
){

    $field_id_1=$field_name_1."_id";
    $field_id_2=$field_name_2."_id";

    $field_div_container_2=$field_name_2."_div_container";

    $html_tags="";

    $html_tags.='<script type="text/javascript">'.PHP_EOL;
    $html_tags.='$(function(){'.PHP_EOL;
    $html_tags.='$("#'.$field_id_1.'").change(function(){'.PHP_EOL;
    $html_tags.='var select_1_value=$(this).val();'.PHP_EOL;
    $html_tags.='console.log(select_1_value);'.PHP_EOL;
    $html_tags.='$("#'.$field_id_2.' li").hide();'.PHP_EOL;
    $html_tags.='$(".'.$field_div_container_2.'").show();'.PHP_EOL;
    $html_tags.='var childs=$("#'.$field_id_2.' li[data-targetid=\'"+select_1_value+"\']");'.PHP_EOL;
    $html_tags.='$.each(childs,function(index,value){'.PHP_EOL;
    $html_tags.='$(this).show();'.PHP_EOL;
    $html_tags.='if (index==0) {'.PHP_EOL;
    $html_tags.='$(this).attr("selected","selected")'.PHP_EOL;
    $html_tags.='}'.PHP_EOL;
    $html_tags.='});'.PHP_EOL;
    $html_tags.='});'.PHP_EOL;
    $html_tags.='});'.PHP_EOL;
    $html_tags.='</script>'.PHP_EOL;


    $html_tags.='<div class="col-md-12 form-group">';
    $html_tags.='<div class="row">';
    //first select
    $html_tags.='<div class="col-md-6 col-md-offset-3">';
    $html_tags.='<label>'.$field_label_1.'</label>';
    $html_tags.='<select id="'.$field_id_1.'" name="'.$field_name_1.'" class="'.$field_class_1.'" '.$field_required_1.'>';
    $html_tags.='<option value=""></option>';

    foreach ($field_values_1 as $key => $value) {
        $selected_value_1="";
        if ($value==$field_selected_value_1) {
            $selected_value_1="selected";
        }
        $html_tags.='<option value="'.$field_values_1[$key].'" '.$selected_value_1.' >'.$field_text_1[$key].'</option>';
    }

    $html_tags.='</select>';
    $html_tags.='</div>';

    //second select
    $display_none_select_2="";


    if ($field_selected_value_2=="") {
        $display_none_select_2="display:none;";
    }
    $html_tags.='<div class="col-md-12 '.$field_div_container_2.'" style="'.$display_none_select_2.'" >';
    $html_tags.='<label>'.$field_label_2.'</label>';
    $html_tags.='<ul id="'.$field_id_2.'" name="'.$field_name_2.'" class="'.$field_class_2.'" '.$field_required_2.'>';

    foreach ($field_values_2 as $key => $value) {
        $selected_option="";
        $hide_option="style='display:none;'";
        if ($field_2_depend_values[$key]==$field_selected_value_1) {
            $hide_option="";
        }
        if ($value==$field_selected_value_2) {
            $selected_option="selected";
        }
        $html_tags.='<li value="'.$field_values_2[$key].'" data-targetid="'.$field_2_depend_values[$key].'" '.$selected_option.' '.$hide_option.' >'.$field_text_2[$key].'</li>';
    }

    $html_tags.='</ul>';
    $html_tags.='</div>';

    $html_tags.='</div>';
    $html_tags.='</div>';


    return $html_tags;
}


function generate_multi_accepters($accepturl="",$item_obj,$item_primary_col,$accept_or_refuse_col,$model,$accepters_data=["0"=>"Refused","1"=>"Accepted"],$display_block=false){

    return \App\btm_form_helpers\form::generate_multi_accepters(
        $accepturl,
        $item_obj,
        $item_primary_col,
        $accept_or_refuse_col,
        $model,
        $accepters_data,
        $display_block
    );

}

function generate_self_edit_input($url="",$item_obj,$item_primary_col,$item_edit_col,$modal_path="",$input_type="text",$label="Click To Edit"){
    return \App\btm_form_helpers\form::generate_self_edit_input(
        $url,
        $item_obj,
        $item_primary_col,
        $item_edit_col,
        $modal_path,
        $input_type,
        $label
    );
}

function attrs_divider($attrs,$attrs_length=7,$dividers_arries){

    $new_attrs=[];

    foreach($dividers_arries as $divider_arr){
        $new_attrs_item=[];
        foreach($divider_arr as $field_key=>$field){
            for($i=0;$i<$attrs_length;$i++){
                if(!isset($new_attrs_item[$i])){
                    $new_attrs_item[$i]=[];
                }

                $new_attrs_item[$i][$field]=$attrs[$i][$field];

            }
        }
        $new_attrs[]=$new_attrs_item;
    }

    return $new_attrs;
}
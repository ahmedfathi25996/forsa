$(function(){

    //generate_slider_tags slider

    $(".generate_slider_tags .add_img_btn_class").click(function(){
        var parent_element=$(this).parents(".generate_slider_tags");
        var new_item=$(".item",parent_element).first().val("").clone();

        new_item.find('.file_upload_input').val('');
        var get_label_name = new_item.find('.input_file_name').attr('data-label');
        new_item.find('.input_file_name').html(get_label_name);

        $(".cke",new_item).remove();
        $(".slider_imgs_class",parent_element).append(new_item);

        $("textarea",new_item).each(function(){
            var text_area=$(this);

            if(text_area.attr("class").includes("body")){
                text_area.ckeditor();
            }
        });

        return false;
    });

    $(".generate_slider_tags .slider_img_remover").click(function(){
        var parent_element=$(this).parents(".generate_slider_tags");

        $(this).parents(".old_item").remove();

        var removed_id=$(this).data("photoid");
        var ids=JSON.parse($(".json_values_of_slider_class",parent_element).val());

        $.each(ids,function(index,value){
            if (removed_id==value) {
                ids.splice(index,1);
            }
        });
        $(".json_values_of_slider_class",parent_element).val(JSON.stringify(ids));

        return false;
    });

    $(".generate_slider_tags .open_edit_modal").click(function(){
        var parent_element=$(this).parents(".generate_slider_tags");

        $(".edit_img_modal",parent_element).modal("show");
        $(".edit_img_id",parent_element).val($(this).data("img_id"));
        $(".upload_new_item_msg",parent_element).html("");

        return false;
    });

    $("body").on('click','.edit_img_at_slider_btn',function () {

        var this_element=$(this);
        var parent_element=this_element.parents(".generate_slider_tags");

        this_element.attr("disabled","disabled");

        var img_id=$(".edit_img_id",parent_element).val();

        var obj=new FormData();
        obj.append("_token",_token);
        obj.append("new_file",$(".edit_file_at_slider",parent_element)[0].files[0]);
        obj.append("img_id",img_id);

        $.ajax({
            url:base_url2+"/edit_slider_item",
            type:"POST",
            processData: false,
            contentType: false,
            data:obj,
            success:function(data){
                var ajax_data=JSON.parse(data);
                this_element.removeAttr("disabled");

                $(".upload_new_item_msg",parent_element).html(ajax_data.msg);

                if($(".slider_item_when_edited_"+img_id).data("item_type")=="link"){
                    $(".slider_item_when_edited_"+img_id).attr("href",ajax_data.file_path);
                }
                else{
                    $(".slider_item_when_edited_"+img_id).attr("src",ajax_data.file_path);
                }
            }
        });


        return false;

    });


    //end generate_slider_tags



    //generate_array_input
    $(".array_input_remove_item").click(function(){
        $(this).parent().remove();
        return false;
    });

    var text_area_counter=0;
    $(".array_input_add_item").click(function(){
        $(this).parent().remove();
        return false;
    });

    //end generate_array_input


    // Start General Self Edit Item

    // Show input text field
    $('body').on("click",".general_self_edit",function () {

        var this_element = $(this);
        var old_value = this_element.attr("data-field_value");
        var table = this_element.attr("data-tablename");
        var field = this_element.attr("data-field_name");
        var row = this_element.attr("data-row_id");
        var url = this_element.attr("data-url");
        var input_type = this_element.attr("data-input_type");
        var row_primary_col = this_element.attr("data-row_primary_col");

        var additional_params = "";

        if (input_type == "number")
        {
            additional_params = ' min="0" ';
        }

        if (input_type == "textarea")
        {
            this_element.parent().html('<textarea '+additional_params+' data-input_type="'+input_type+'" data-url="'+url+'" class="form-control self_edit_action" data-old_value="'+old_value+'" data-row_primary_col="'+row_primary_col+'" data-row_id="'+row+'" data-tablename="'+table+'" data-field_name="'+field+'" title="Press Enter To Save" >'+old_value+'</textarea>')
        }
        else{
            this_element.parent().html('<input type="'+input_type+'" '+additional_params+'  data-input_type="'+input_type+'" value="'+old_value+'"  data-url="'+url+'" class="form-control self_edit_action" data-old_value="'+old_value+'" data-row_primary_col="'+row_primary_col+'" data-row_id="'+row+'" data-tablename="'+table+'" data-field_name="'+field+'" title="Press Enter To Save" />')
        }



    });

    // apply action on enter
    // $(".self_edit_action").keyup(function(event){
    $('body').on("keyup",".self_edit_action",function (event) {

        var this_element = $(this);
        var old_value = this_element.attr("data-old_value");
        var new_value = this_element.val();
        var table = this_element.attr("data-tablename");
        var field = this_element.attr("data-field_name");
        var row = this_element.attr("data-row_id");
        var url = this_element.attr("data-url");
        var input_type = this_element.attr("data-input_type");
        var row_primary_col = this_element.attr("data-row_primary_col");

        var object = {};
        object._token = _token;
        object.item_id = row;
        object.table_name = table;
        object.field_name = field;
        object.value = new_value;
        object.input_type = input_type;
        object.row_primary_col = row_primary_col;

        if (event.which==13) {


            this_element.attr("disabled","disabled");

            $.ajax({
                url: url,
                type: 'POST',
                data: object,
                success: function (data) {
                    var returned_data = JSON.parse(data);
                    this_element.removeAttr("disabled");
                    if (typeof (returned_data.msg)!= "undefined") {
                        this_element.parent().html(returned_data.msg);
                    }

                }
            });




        }
    });

    // End General Self Edit Item




    //new accept item
    $('body').on("click", ".new_general_accept_item", function () {
        var confirm_res = confirm("هل أنت متأكد ؟");
        if (confirm_res == true) {

            var this_element = $(this);
            var object = {};

            var item_id = this_element.data("itemid");
            var accept_url = this_element.data("accepturl");
            var table_name = this_element.data("tablename");
            var field_name = this_element.data("fieldname");
            var accept = this_element.attr("data-accept");
            var acceptersdata = this_element.attr("data-acceptersdata");
            var item_primary_col = this_element.attr("data-item_primary_col");
            var display_block = this_element.attr("data-display_block");

            object._token = _token;
            object.item_id = item_id;
            object.accept_url = accept_url;
            object.table_name = table_name;
            object.field_name = field_name;
            object.accept = accept;
            object.acceptersdata = acceptersdata;
            object.item_primary_col = item_primary_col;
            object.accept_url = accept_url;
            object.display_block = display_block;

            //show load img
            // this_element.append("<img src='" + base_url + "img/ajax-loader.gif' class='ajax_loader_class' width='20'>");

            $.ajax({
                url: accept_url,
                type: 'POST',
                data: object,
                success: function (data) {
                    var returned_data = JSON.parse(data);

                    if (typeof (returned_data.msg)!= "undefined") {
                        $('.ajax_loader_class',this_element).remove();
                        this_element.parents(".parent_accepters_div").html(returned_data.msg);
                    }

                }
            });

        }//end confirmation if

        return false;
    });


    $('body').on('click','.calendar_icon',function () {

        var this_element = $(this);

        this_element.parents('.input-group').find('input').focus();

        return false;
    });


    if ($('.fire_datetimepicker').length){
        $('.fire_datetimepicker').datetimepicker({
            autoclose: true,
            todayBtn: true,
        });
    }

    if ($('.fire_datepicker').length){
        $('.fire_datepicker').datepicker({
            showOtherMonths: true,
            selectOtherMonths: true,
            dateFormat: "yy-mm-dd"
        });
    }


    if ($('.fire_timepicker').length){
        $('.fire_timepicker').timepicker({
            dateFormat: "H:i"
        });
    }

    //generate_img_tags_for_form
    $('body').on("change", ".checkbox_field_image", function () {

        var check=$(this).is(":checked");
        var parent_element = $(this).parents(".parent_file_upload_input");
        if (check==true) {
            $(".file_upload_input",parent_element).removeAttr("disabled")
        }
        else {
            $(".file_upload_input",parent_element).attr("disabled","disabled")
        }

    });

    if($('.parent_depended_selects').length)
    {
        setTimeout(function () {
            $('.parent_depended_selects').change();
            if($('.child_depended_selects option[selected]').length)
            {
                var current_child_selected = $('.child_depended_selects option[selected]').val();
                $('.child_depended_selects').val(current_child_selected);
            }
        },500);
    }

    //generate_depended_selects
    $('body').on("change", ".parent_depended_selects", function () {
        var select_1_value=$(this).val();
        var parent_element = $(this).parents(".the_big_parent_for_depended_selects");

        $(".child_depended_selects option",parent_element).hide();
        $(".div_child_depended_selects",parent_element).show();

        var childs=$(".child_depended_selects option[data-targetid='"+select_1_value+"']",parent_element);

        if(childs.length == 0)
        {
            $('.child_depended_selects').val("");
        }

        $.each(childs,function(index,value){
            $(this).show();
            if (index==0) {
                $(this).prop("selected","selected");
            }
        });

        if(select_1_value == "" || select_1_value == 0  || select_1_value == "0")
        {

            childs =$(".child_depended_selects option",parent_element);
            $.each(childs,function(index,value){
                if (index == 0) {
                    $(this).show();
                    $(this).prop("selected","selected");
                }
                else{
                    $(this).removeProp("selected");
                    $(this).hide();
                }
            });
        }

        setTimeout(function () {
            $('.child_depended_selects').change();
        },500);

    });


    //generate array input

    $(".remove_item_class").click(function(){
        $(this).parents(".old_item").remove();
        return false;
    });

    $(".add_item_class").click(function(){

        var parent_element=$(this).parents(".contain_arr_input");
        var new_html=$(".first_item_class").first().clone();


        $(".contain_items_class",parent_element).append(new_html);

        $.each($("textarea",new_html),function(){
            if($(this).hasClass("ckeditor")){
                $(this).ckeditor();
            }
        });

        return false;
    });

});
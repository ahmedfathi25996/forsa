$(function () {


    // function to remove all data- attributes from element
    function resetAttributes(element) {
        element.each(function() {
            var attributes = this.attributes;
            var i = attributes.length;
            while( i-- ){
                this.removeAttributeNode(attributes[i]);
            }
        })
    }

    /**
     * Start general remove item
     */

    $('body').on("click", ".confirm_remove_item", function () {

        var this_element    = $(this);
        var submit_btn      = $('#confirmModal').find('.submit_btn');

        // initialize button to remove
        resetAttributes(submit_btn);
        submit_btn.attr('class','btn btn-primary submit_btn general_remove_item');
        $('#errorsModal').find('.display_errors_msg').html("");

        // remove old actions
        submit_btn.removeAttr("disabled");

        var item_id         = this_element.attr("data-itemid");
        var delete_url      = this_element.attr("data-deleteurl");
        var table_name      = this_element.attr("data-tablename");
        var tr_id           = this_element.attr("data-trid");

        // set new or update exist attributes
        submit_btn.attr('data-itemid',item_id);
        submit_btn.attr('data-deleteurl',delete_url);
        submit_btn.attr('data-tablename',table_name);
        submit_btn.attr('data-tr_id',tr_id);

    });


    $('body').on("click", ".general_remove_item", function (e) {

        var item_id         = $(this).attr("data-itemid");
        var delete_url      = $(this).attr("data-deleteurl");
        var table_name      = $(this).attr("data-tablename");
        var tr_id           = $(this).attr("data-trid");
        var this_element    = $(this);

        if (typeof(tr_id) == "undefined") {
            tr_id = "row";
        }

        this_element.attr("disabled","disabled");

        $.ajax({
            url : delete_url,
            type: 'POST',
            data: {'_token': _token, 'item_id': item_id, 'table_name': table_name},
            success: function (data) {

                var returned_data = JSON.parse(data);

                $('#confirmModal').find('.submit_btn').removeClass('general_remove_item');
                $('#confirmModal').modal('hide');

                if (returned_data.deleted == "yes") {

                    $('#'+ tr_id + item_id).fadeOut(400);
                    $('#thanksModal').modal('show');

                }else{
                    $('#errorsModal').modal('show');
                    $('#errorsModal').find('.display_errors_msg').html(returned_data.deleted);
                }

                if(typeof (returned_data.msg) != "undefined"){
                    $('#errorsModal').modal('show');
                    $('#errorsModal').find('.display_errors_msg').html(returned_data.msg);
                }

            }
        });

        return false;
    });


    /**
     * End general remove item
     */


    /**
     * Start Re-Order Items
     */

    call_order = function(){

        if ($(".reorder_items").length) {

            $("#sortable").sortable({
                placeholder: "ui-state-highlight",
                start: function(e, ui){
                    ui.placeholder.height(ui.item.height()-10);
                    ui.placeholder.width(ui.item.width()-10);
                }
            });
            $("#sortable").disableSelection();

            $(".reorder_items").click(function () {
                var items       = [];
                var table_name  = "";
                var field_name  = "";

                $.each($("#sortable").children(), function (index, value) {
                    var item_id     = $(this).data("itemid");

                    if(typeof item_id != "undefined")
                    {
                        table_name      = $(this).data("tablename");
                        field_name      = $(this).data("fieldname");

                        var item_order  = index;
                        items.push([item_id, item_order]);
                    }

                });

                if (typeof(field_name) == "undefined") {
                    field_name      = "order";
                }

                var this_element    = $(this);
                this_element.attr("disabled","disabled");

                $.ajax({
                    url: base_url2 + '/reorder_items',
                    type: 'POST',
                    data: {'_token':_token, 'items': items, 'table_name': table_name , 'field_name':field_name},
                    success: function (data) {

                        this_element.removeAttr("disabled");
                        $(".ajax_loader_class").hide();

                        var json_data = JSON.parse(data);

                        if (typeof (json_data) != "undefined") {
                            if (typeof (json_data.success) != "undefined") {
                                window.location.reload();
                            }

                            if (typeof (json_data.error) != "undefined") {
                                this_element.html(json_data.error);
                            }
                        }
                    }
                });

                return false;
            });
        }

    };

    call_order();

    /**
     * End Re-Order Items
     */




    /**
     * Start Not Used Functions
     */

    $("body").on("click",".show_general_data",function(){
        var data=$(this).data("alldata");

        console.log(data);

        var html_tags="";

        $.each(data,function(index,value){
            if(typeof (value)=="object"){
                var object_val="";
                $.each(value,function(i,v){
                    object_val=object_val+i+" : "+v+" <br>";
                });
                value=object_val;
            }

            html_tags+='<div class="col-md-12">';
                html_tags+='<div class="col-md-4">';
                    html_tags+='<p style="text-transform: capitalize;">'+index.replace("_"," ")+':</p>';
                html_tags+='</div>';
                html_tags+='<div class="col-md-8">';
                    html_tags+='<p>'+value+'</p>';
                html_tags+='</div>';
            html_tags+='</div><hr>';

        });

        $("#general_show_all_data_modal .modal-body").html(html_tags);
        $("#general_show_all_data_modal").modal("show");

        return false;
    });

    $(".general_check_validation").click(function(){
        var this_element=$(this);
        var link=$(this).data("link");
        var form_id=$(this).data("formid");

        this_element.append("<img src='" + base_url + "img/ajax-loader.gif' class='ajax_loader_class' width='20'>");
        this_element.attr("disabled","disabled");


        var formElement = document.querySelector("#"+form_id);
        var request = new XMLHttpRequest();

        request.onreadystatechange=function(){
            if (request.readyState==4) {

                var data=JSON.parse(request.responseText);
                if (typeof (data)!="undefined") {
                    $('.ajax_loader_class').remove();

                    var show_msg = "<div class='alert alert-danger'>";
                    if(data.msg_type == "success")
                    {
                        show_msg = "<div class='alert alert-success'>";
                    }
                    if(data.msg.length == 0)
                    {
                        show_msg += "البيانات صحيحة يمكنك الحفظ الأن ...";
                    }
                    $.each(data.msg,function (i,v) {

                        show_msg += v + "<br>";

                    });
                    show_msg +="</div>";
                    $(".general_check_validation_msg").html(show_msg);
                    this_element.removeAttr("disabled");
                }
            }
        };

        request.open("POST", link);
        request.send(new FormData(formElement));


        return false;
    });


    /**
     * End Not Used Functions
     */


});
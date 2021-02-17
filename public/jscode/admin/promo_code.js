$(function(){


    $("#usage_type_id").change(function(){


        $(".limited_number_div_class").hide();
        $(".limited_number_div_class input").removeAttr("required");


        if($(this).val()=="limited_number"){
            $(".limited_number_div_class").show();
            $(".limited_number_div_class input").attr("required","required");
        }

    });

    $("#usage_type_id").change();


});

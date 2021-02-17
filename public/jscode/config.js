var base_url2;
var base_url;
var _token;
var ajax_loader_img_func;
var lang_url_class;
var call_datatable;
var call_order;
var show_flash_message;

$(function(){

    /**
     * Start initialize global variables
     */

        base_url2               = $(".url_class").val();
        base_url                = base_url2 + "/public/";
        _token                  = $(".csrf_input_class").val();
        lang_url_class          = $(".lang_url_class").val()+"/";
        ajax_loader_img_func    = function(img_width){
            return "<img src='" + base_url + "img/ajax-loader.gif' class='ajax_loader_class' style='width:"+img_width+";height:"+img_width+";'>";
        };

    /**
     * End initialize global variables
     */

    /*******************************************************************/

    /**
     * Start toastr message config
     */

    show_flash_message = function (type,get_flash_message){

        var pure_msg = '<p style="font-size: 20px;color: #FFF;">' + get_flash_message + '</p>';

        toastr.options = {
            "closeButton": 1,
            "debug": !1,
            "newestOnTop": !0,
            "progressBar": 1,
            "positionClass": "toast-top-full-width",
            "preventDuplicates": !1,
            "onclick": null,
            "showDuration": "0",
            "hideDuration": "0",
            "timeOut": "10000",
            "extendedTimeOut": "10000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        toastr[type](pure_msg, '', toastr.options);

    };

    if ($('.get_flash_message').length > 0) {
        var get_flash_message = $('.get_flash_message').val();

        if(get_flash_message.length>0){
            var str = $('.get_flash_message').val();
            var type = 'success';
            var pure_msg = '<p style="font-size: 20px;color: #fff;">' + $(str).html() + '</p>';
            if (str.indexOf('alert-danger') > -1) {
                type = 'warning'
            } else if (str.indexOf('alert-warning') > -1) {
                type = 'warning'
            } else if (str.indexOf('alert-info') > -1) {
                type = 'info'
            }

            show_flash_message(type,pure_msg);
        }

    }

    /**
     * End toastr message config
     */

    /*******************************************************************/


});
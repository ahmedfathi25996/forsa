$(function () {


    /**
     * Start check for updates
     */


    if($('#update_notification').length)
    {

        $.ajax({
            type: 'GET',
            url: base_url2 + '/updater.check',
            async: false,
            success: function(response) {
                if(typeof response != "undefined" && response != ''){
                    $('.update_version_info').html("V."+response);
                    $('#update_notification').show();
                }
            }
        });

        $('body').on('click','.update_version_now',function () {

            var this_element = $(this);
            $('#confirmUpdateVersionModal').modal('show');

            return false;
        });


        function updateVersion() {
            $.ajax({
                type: 'GET',
                url: base_url2 + '/updater.update',
                success: function(response) {
                    $(".update_version_now").removeAttr('disabled');

                    if(response != ''){
                        $('#confirmUpdateVersionModal').find('.content_body').html(response);
                        $('#confirmUpdateVersionModal').find('.modal-footer').remove();
                    }
                },
                error: function(response) {

                    if(response != ''){
                        $('#confirmUpdateVersionModal').find('.content_body').html(response);
                    }
                }
            });
        }

        $('body').on('click','.confirm_update',function () {

            var this_element = $(this);
            this_element.attr('disabled','disabled');

            updateVersion();

            return false;

        });

    }


    /**
     * End check for updates
     */


    /**
     * Start set nav item to active (sidebar)
     */

    var link_active = false;

    $.each($(".sidebar-nav-item a"),function(i,v){

        if($(this).attr("href") == location.href){

            $(this).parents(".sidebar-nav-item").find('.sidebar-nav-link').addClass("active");
            $(this).addClass("active");

            link_active = true;
            return false;
        }
        else{
            $(this).parents(".sidebar-nav-item").find('.sidebar-nav-link').removeClass("active");
            $(this).removeClass("active");
        }

    });

    if(link_active == false){
        $.each($(".sidebar-nav-item a"),function(i,v){

            var current_location    = location.href;
            current_location        = current_location.split("/");

            if(current_location.length == 0)return;
            delete current_location[current_location.length-1];
            current_location = current_location.join("/");
            current_location = current_location.substring(0, current_location.length-1);

            if(current_location == $(this).attr("href")){

                $(this).parents(".sidebar-nav-item").find('.sidebar-nav-link').addClass("active");
                $(this).addClass("active");

                link_active = true;
                return false;
            }
            else{
                $(this).parents(".sidebar-nav-item").find('.sidebar-nav-link').removeClass("active");
                $(this).removeClass("active");
            }
        });
    }

    if(link_active == false){
        var current_location = location.protocol + '//' + location.host + location.pathname;

        $.each($(".sidebar-nav-item a"),function(i,v){

            if($(this).attr("href") == current_location){

                $(this).parents(".sidebar-nav-item").find('.sidebar-nav-link').addClass("active");
                $(this).addClass("active");

                link_active = true;
                return false;
            }
            else{
                $(this).parents(".sidebar-nav-item").find('.sidebar-nav-link').removeClass("active");
                $(this).removeClass("active");
            }

        });
    }


    /**
     * End set nav item to active
     */


    /**
     * Start set nav item to active (wide)
     */

    var wide_link_active = false;

    $.each($(".nav-item a"),function(i,v){

        if($(this).attr("href") == location.href){

            $(this).parents(".nav-item").addClass("active");

            wide_link_active = true;
            return false;
        }
        else{
            $(this).parents(".nav-item").removeClass("active");
        }

    });

    if(wide_link_active == false){
        $.each($(".nav-item a"),function(i,v){

            var current_location    = location.href;
            current_location        = current_location.split("/");

            if(current_location.length == 0)return;
            delete current_location[current_location.length-1];
            current_location = current_location.join("/");
            current_location = current_location.substring(0, current_location.length-1);

            if(current_location == $(this).attr("href")){

                $(this).parents(".nav-item").addClass("active");

                wide_link_active = true;
                return false;
            }
            else{
                $(this).parents(".nav-item").removeClass("active");
            }
        });
    }

    if(wide_link_active == false){
        var current_location = location.protocol + '//' + location.host + location.pathname;

        $.each($(".nav-item a"),function(i,v){

            if($(this).attr("href") == current_location){

                $(this).parents(".nav-item").addClass("active");

                wide_link_active = true;
                return false;
            }
            else{
                $(this).parents(".nav-item").removeClass("active");
            }

        });
    }


    /**
     * End set nav item to active
     */


    /**
     * Start NavIcon toggle
     */

    $('#managerNavicon').on('click', function(e) {
        e.preventDefault();

        $('.manager-left').toggleClass('d-block');
        $('.manager-right').toggleClass('d-none');
    });

    /**
     * End NavIcon toggle
     */


    /**
     * Start datatable settings
     */

    if($('#datatable1').length)
    {
        $('#datatable1').DataTable({
            responsive: true,
            "aaSorting": [],
            language: {
                searchPlaceholder: 'إبحث هنا',
                sSearch: '',
                lengthMenu: '_MENU_ صف/صفحة',
            }
        });
    }

    if($('#datatable2').length)
    {
        $('#datatable2').DataTable({
            bLengthChange: false,
            searching: false,
            bPaginate: false,
            bInfo: false,
            responsive: true,
            "aaSorting": []
        });
    }

    /**
     * End datatable settings
     */


    /**
     * Start upload_new_file when save item
     */


    $('body').on('click','.upload_new_file',function () {

        var this_element = $(this);
        this_element.parents('.parent_file_upload_input').find('.checkbox_field_image').click();
        this_element.parents('.parent_file_upload_input').find('.file_upload_input').removeAttr("disabled");
        this_element.parents('.parent_file_upload_input').find('.file_upload_input').click();

        return false;
    });

    $('body').on('change','.file_upload_input',function (e) {

        var this_element = $(this);
        var fileName = "";

        if (typeof e.target.files[0] != "undefined")
        {
            fileName = e.target.files[0].name;
        }

        this_element.parent().find('.input_file_name').text(fileName);

        return false;
    });

    /**
     * End upload_new_file when save item
     */


    /**
     * Start form wizard config
     */

    if ($('#wizard3').length)
    {

        $('#wizard3').steps({
            enableAllSteps          : true,
            enableFinishButton      : false,
            transitionEffect        : 1,
            stepsOrientation        : 1, // 0 => horizontal , 1 => vertical
            headerTag               : 'h3',
            bodyTag                 : 'section',
            autoFocus               : true,
            titleTemplate           : '<span class="number">#index#</span> <span class="title">#title#</span>',
            cssClass                : 'wizard wizard-style-2'
        });

    }

    if ($('#wizard6').length)
    {

        $('#wizard6').steps({
            enableAllSteps          : true,
            enableFinishButton      : false,
            transitionEffect        : 1,
            stepsOrientation        : 0, // 0 => horizontal , 1 => vertical
            headerTag               : 'h3',
            bodyTag                 : 'section',
            autoFocus               : true,
            titleTemplate           : '<span class="number">#index#</span> <span class="title">#title#</span>',
            cssClass                : 'wizard wizard-style-2'
        });

    }

    /**
     * End form wizard config
     */



    /**
     * Start select2 settings
     */


    if($('.select2').length)
    {
        $('.select2').select2({
            dropdownCssClass: 'hover-primary',
            minimumResultsForSearch: Infinity // disabling search
        });
    }


    if($('.select_2_class').length)
    {
        $('.select_2_class').select2({ minimumResultsForSearch: Infinity });
    }

    if($('.select_2_primary').length)
    {
        $('.select_2_primary').select2({
            containerCssClass: 'select2-full-color select2-primary',
            minimumResultsForSearch: Infinity // disabling search
        });
    }

    if($('.select2_search').length)
    {
        $('.select2_search').select2({
            containerCssClass: 'select2-full-color select2-primary',
            minimumResultsForSearch: ''
        });
    }

    if($('.select2_search_phones').length)
    {

        function formatSelect2Image(state) {

            if (!state.id) {
                return state.text;
            }

            var originalOption = state.element;
            return $('<span> ' + state.text + ' &nbsp; <img src="' + $(originalOption).data('image_url') + '" class="img-flag" /> &nbsp;  (' + state.id + ') </span>');
        }

        function formatSelected2Image(state) {

            if (!state.id) {
                return state.text;
            }

            var originalOption = state.element;
            $('.phone_placeholder').attr('placeholder',$(originalOption).data('placeholder'));
            return $('<span> ' + state.text + ' &nbsp; <img src="' + $(originalOption).data('image_url') + '" class="img-flag" /> &nbsp;  (' + state.id + ') </span>');
        }

        $('.select2_search_phones').select2({
            containerCssClass: 'select2-full-color select2-primary',
            minimumResultsForSearch: '',
            width: 'resolve',
            //language: "ar",
            templateResult: formatSelect2Image,
            templateSelection: formatSelected2Image,
        });
    }

    /**
     * End select2 settings
     */



    /**
     * Start summernote settings
     */

    if($('.summernote').length)
    {
        $('.summernote').summernote({
            height  : 200,
            tooltip : false,
            focus   : false

        })
    }

    /**
     * End select2 settings
     */



    /**
     * Start contactNavicon settings
     */

    $('#contactNavicon').on('click', function(e) {
        e.preventDefault();

        $('.contact-left').toggleClass('d-block');
        $('.contact-right').toggleClass('d-none');
    });

    /**
     * End contactNavicon settings
     */



    /**
     * Start remove_slider_file
     */

    $('body').on('click', '.remove_slider_file', function () {

        var this_element = $(this);
        var check_count  = $('.remove_slider_file').length;

        if(check_count > 1)
        {
            this_element.parents('.item').remove();
        }
        else{
            $('#errorsModal').modal('show');
            $('#errorsModal').find('.display_errors_msg').html("");
        }

        return false;
    });

    /**
     * End remove_slider_file
     */


    /**
     * Start popover settings
     */

    if($('[data-toggle="popover"]').length)
    {

        // $('[data-toggle="popover"]').popover();

        $('[data-popover-color="primary"]').popover({
            template: '<div class="popover popover-primary" role="tooltip">' +
            '<div class="arrow"></div>' +
            '<h3 class="popover-header"></h3>' +
            '<div class="popover-body"></div>' +
            '</div>'
        });

        $(document).on('click', function (e) {
            $('[data-toggle="popover"],[data-original-title]').each(function () {
                //the 'is' for buttons that trigger popups
                //the 'has' for icons within a button that triggers a popup
                if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                    (($(this).popover('hide').data('bs.popover')||{}).inState||{}).click = false  // fix for BS 3.3.6
                }

            });
        });

    }


    /**
     * End popover settings
     */

    /**
     * Start switch toggle settings
     */

    if($('.switch_toggle').length)
    {

        $('body').on("click",".switch_toggle",function () {

            var dark_mode = $(this).attr('data-dark_mode');

            if(typeof dark_mode == "undefined")
            {
                dark_mode = "off";
            }

            var obj = {};
            obj._token      = _token;
            obj.dark_mode   = dark_mode;

            $.ajax({
                url:base_url2+"/theme/dark_mode",
                type:"POST",
                data:obj,
                success:function(data){
                    location.reload(true);
                }
            });

            return false;
        });

    }


    /**
     * End switch toggle settings
     */



    /**
     * start notification seen
     */

    $('body').on('click','.seen',function(e){

        console.log('is clicked');

        e.preventDefault();

        $.ajax({
            url:base_url2+"/admin/notifications_seen",
            type:'POST',
            data:{'_token':_token},
            success:function(){
                $('#hide').hide();
            }
        })

    });


    /**
     * End notifications seen
     */




    /**
     * start support_messages seen
     */

    $('body').on('show.bs.popover','.support-message-seen',function(e){
        var this_element = $(this);
        console.log('is clicked');

        var obj = {};
        obj._token       = _token;
        obj.id           = this_element.attr("data-id");
        obj.is_seen      = parseInt(this_element.attr("data-is-seen"));
        if(obj.is_seen == 0){
            $.ajax({
                url:base_url2+"/admin/support_messages_seen",
                type:'POST',
                data:obj,

                success:function(){

                    this_element.parents('tr').removeClass('support-message-seen');

                }
            })
        }


    });


    /**
     * End support_messages seen
     */



    /**
     * Start print_invoice
     */

    $('body').on('click','.print_invoice',function () {

        var this_element = $(this);

        window.print();

        return false;
    });


    /**
     * End print_invoice
     */


    /**
     * Start verification settings
     */

    $('body').on('change', '.change_verification_type', function () {

        var this_element = $(this);
        var current_val = this_element.val();

        if (typeof current_val != "undefined")
        {

            if(current_val == "email")
            {

                $('.mail_type_div').show();
                $('.email_input_div').show();
                $('.sms_settings_div').hide();
                $('.change_mail_type').change();

            }
            else if(current_val == "sms")
            {
                $('.sms_settings_div').show();
                $('.mail_type_div').hide();
                $('.email_input_div').hide();
                $('.smtp_settings_div').hide();
            }
            else if(current_val == "both")
            {

                $('.mail_type_div').show();
                $('.email_input_div').show();
                $('.sms_settings_div').show();
                $('.change_mail_type').change();
            }

        }


        return false;
    });


    $('body').on('change', '.change_mail_type', function () {

        var this_element = $(this);
        var current_val = this_element.val();

        if (typeof current_val != "undefined")
        {

            if(current_val == "mail")
            {

                $('.smtp_settings_div').hide();

            }
            else if(current_val == "smtp")
            {
                $('.smtp_settings_div').show();
            }

        }


        return false;
    });


    if($('.change_verification_type').length)
    {
        $('.change_verification_type').change();
    }


    /**
     * End verification settings
     */



    /**
     * Start products taxes settings
     */

    $('body').on('change', '.change_products_include_tax', function () {

        var this_element = $(this);
        var current_val = this_element.val();

        if (typeof current_val != "undefined")
        {

            if(current_val == "1")
            {

                $('.order_taxes_div').hide();

            }
            else if(current_val == "0")
            {
                $('.order_taxes_div').show();
            }

        }


        return false;
    });


    if($('.change_products_include_tax').length)
    {
        $('.change_products_include_tax').change();
    }


    /**
     * End products taxes settings
     */


    /**
     * Start delivery zone map
     */

    if ($('.zone_map_coordinates').length)
    {

        var zone_map_coordinates    = $('.zone_map_coordinates').val();
        var map_center_coordinates  = $('.map_center_coordinates').val();
        zone_map_coordinates        = JSON.parse(zone_map_coordinates);
        map_center_coordinates      = JSON.parse(map_center_coordinates);


        var map = new google.maps.Map(document.getElementById('zone_map'), {
            center: map_center_coordinates,
            zoom: 13
        });

        // Construct the polygon.
        var bermudaTriangle = new google.maps.Polygon({
            paths: zone_map_coordinates,
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF0000',
            fillOpacity: 0.35
        });
        bermudaTriangle.setMap(map);

    }


    if ($('#save_zone_map').length)
    {

        var pos;
        var zone_map;
        var polyOptions;
        var drawingManager;
        var searchBox;
        var input;

        var store_lat = $('.store_lat').val();
        var store_lng = $('.store_lng').val();

        if(typeof store_lat != "undefined" && store_lng != "")
        {

            store_lat = parseFloat(store_lat);
            store_lng = parseFloat(store_lng);

            pos = {
                lat: store_lat,
                lng: store_lng
            };

        }
        else{
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {

                    pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                });
            }
        }


        function intializeZoneMap(pos) {

            $('.save_zone_map_coordinates').val('');

            zone_map = new google.maps.Map(document.getElementById('save_zone_map'), {
                center: pos,
                zoom: 14,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });


            polyOptions = {
                strokeWeight: 0,
                fillOpacity: 0.45,
                editable: true,
                draggable: true,
                fillColor: '#FF1493'
            };

            drawingManager = new google.maps.drawing.DrawingManager({
                drawingMode: google.maps.drawing.OverlayType.POLYGON,
                drawingControl: true,
                drawingControlOptions: {
                    position: google.maps.ControlPosition.TOP_CENTER,
//                drawingModes: ['marker', 'circle', 'polygon', 'polyline', 'rectangle']
                    drawingModes: ['polygon']
                },
                markerOptions: {
                    draggable: true
                },
                polygonOptions: polyOptions
            });
            drawingManager.setMap(zone_map);

            google.maps.event.addListener(drawingManager, 'polygoncomplete', function (polygon) {

                var polygoin_points = [];
                for (var i = 0; i < polygon.getPath().getLength(); i++) {
                    polygoin_points.push(polygon.getPath().getAt(i).toUrlValue(6));
                }

                polygoin_points = JSON.stringify(polygoin_points);
                $('.save_zone_map_coordinates').val(polygoin_points);

                drawingManager.setDrawingMode(null);

                // drawingManager.setMap(null);

            });

            google.maps.event.addListener(drawingManager, 'overlaycomplete', function (e) {

                var newShape = e.overlay;
                newShape.type = e.type;

                google.maps.event.addListener(newShape, 'dragend', function() {

                    var len = newShape.getPath().getLength();
                    var polygoin_points = [];
                    for (var i=0; i<len; i++) {
                        polygoin_points.push(newShape.getPath().getAt(i).toUrlValue(6));
                    }

                    polygoin_points = JSON.stringify(polygoin_points);
                    $('.save_zone_map_coordinates').val(polygoin_points);

                });

                google.maps.event.addListener(newShape, 'mouseup', function() {

                    var len = newShape.getPath().getLength();
                    var polygoin_points = [];
                    for (var i=0; i<len; i++) {
                        polygoin_points.push(newShape.getPath().getAt(i).toUrlValue(6));
                    }

                    polygoin_points = JSON.stringify(polygoin_points);
                    $('.save_zone_map_coordinates').val(polygoin_points);

                });



            });


        }

        function intializeZoneSearch() {

            $('.set_zone_search_input').html('<input id="pac-input" class="controls form-control" type="text" placeholder="إبحث هنا ...">');

            input = document.getElementById('pac-input');

            searchBox = new google.maps.places.SearchBox(input);
            zone_map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            searchBox.addListener('places_changed', function () {
                var places = searchBox.getPlaces();

                var markers = [];

                if (typeof places == "undefined" || places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach(function (marker) {
                    marker.setMap(null);
                });
                markers = [];

                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function (place) {
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };

                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: zone_map,
                        title: place.name,
                        position: place.geometry.location
                    }));

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }

                    // console.log(place.geometry.location.lat());
                    // console.log(place.geometry.location.lng());

                });
                zone_map.fitBounds(bounds);
            });

            // Bias the SearchBox results towards current map's viewport.
            zone_map.addListener('bounds_changed', function () {
                searchBox.setBounds(zone_map.getBounds());
            });


        }

        intializeZoneMap(pos);

        intializeZoneSearch();


        $('body').on('click','.reset_zone_map',function () {

            intializeZoneMap(pos);

            intializeZoneSearch();

            return false;

        });


        $(window).keydown(function(event){
            if(event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });


    }

    /**
     * End delivery zone map
     */


    /**
     * Start delivery range map in km
     */

    if ($('#save_range_map').length)
    {

        var store_lat           = $('.store_lat').val();
        var store_lng           = $('.store_lng').val();
        var deliver_in_range    = $('.deliver_in_range').val();
        var pos;

        deliver_in_range = parseFloat(deliver_in_range);

        if(typeof store_lat != "undefined" && store_lng != "")
        {

            store_lat = parseFloat(store_lat);
            store_lng = parseFloat(store_lng);

            pos = {
                lat: store_lat,
                lng: store_lng
            };

        }
        else{
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {

                    store_lat = position.coords.latitude;
                    store_lng = position.coords.longitude;

                    pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                });
            }
        }

        var static_position = new google.maps.LatLng(store_lat, store_lng);

        function initRangeMap() {

            // Create the map.
            var range_map = new google.maps.Map(document.getElementById('save_range_map'), {
                zoom: 11,
                center: pos,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var cityCircle = new google.maps.Circle({
                strokeColor: '#FF0000',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#FF0000',
                fillOpacity: 0.35,
                map: range_map,
                center: pos,
                editable: true,
                draggable: false,
                radius: (deliver_in_range*1000)
            });

            google.maps.event.addListener(cityCircle, 'radius_changed', function (e) {

                $('.deliver_in_range').val(cityCircle.getRadius()/1000)

            });

            google.maps.event.addListener(cityCircle, 'center_changed', function (event) {
                if(cityCircle.getCenter().toString() !== static_position.toString()) cityCircle.setCenter(static_position);
            });

        }

        initRangeMap();

    }

    /**
     * End delivery range map in km
     */

    /**
     * Start cloning item
     */

    $('body').on('click','.clone_item_btn',function () {


        var this_element = $(this);

        if($('.select_2_primary').length)
        {
            $('.select_2_primary').select2("destroy");
        }

        var cloned_item = this_element.parents('.clone_item_div').clone(true, true);

        cloned_item.find('.fire_datetimepicker').removeData('datetimepicker').unbind().datetimepicker({
            autoclose: true,
            todayBtn: true
        });

        if(cloned_item.find('.be_zero').length)
        {
            $.each(cloned_item.find('.be_zero'),function () {
                $(this).val(0);
            });
        }

        if(cloned_item.find('.be_empty').length)
        {
            $.each(cloned_item.find('.be_empty'),function () {
                $(this).val('');
            });
        }

        this_element.parents('.clone_items_container').append(cloned_item);

        if($('.select_2_primary').length)
        {
            $('.select_2_primary').select2({
                containerCssClass: 'select2-full-color select2-primary',
                minimumResultsForSearch: Infinity // disabling search
            });
        }


        // if ($('.fire_datetimepicker').length){
        //     $('.fire_datetimepicker').datetimepicker({
        //         autoclose: true,
        //         todayBtn: true
        //     });
        // }


        return false;

    });

    $('body').on('click','.remove_item_btn',function () {

        var this_element = $(this);

        var check_length = this_element.parents('.clone_items_container').find('.clone_item_div').length;
        if(check_length == 1)
        {
            alert('لا يمكن مسح اخر عنصر');
            return false;
        }

        var confirm_msg = confirm("هل أنت متأكد ؟");
        if(confirm_msg)
        {

            this_element.attr('disabled');

            var obj={};
            obj._token          = _token;
            obj.table           = this_element.attr("data-table");
            obj.table_trans     = this_element.attr("data-table_trans");
            obj.id              = this_element.attr("data-id");
            obj.fk_field        = this_element.attr("data-fk_field");

            if(obj.id != 0){
                $.ajax({
                    url:base_url2+"/admin/offers/remove_step_item",
                    type:"POST",
                    data:obj,
                    success:function(data){

                    }
                });
            }

            this_element.parents('.clone_item_div').fadeOut(500).remove();
        }


        return false;

    });


    /**
     * End cloning item
     */


});

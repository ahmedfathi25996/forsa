<?php

// function that generate map with default coordinates or your previous coordinates 
// passed by parameters
// $lat , $lng send your current value of (0 , 0) if add new item
// or send your previous value if edit exist item
function generate_map_helper($lat , $lng){
    
    $html_tag = "";
    
    $html_tag .= '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0jFnIKr5fjHZlmeY3QoiyelAGLrd-Fnc&libraries=places&sensor=false"></script>';
    $html_tag .= '<script src="'.url('/').'/public/jscode/admin/map.js"></script>';
    
    $html_tag .= '<div class="col-md-12">';
    $html_tag .=    '<input id="pac-input" class="controls form-control" type="text" placeholder="إبحث هنا ...">';
    $html_tag .=    '<div id="shop_map" class="col-md-12" style="height:400px;"></div>';
    $html_tag .= '</div>';
    
    $html_tag .='<hr>';
    $html_tag .='<div class="row">';
    $html_tag .=    generate_inputs_html(
                        array("إحداثي خط العرض".' '.'<span style="color: red;font-weight: bold;">*</span>',"إحداثي خط الطول".' '.'<span style="color: red;font-weight: bold;">*</span>') ,
                        array("map_lat","map_lng") ,
                        array("","") ,
                        array("text","text") ,
                        array($lat,$lng),
                        array("lat","lng"),
                        $grid=["6", "6"]
                    );

    $html_tag .= '</div>';

    return $html_tag;
    
}
?>
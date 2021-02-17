<?php

function list_all_timezones($replace_underscore=false){
    $arr=DateTimeZone::listIdentifiers(DateTimeZone::ALL);

    if($replace_underscore){
        $arr=array_map(function($item){
            return str_replace("_"," ",$item);
        },$arr);
    }

    return $arr;
}

function extract_youtube_links($content, $change = "yes")
{
    if (preg_match_all('~(https://www\.youtube\.com/watch\?v=[%&=#\w-]*)~', $content, $m)) {
        if ($change == "yes") {
            $output = array();
            foreach ($m[0] as $key => $value) {
                $value = str_replace("watch", "embed", $value);
                $output[] = str_replace("?v=", "/", $value);
            }
            return ($output);
        }
        return $m[0];
    }
}


function freeconvertCurrency($amount, $from, $to)
{
    $opration = $from."_".$to;
    $url = "http://free.currencyconverterapi.com/api/v5/convert?q=$opration&compact=y";
    $data = file_get_contents($url);
    $data = json_decode($data);
    if(is_object($data)){
        if(isset($data->$opration)){
            $value = $data->$opration;
            return $value->val*$amount;

        }
    }
    return 0;
}

function split_word_into_chars($word, $number_of_chars, $include_end_of_text = "yes")
{
    $number_of_chars = $number_of_chars / 3;

    $arr = str_split($word, 3);

    if(count($arr)<$number_of_chars){
        $number_of_chars=count($arr)-1;
    }

    $arr = array_slice($arr, 0, (int)$number_of_chars);


    if ($include_end_of_text == "yes") {
        $arr[] = " ...";
    }

    return implode("", $arr);
}

function split_word_into_chars_ar($word,$number_of_chars,$include_end_of_text="yes")
{
    $word = strip_tags($word);

    mb_internal_encoding("UTF-8"); // this IS A MUST!! PHP has trouble with multibyte

    $chars = array();
    for ($i = 0; $i < $number_of_chars; $i++ ) {
        $chars[] = mb_substr($word, $i, 1); // only one char to go to the array
    }

    if(strlen($word)>$number_of_chars){
        $chars[]=" ...";
    }

    return implode("",$chars);
}


function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE)
{
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            $time_zone=@$ipdat->geoplugin_timezone;
            $lat=@$ipdat->geoplugin_latitude;
            $lng=@$ipdat->geoplugin_longitude;

            if(empty($time_zone)&&!empty($lat)&&!empty($lng)){

                $arrContextOptions=array(
                    "ssl"=>array(
                        "verify_peer"=>false,
                        "verify_peer_name"=>false,
                    ),
                );

                $time_zone=file_get_contents("https://maps.googleapis.com/maps/api/timezone/json?location=$lat,$lng&timestamp=1331161200&key=AIzaSyAR8_ojx8n7FBDd5xar0gUcwpzExnw6xXU",false, stream_context_create($arrContextOptions));
                $time_zone=json_decode($time_zone);
                if(is_object($time_zone)){
                    $time_zone=$time_zone->timeZoneId;
                }

            }

            switch ($purpose) {
                case "location":
                    $output = array(
                        "city" => @$ipdat->geoplugin_city,
                        "state" => @$ipdat->geoplugin_regionName,
                        "country" => @$ipdat->geoplugin_countryName,
                        "country_code" => @$ipdat->geoplugin_countryCode,
                        "continent" => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode,
                        "timezone"=>$time_zone,
                        "country_code"=>@$ipdat->geoplugin_countryCode,
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
    return $output;
}

function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if (isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';

    if($ipaddress=="::1"){
//        $ipaddress="197.38.140.121";
//        $ipaddress="80.229.40.146"; UK
        $ipaddress="37.58.58.206"; //germany


    }

    return $ipaddress;
}

function cmp_price_value($a, $b)
{
    //return strcmp(doubleval($b->price), doubleval($a->price));
    return strcmp(doubleval($a->price), doubleval($b->price));
}

function get_adv($adv_obj, $img_width = "0px", $img_height = "0px")
{

    if (is_array($adv_obj) && isset($adv_obj[0])) {
        $adv_obj = $adv_obj[0];
    }

    if (!isset($adv_obj->ad_show)) {
        return "";
    }

    if ($adv_obj->ad_show == "script") {
        return $adv_obj->ad_script;
    } else {
        return "<a href='$adv_obj->ad_link'>
                        <img class='responsive-img' src='" . url("/" . $adv_obj->ad_img_path) . "' alt='$adv_obj->ad_img_alt' title='$adv_obj->ad_img_title' style='width:$img_width;height:$img_height;' />
                    </a>";
    }

}

function capitalize_string($string){
    $field_name=explode("_",$string);
    if(isset_and_array($field_name)){
        $field_name=array_map("ucfirst",$field_name);
        return implode(" ",$field_name);
    }
    else{
        return ucfirst($field_name);
    }
}

function show_content($content_json, $field_name,$field_is_img=false)
{
    if (isset($content_json->{$field_name})) {
        if($field_is_img){
            return get_image_or_default($content_json->{$field_name}->path);
        }
        else{
            return $content_json->{$field_name};
        }
    } else {
        if($field_is_img){
            return url('/public/img/no_img.jpg');
        }
        else{
            return capitalize_string($field_name);
        }
    }
}

function show_content_for_other_fields($other_fields,$field_name,$key){

    if(!isset($other_fields->{$field_name})||!isset($other_fields->{$field_name}[$key])){
        return capitalize_string($field_name);
    }

    return $other_fields->{$field_name}[$key];
}


function get_last_word_from_sentence($sentence){
    $sentence_arr=explode(" ",$sentence);
    if(is_array($sentence_arr)&&count($sentence_arr)){
        $last_word=$sentence_arr[count($sentence_arr)-1];
        unset($sentence_arr[count($sentence_arr)-1]);
        return [implode(" ",$sentence_arr),$last_word];
    }

    return [$sentence,$sentence];
}

function isset_and_array($var){

    return (isset($var)&&is_array($var)&&count($var));

}

function convert_youtube_link_to_lazy_frame($youtube_link="",$width="",$height=""){
    $embed=extract_youtube_links($youtube_link);
    if(isset_and_array($embed)){
        $embed=$embed[0];

        return '<iframe width="'.$width.'" height="'.$height.'" class="lazy1"
                    src="'.$embed.'"
                    frameborder="0"
                    allowfullscreen>
                </iframe>';
    }
    return "";
}

function return_youtube_thumbnail($youtube_link=""){
    //https://img.youtube.com/vi/<insert-youtube-video-id-here>/0.jpg
    $youtube_code=explode("=",$youtube_link);
    if(isset_and_array($youtube_code)){
        $youtube_code=$youtube_code[1];

        return "https://img.youtube.com/vi/$youtube_code/0.jpg";
    }
    return "";
}


/**
 * Start Hijri
 */

    function intPart($float) {
        if ($float < -0.0000001)
            return ceil($float - 0.0000001);
        else
            return floor($float + 0.0000001);
    }

    function Greg2Hijri($day, $month, $year, $string = false) {
        $day = (int) $day;
        $month = (int) $month;
        $year = (int) $year;


        if (($year > 1582) or ( ($year == 1582) and ( $month > 10)) or ( ($year == 1582) and ( $month == 10) and ( $day > 14))) {
            $jd = intPart((1461 * ($year + 4800 + intPart(($month - 14) / 12))) / 4) + intPart((367 * ($month - 2 - 12 * (intPart(($month - 14) / 12)))) / 12) -
                intPart((3 * (intPart(($year + 4900 + intPart(($month - 14) / 12) ) / 100) ) ) / 4) + $day - 32075;
        } else {
            $jd = 367 * $year - intPart((7 * ($year + 5001 + intPart(($month - 9) / 7))) / 4) + intPart((275 * $month) / 9) + $day + 1729777;
        }


        $l = $jd - 1948440 + 10632;
        $n = intPart(($l - 1) / 10631);
        $l = $l - 10631 * $n + 354;
        $j = (intPart((10985 - $l) / 5316)) * (intPart((50 * $l) / 17719)) + (intPart($l / 5670)) * (intPart((43 * $l) / 15238));
        $l = $l - (intPart((30 - $j) / 15)) * (intPart((17719 * $j) / 50)) - (intPart($j / 16)) * (intPart((15238 * $j) / 43)) + 29;

        $month = intPart((24 * $l) / 709);
        $day = $l - intPart((709 * $month) / 24);
        $year = 30 * $n + $j - 30;

        $date = array();
        $date['year'] = $year;
        $date['month'] = $month;
        $date['day'] = $day;


        if (!$string)
            return $date;
        else
            return "{$year}-{$month}-{$day}";
    }

    function get_hegri_date($date=null){
    if($date==null){
        $date=time();
    }

    $hijriDate = Greg2Hijri(date("d",$date), date("m",$date), date("Y",$date));

    $hijriMonth = array("محرم", "صفر", "ربيع الأول", "ربيع الثانى ", "جماد الاول", "جماد الثانى", "رجب", "شعبان", "رمضان", "شوال", "ذى القعده", "ذى الحجه");

    $year = $hijriDate["year"];
    $month = $hijriMonth[$hijriDate["month"] - 1];
    $day = $hijriDate["day"]+1;

    return $day . " " . $month . " " . $year;
}

/**
 * End Hijri
 */

function dump_date($str_data="",$format="j/ n/ Y"){
    return date($format,strtotime($str_data));
}

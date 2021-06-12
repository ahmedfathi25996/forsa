<?php

if (is_object($img_obj)) {
    $old_path_value         = url($img_obj->path);
    $old_title_value        = $img_obj->title;
    $old_alt_value          = $img_obj->alt;
    $disalbed               = "disabled";
}

$filed_name_id              = $filed_label . "id";

$checkbox_field_name_id     = $checkbox_field_name . "id";

$title_field_name           = $filed_label . "title";
$alt_field_name             = $filed_label . "alt";


?>

<div class="{{$grid}} form-group parent_file_upload_input">
    <label for="">{!! $display_label !!} {!! $recomended_size !!}</label>
    <div>
        <?php

            $file_size_class        = "col-md-4";
            if ($need_alt_title != "yes") {
                $file_size_class    = "";
            }

        ?>

        <div class="custom-file {{$file_size_class}}">
            <input type="file" class="custom-file-input file_upload_input" id="customFile2 {{$filed_name_id}}" name="{{$filed_name}}"   {!! $required_field !!}>
            <label class="custom-file-label custom-file-label-inverse input_file_name" for="customFile">إختار الملف</label>
        </div><!-- custom-file -->

        <?php if($need_alt_title == "yes"):?>
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="العنوان" name="{{$title_field_name}}" {{$required_alt_title}} value="{{$old_title_value}}">
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="الاسم" name="{{$alt_field_name}}" {{$required_alt_title}} value="{{$old_alt_value}}">
            </div>
        <?php endif;?>
    </div>


    <?php if($disalbed != ""):?>
    <div class="">
        <div class="">
            <div class="row-fluid">
                <?php if(
                            strpos($old_path_value, "mp4") > 0
                        ):?>
                    <a class="btn btn-info" href="{{$old_path_value}}" >اللينك</a>

               <?php elseif(strpos($old_path_value, "pem") > 0):?>
                    <a class="btn btn-info" href="{{$old_path_value}}" download="download">تحميل</a>
                <?php else: ?>
                    <div class="wd-sm-200">
                        <figure class="overlay preview_figure_img">
                            <img src="{{get_image_or_default($img_obj->path)."-200,100"}}"
                                 alt="{{$old_alt_value}}"
                                 title="{{$old_title_value}}"
                                 class="img-fluid"
                                 style="width: auto; height: 100px;">
                            <figcaption class="overlay-body d-flex align-items-end justify-content-center">
                                <div class="img-option img-option-sm">
                                    <a href="{{get_image_or_default($img_obj->path)}}"
                                       target="_blank" class="img-option-link">
                                        <div><i class="fa fa-download"></i></div>
                                    </a>
                                    <a href="#" class="img-option-link upload_new_file">
                                        <div><i class="icon ion-edit"></i></div>
                                    </a>
                                </div>
                            </figcaption>
                            <input type="checkbox" class="checkbox_field_image hide_element" checked name="{{$checkbox_field_name}}" id="{{$checkbox_field_name_id}}">
                        </figure>
                    </div><!-- wd-300 -->
                <?php endif;?>
            </div>
        </div>
    </div>
    <?php endif;?>
</div>



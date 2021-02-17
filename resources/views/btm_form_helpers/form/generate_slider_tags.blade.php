<div class="generate_slider_tags">

    <div class="modal fade edit_img_modal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">

                    <input type="hidden" class="edit_img_id" value="">

                    <div class="custom-file">
                        <input type="file" class="custom-file-input edit_file_at_slider file_upload_input"  name="edit_file_at_slider" accept="{{$accept}}">
                        <label class="custom-file-label custom-file-label-inverse input_file_name" for="customFile">إختار الملف</label>
                    </div><!-- custom-file -->

                    <div class="upload_new_item_msg"></div>

                    <button class="btn btn-primary bd-0 edit_img_at_slider_btn">حفظ</button>

                </div>
            </div>
        </div>
    </div>

    <?php
        $field_name_arr         = $field_name."[]";
        $alt_field              = $field_name."_alt[]";
        $title_field            = $field_name."_title[]";

        $old_alt_field          = $field_name."_edit_alt[]";
        $old_title_field        = $field_name."_edit_title[]";


        $slider_photos_ids      = [];
        if (is_array($slider_photos)&& count($slider_photos)) {
            $slider_photos_ids  = convert_inside_obj_to_arr($slider_photos, "id");
        }

        $json_values_of_slider_id   = "json_values_of_slider_id".$field_name;
        $json_values_of_slider      = "json_values_of_slider".$field_name;
    ?>

    <div class="form-group">
        <div class="row-fluid">

            <div class="slider_imgs_class">

                <div class="row item">

                    <div class="col-md-6">

                        <div class="custom-file">
                            <input type="file" class="custom-file-input file_upload_input {{$field_id}}_class" id="customFile2 {{$field_id}}" name="{{$field_name_arr}}" accept="{{$accept}}">
                            <label class="custom-file-label custom-file-label-inverse input_file_name" for="customFile" data-label="إختار الملف">إختار الملف</label>
                        </div><!-- custom-file -->

                    </div>

                    <?php if($need_alt_title == "yes"): ?>

                        <div class="col-md-6">
                            <label>العنوان</label>
                            <input type="text" class="form-control" name="{{$title_field}}" placeholder="العنوان">
                        </div>

                        <div class="col-md-6">
                            <label>الإسم</label>
                            <input type="text" class="form-control" name="{{$alt_field}}" placeholder="الإسم">
                        </div>

                    <?php endif; ?>

                        <div class="col-md-1">
                            <button class="btn btn-danger remove_slider_file"><i class="fa fa-times"></i></button>
                        </div>

                    <?php if(is_array($additional_inputs_arr) && count($additional_inputs_arr)): ?>

                        <div class="col-md-8">
                            <?php
                                //add additional fields
                                $empty_values       = [];
                                for($i=0; $i<count($additional_inputs_arr[0]); $i++){
                                    $empty_values[] = "";
                                }

                                echo generate_inputs_html(
                                    $labels_name        = $additional_inputs_arr[0],
                                    $fields_name        = $additional_inputs_arr[1],
                                    $required           = $additional_inputs_arr[2],
                                    $type               = $additional_inputs_arr[3],
                                    $values             = $empty_values,
                                    $class              = $additional_inputs_arr[5]
                                );
                            ?>
                        </div>

                    <?php endif; ?>

                </div>
            </div>

            <div class="row add_more_files_div" style="margin-bottom: 12px;margin-right: 0px;">
                <a href="" class="btn btn-primary add_img_btn_class"><i class="fa fa-plus"></i></a>
            </div>

            <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">


                <div id="accordion2" class="accordion-one accordion-one-primary" role="tablist" aria-multiselectable="true">
                    <div class="card">
                        <div class="card-header" role="tab" id="headingOne2">
                            <a data-toggle="collapse" data-parent="#accordion2" href="#old_data_{{$field_name}}" aria-expanded="true" aria-controls="old_data_{{$field_name}}" class="tx-gray-800 transition">
                                {{$show_as_link?"الملفات":"الصور"}} الحالية
                            </a>
                        </div><!-- card-header -->

                        <div id="old_data_{{$field_name}}" class="collapse show" role="tabpanel" aria-labelledby="headingOne2">
                            <div class="card-body old_imgs">
                                <?php if(is_array($slider_photos) && count($slider_photos)): ?>

                                <ul style="list-style: none; display: inline-block;width: 100%;">
                                    <?php foreach($slider_photos as $key => $img): ?>

                                    <li class="old_item col-md-12" style="border-bottom: 1px solid #CCC;padding-bottom: 5px;">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?php if($show_as_link == true): ?>
                                                <a target="_blank" href="{{url("$img->path")}}" class="slider_item_when_edited_{{$img->id}}" data-item_type="link">
                                                    {{((!empty($img->title))?$img->title:"اللينك")}}
                                                </a>
                                                <?php else: ?>

                                                <div class="wd-sm-200">
                                                    <figure class="overlay">
                                                        <img src="{{get_image_or_default($img->path)."-200,100"}}"
                                                             alt="{{$img->alt}}"
                                                             title="{{$img->title}}"
                                                             class="img-fluid slider_item_when_edited_{{$img->id}}"
                                                             data-item_type="img"
                                                             style="width: 200px; height: 100px;">
                                                        <figcaption class="overlay-body d-flex align-items-end justify-content-center">
                                                            <div class="img-option img-option-sm">
                                                                <a href="#" class="img-option-link open_edit_modal" data-img_id="{{$img->id}}">
                                                                    <div><i class="fa fa-edit"></i></div>
                                                                </a>
                                                                <a href="#" class="img-option-link slider_img_remover" data-photoid="{{$img->id}}">
                                                                    <div><i class="fa fa-times"></i></div>
                                                                </a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </div><!-- wd-300 -->

                                                <?php endif; ?>

                                            </div>


                                            <div class="col-md-8">
                                                <?php if($need_alt_title != "no"): ?>
                                                <div class="col-md-12 form-group">
                                                    <label for="">العنوان</label>
                                                    <input type="text" class="form-control slider_img_title" name="{{$old_title_field}}" placeholder="العنوان" value="{{$img->title}}">
                                                </div>

                                                <div class="col-md-12 form-group">
                                                    <label for="">الإسم</label>
                                                    <input type="text" class="form-control slider_img_alt" name="{{$old_alt_field}}" placeholder="الإسم" value="{{$img->alt}}">
                                                </div>
                                                <?php endif; ?>

                                                <?php if(is_array($additional_inputs_arr) && count($additional_inputs_arr)): ?>
                                                            <?php
                                                    //add additional fields
                                                    $new_values=array();

                                                    foreach ($additional_inputs_arr[4] as $input_v_key => $input_v) {

                                                        if (isset($input_v[$key])) {
                                                            //$new_values[]=  array_shift($input_v);
                                                            $new_values[]=  $input_v[$key];

                                                        }
                                                        else{
                                                            $new_values[]="";
                                                        }
                                                    }


                                                    foreach ($additional_inputs_arr[1] as $field_key => $value) {
                                                        if ($key==0) {
                                                            $additional_inputs_arr[1][$field_key]="edit_".$additional_inputs_arr[1][$field_key];
                                                        }

                                                    }

                                                    echo generate_inputs_html(
                                                        $labels_name    = $additional_inputs_arr[0],
                                                        $fields_name    = $additional_inputs_arr[1],
                                                        $required       = $additional_inputs_arr[2],
                                                        $type           = $additional_inputs_arr[3],
                                                        $values         = $new_values,
                                                        $class          = $additional_inputs_arr[5]
                                                    );
                                                    ?>
                                                        <?php endif; ?>
                                            </div>

                                        </div>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <input type="hidden" class="json_values_of_slider_class" name="{{$json_values_of_slider}}" value='{!! json_encode($slider_photos_ids) !!}'>
    </div>


</div>


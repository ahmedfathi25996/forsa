
<?php
$full_url = url("admin/doctors/save/$item->doctor_id");
?>

<div class="col-sm-6 col-lg-3 fixed_block_item" id="row{{$item->doctor_id}}"
     data-itemid="<?= $item->doctor_id ?>" data-tablename="App\models\doctors\doctors_m">
    <div class="card-contact">
        <div class="tx-center">
            <a href="{{$full_url}}">
                <img src="{{get_image_or_default($item->doctor_image_path)}}-150,150" class="card-img">
            </a>
            <h5 class="mg-t-10 mg-b-5">
                <a href="{{$full_url}}" class="contact-name">
                    {{$item->full_name}}

                </a>
            </h5>
            <p class="contact-social">
                <a href="{{$full_url}}" class="btn btn-primary bd-0">
                    <i class="fa fa-edit"></i>
                </a>
                <a href='#confirmModal'
                   data-toggle="modal"
                   data-effect="effect-super-scaled"
                   class="btn btn-danger bd-0 modal-effect confirm_remove_item"
                   data-tablename="App\models\doctors\doctors_m"
                   data-deleteurl="{{url("/admin/doctors/delete")}}"
                   data-itemid="{{$item->doctor_id}}">
                    <i class="fa fa-remove"></i>
                </a>
                @if($item->temp_username != "" || $item->temp_email != ""  || $item->temp_mobile_number != ""  || $item->temp_age != "" || $item->temp_gender != "")
                    <a href="{{url("admin/doctors/show/changes/$item->doctor_id")}}" class="btn btn-primary bd-0">
                        Profile Changes
                    </a> <br>
                 @endif

                @if($item->temp_price != 0 || $item->temp_video_id != 0  || $item->temp_years_of_experience != 0  || $item->temp_certificates_ids != "")
                    <a href="{{url("admin/doctors/bio/show/changes/$item->doctor_id")}}" class="btn btn-primary bd-0">
                        Bio Changes
                    </a>
                @endif




            </p>
        </div><!-- tx-center -->
    </div><!-- card -->
</div><!-- col -->


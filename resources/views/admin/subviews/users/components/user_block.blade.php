<div class="col-sm-6 col-lg-4 store_block_item" id="row{{$item->user_id}}"
     data-fieldname="store_order"
     data-itemid="{{$item->user_id}}" data-tablename="App\User">
    <div class="card-contact">
        <div class="tx-center">
            <a href="{{url("admin/users/profile/$item->user_id")}}">
                <img src="{{get_image_or_default($item->logo_path)}}-150,150" class="card-img">
            </a>
            <h5 class="mg-t-10 mg-b-5">
                <a href="{{url("admin/users/profile/$item->user_id")}}" class="contact-name">{{$item->username}}</a>
                <?php if($item->is_active == 1): ?>
                    <i class="fa fa-check-circle" title="فعال"></i>
                <?php endif; ?>
            </h5>
            <?php if(isset($item->phone) && !empty($item->phone)) :?>
                <p class="contact-item">
                    <span> التليفون: </span>
                    <a href="tel:">{{$item->phone_code}}-{{$item->mobile_number}}</a>
                </p><!-- contact-item -->
            <?php endif; ?>
            <p class="contact-item">

                <span>البريد الالكتروني:</span>
                <a href="mailto:">{{$item->email}}</a>
            </p><!-- contact-item -->
            <p class="contact-social">
                <a href='#confirmModal'
                   data-toggle="modal"
                   data-effect="effect-super-scaled"
                   class="btn btn-danger bd-0 modal-effect confirm_remove_item"
                   data-tablename="App\User"
                   data-deleteurl="{{url("/admin/clients/delete")}}"
                   data-itemid="{{$item->user_id}}">
                    <i class="fa fa-remove"></i>
                </a>
            </p>

        </div><!-- tx-center -->
    </div><!-- card -->
</div><!-- col -->


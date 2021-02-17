@extends('admin.main_layout')

@section('additional_css')

    <link href="{{url("/")}}/public/admin/lib/jquery-ui/css/jquery-ui.css" rel="stylesheet">

@endsection

@section('additional_js')

    <script src="{{url("/")}}/public/admin/lib/jquery-ui/js/jquery-ui.js"></script>

@endsection

@section('subview')
    <div class="slim-mainpanel">
        <div class="container">
            <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="{{url("admin/users/all")}}">العملاء</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$item_data->username}} </li>
                </ol>
                <h6 class="slim-pagetitle">الصفحة الشخصية</h6>
            </div><!-- slim-pageheader -->

            <div class="row row-sm">
                <div class="col-lg-8">
                    <div class="card card-profile">
                        <div class="card-body">
                            <div class="media">
                                <img src="{{get_image_or_default($item_data->logo_path)}}" alt="">
                               
                            </div><!-- media -->
                        </div><!-- card-body -->
                        <div class="media-body">
                                    <h3 class="card-profile-name">{{$item_data->username}}</h3>
                                </div><!-- media-body -->
                        <?php
                            echo generate_multi_accepters(
                                $accepturl              = "",
                                $item_obj               = $item_data,
                                $item_primary_col       = "user_id",
                                $accept_or_refuse_col   = "is_active",
                                $model                  = 'App\User',
                                $accepters_data         =
                                    [
                                        "1"             => "<i class='fa fa-check'> نشط</i>",
                                        "0"             => "<i class='fa fa-times'> غير نشط</i>"
                                    ]
                            );
                        ?>

                    </div><!-- card -->
                </div><!-- col-8 -->

                <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                
                    <div class="card pd-25 mg-t-20">
                        <div class="slim-card-title">البيانات الشخصية</div>

                        <div class="media-list mg-t-25">
                            <?php if(isset($item_data->mobile_number) && !empty($item_data->mobile_number)) :?>
                                <div class="media mg-t-25">
                                    <div><i class="icon ion-ios-telephone-outline tx-24 lh-0"></i></div>
                                    <div class="media-body mg-l-15 mg-t-4">
                                        <h6 class="tx-14 tx-gray-700">رقم التليفون</h6>
                                        <span class="d-block"><a href="tel:{{$item_data->phone_code}}-{{$item_data->mobile_number}}">{{$item_data->phone_code}}-{{$item_data->mobile_number}}</a></span>
                                    </div><!-- media-body -->
                                </div><!-- media -->
                            <?php endif; ?>
                            <div class="media mg-t-25">
                                <div><i class="icon ion-ios-email-outline tx-24 lh-0"></i></div>
                                <div class="media-body mg-l-15 mg-t-4">
                                    <h6 class="tx-14 tx-gray-700">البريد الالكتروني</h6>
                                    <span class="d-block"><a href="mailto:{{$item_data->email}}">{{$item_data->email}}</a></span>
                                </div><!-- media-body -->
                            </div><!-- media -->
                            <div class="media mg-t-25">
                                <div class="media-body mg-l-15 mg-t-4">
                                    <h6 class="tx-14 tx-gray-700">المدينة </h6>
                                    <span class="d-block">{{$item_data->city}}</span>
                                </div><!-- media-body -->
                            </div><!-- media -->
                            <div class="media mg-t-25">
                                <div class="media-body mg-l-15 mg-t-4">
                                    <h6>العمر </h6>
                                    <span class="d-block">{{$item_data->age}}</span>
                                </div><!-- media-body -->
                            </div><!-- media -->
                        </div><!-- media-list -->
                    </div><!-- card -->

                </div><!-- col-4 -->
            </div><!-- row -->

        </div><!-- container -->
    </div><!-- slim-mainpanel -->

@endsection
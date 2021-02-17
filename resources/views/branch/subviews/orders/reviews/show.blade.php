@extends('admin.main_layout')

@section('additional_css')

    <link href="{{url("/")}}/public/admin/lib/datatables/css/jquery.dataTables.css" rel="stylesheet">

@endsection

@section('additional_js')

    <script src="{{url("/")}}/public/admin/lib/datatables/js/jquery.dataTables.js"></script>
    <script src="{{url("/")}}/public/admin/lib/datatables-responsive/js/dataTables.responsive.js"></script>

@endsection

@section('subview')

    <div class="slim-mainpanel">
        <div class="container">
            <div class="manager-header">
                <div class="slim-pageheader">
                    <ol class="breadcrumb slim-breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">تقييمات الطلبات</li>
                    </ol>
                    <h6 class="slim-pagetitle">تقييمات الطلبات</h6>
                </div><!-- slim-pageheader -->
                <a id="contactNavicon"  href="" class="contact-navicon"><i class="icon ion-navicon-round"></i></a>
            </div><!-- manager-header -->

            <div class="manager-wrapper">

                <div class="manager-right">
                    <div class="row row-sm">

                        <div class="col-md-12">

                            <?php if(is_array($results->all()) && count($results->all())): ?>

                                <table id="datatable2" class="table display responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th class="wd-15p"><span>#</span></th>
                                        <th class="wd-15p"><span>اسم المستخدم</span></th>
                                        <th class="wd-15p"><span>التقييم</span></th>
                                        <th class="wd-15p"><span>التعليق</span></th>
                                        <th class="wd-15p"><span>التاريخ</span></th>
                                        <th class="wd-15p"><span>موافق ؟</span></th>
                                        <th class="wd-15p"><span>العملية</span></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($results as $key => $item): ?>
                                        <tr id="row{{$item->review_id}}">
                                            <td>
                                                {{$key+1}}
                                            </td>
                                            <td>
                                                <i class="fa fa-user"></i>
                                                {{$item->full_name}}
                                            </td>
                                            <td>
                                                {{$item->rate_value}} <i class="fa fa-star"></i>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary"
                                                        data-toggle="popover"
                                                        data-container="body"
                                                        data-popover-color="primary" data-placement="top"
                                                        title="{{$item->full_name}}"
                                                        data-content="{{$item->comment}}">
                                                    <span>مشاهدة</span>
                                                </button>

                                            </td>
                                            <td>
                                                        <span class="badge badge-light">
                                                            <i class="fa fa-calendar"></i>
                                                            {{$item->created_at}}
                                                        </span>
                                                <br>
                                                <span class="badge badge-primary">{{\Carbon\Carbon::createFromTimestamp(strtotime($item->created_at))->diffForHumans()}}</span>
                                            </td>
                                            <td>
                                                <?php
                                                echo generate_multi_accepters(
                                                    $accepturl              = url("admin/orders/$item->order_id/reviews/manage_status"),
                                                    $item_obj               = $item,
                                                    $item_primary_col       = "review_id",
                                                    $accept_or_refuse_col   = "is_reviewed",
                                                    $model                  = 'App\models\orders\orders_reviews_m',
                                                    $accepters_data         =
                                                        [
                                                            "1"     => "<i class='fa fa-check'></i>",
                                                            "0"     => "<i class='fa fa-times'></i>"
                                                        ]
                                                );
                                                ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary mg-b-6" href="{{url("admin/orders/get/$item->order_id")}}">
                                                    <i class="fa fa-send-o"></i>
                                                </a>

                                                <a href='#confirmModal'
                                                   data-toggle="modal"
                                                   data-effect="effect-super-scaled"
                                                   class="btn btn-danger mg-b-6 modal-effect confirm_remove_item"
                                                   data-tablename="App\models\orders\orders_reviews_m"
                                                   data-deleteurl="{{url("/admin/orders/$item->order_id/reviews/delete")}}"
                                                   data-itemid="{{$item->review_id}}">
                                                    <i class="fa fa-remove"></i>
                                                </a>

                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                    </tbody>
                                </table>

                                @include('admin.components.pagination')

                            <?php else : ?>

                            @include('admin.components.no_results_found')

                            <?php endif; ?>


                        </div><!-- table-wrapper -->

                    </div><!-- row -->
                </div><!-- manager-right -->

                <div class="manager-left">

                    <div class="manager-left">

                        <nav class="nav">
                            <a href="{{url('admin/orders/reviews/all')}}" class="nav-link">
                                <span>كل التقيمات</span>
                                <span class="badge badge-secondary">{{$total_reviews}}</span>
                            </a>
                            <a href="{{url('admin/orders/reviews/approved')}}" class="nav-link">
                                <span>المعروضة</span>
                                <span class="badge badge-secondary">{{$total_approved_reviews}}</span>
                            </a>
                            <a href="{{url('admin/orders/reviews/waiting')}}" class="nav-link">
                                <span>الغير معروضة</span>
                                <span class="badge badge-secondary">{{$total_waiting_reviews}}</span>
                            </a>

                        </nav>

                    </div><!-- manager-left -->
                </div><!-- manager-left -->

            </div><!-- manager-wrapper -->

        </div><!-- container -->
    </div><!-- slim-mainpanel -->

@endsection

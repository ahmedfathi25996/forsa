@extends('admin.main_layout')

@section('additional_css')

    <link href="{{url("/")}}/public/admin/lib/datatables/css/jquery.dataTables.css" rel="stylesheet">
    <link href="{{url("/")}}/public/admin/lib/select2/css/select2.min.css" rel="stylesheet">

@endsection

@section('additional_js')

    <script src="{{url("/")}}/public/admin/lib/datatables/js/jquery.dataTables.js"></script>
    <script src="{{url("/")}}/public/admin/lib/datatables-responsive/js/dataTables.responsive.js"></script>
    <script src="{{url("/")}}/public/admin/lib/select2/js/select2.min.js"></script>

@endsection

@section('subview')

    <div class="slim-mainpanel">
        <div class="container">
            <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">الخطط</li>
                </ol>
                <h6 class="slim-pagetitle">الخطط (الخطة الاولي هي الخطة الرئيسية للمستخدمين الجدد)</h6>
            </div><!-- slim-pageheader -->

            <div class="section-wrapper">
                <?php if(true):?>
                <label class="section-title">
                    <a class="btn btn-primary mg-b-6" href="{{url("admin/plans/save")}}"> جديد <i class="fa fa-plus"></i></a>
                </label>
                 <?php endif; ?>
                <p class="mg-b-20 mg-sm-b-40"></p>

                <div class="table-wrapper">
                    <?php if(is_array($results->all()) && count($results->all())): ?>

                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p"><span>#</span></th>
                            <th class="wd-15p"><span>الصورة</span></th>
                            <th class="wd-20p"><span>الإسم</span></th>
                            <th class="wd-20p"><span>السعر</span></th>
                            <th class="wd-20p"><span>عدد الايام</span></th>
                            <th class="wd-20p"><span>عدد العروض</span></th>
                            <th class="wd-15p"><span>نشط ؟</span></th>
                            <th class="wd-15p"><span>العملية</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($results as $key => $item): ?>
                        <tr id="row{{$item->plan_id}}">
                            <td>
                                {{$key+1}}
                            </td>
                            <td>
                                <img src="{{get_image_or_default($item->plan_image_path)}}-50,50" width="50" height="50">
                            </td>
                            <td>
                                {{$item->plan_name}}
                            </td>
                            <td>
                                {{number_format($item->price, 2)}}
                            </td>
                            <td>
                                {{$item->num_of_days}}
                            </td>
                            <td>
                                <?php if($item->offers_number == -1): ?>
                                    <span>غير محدود</span>
                                    <?php else : ?>
                                    {{$item->offers_number}}
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($key > 0): ?>
                                    <?php
                                        echo generate_multi_accepters(
                                            $accepturl              = "",
                                            $item_obj               = $item,
                                            $item_primary_col       = "plan_id",
                                            $accept_or_refuse_col   = "is_active",
                                            $model                  = 'App\models\plans\plan_m',
                                            $accepters_data         =
                                                [
                                                    "1"             => "<i class='fa fa-check'></i>",
                                                    "0"             => "<i class='fa fa-times'></i>"
                                                ]
                                        );
                                    ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a class="btn btn-primary mg-b-6" href="{{url("admin/plans/save/$item->plan_id")}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <?php if($key > 0): ?>
                                <a href='#confirmModal'
                                   data-toggle="modal"
                                   data-effect="effect-super-scaled"
                                   class="btn btn-danger mg-b-6 modal-effect confirm_remove_item"
                                   data-tablename="App\models\plans\plan_m"
                                   data-deleteurl="{{url("/admin/plans/delete")}}"
                                   data-itemid="{{$item->plan_id}}">
                                    <i class="fa fa-remove"></i>
                                </a>
                                <?php endif;?>
                            </td>
                        </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>

                    <?php else : ?>

                    @include('admin.components.no_results_found')

                    <?php endif; ?>
                </div><!-- table-wrapper -->
            </div><!-- section-wrapper -->

        </div><!-- container -->
    </div><!-- slim-mainpanel -->

@endsection

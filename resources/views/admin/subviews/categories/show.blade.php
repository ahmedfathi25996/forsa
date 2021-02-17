@extends('admin.main_layout')

@section('additional_css')

    <link href="{{url("/")}}/public/admin/lib/datatables/css/jquery.dataTables.css" rel="stylesheet">
    <link href="{{url("/")}}/public/admin/lib/jquery-ui/css/jquery-ui.css" rel="stylesheet">

@endsection

@section('additional_js')

    <script src="{{url("/")}}/public/admin/lib/datatables/js/jquery.dataTables.js"></script>
    <script src="{{url("/")}}/public/admin/lib/datatables-responsive/js/dataTables.responsive.js"></script>
    <script src="{{url("/")}}/public/admin/lib/jquery-ui/js/jquery-ui.js"></script>

@endsection

@section('subview')

    <div class="slim-mainpanel">
        <div class="container">
            <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">الاقسام</li>
                </ol>
                <h6 class="slim-pagetitle">الاقسام</h6>
            </div><!-- slim-pageheader -->

            <div class="section-wrapper">
                <label class="section-title">
                    <a class="btn btn-primary mg-b-6" href="{{url("admin/category/save_cat/$cat_type")}}"> جديد <i class="fa fa-plus"></i></a>
                </label>
                <p class="mg-b-20 mg-sm-b-40"></p>

                <div class="table-wrapper">

                    <?php if(is_array($results) && count($results)): ?>

                    <table id="datatable2" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p"><span>#</span></th>
                            <th class="wd-15p"><span>الصورة</span></th>
                            <th class="wd-15p"><span>الإسم</span></th>
                            <th class="wd-15p"><span>اخفاء؟</span></th>
                            <th class="wd-15p"><span>الترتيب</span></th>
                            <th class="wd-15p"><span>العملية</span></th>
                        </tr>
                        </thead>
                        <tbody id="sortable">
                        <?php foreach ($results as $key => $item): ?>
                        <tr id="row{{$item->cat_id}}" data-fieldname="cat_order"
                            data-itemid="<?= $item->cat_id ?>" data-tablename="App\models\category\category_m">
                            <td>
                                {{$key+1}}
                            </td>
                            <td>
                                <img src="{{get_image_or_default($item->small_img_path)}}-50,50" width="50" height="50">
                            </td>
                            <td>
                                {{$item->cat_name}}
                            </td>

                            <td>
                                <?php
                                echo generate_multi_accepters(
                                    $accepturl              = "",
                                    $item_obj               = $item,
                                    $item_primary_col       = "cat_id",
                                    $accept_or_refuse_col   = "hide_cat",
                                    $model                  = 'App\models\category\category_m',
                                    $accepters_data         =
                                        [
                                            "1"             => "<i class='fa fa-check'></i>",
                                            "0"             => "<i class='fa fa-times'></i>"
                                        ]
                                );
                                ?>
                            </td>
                            <td>
                                {{$item->cat_order + 1}}
                            </td>
                            <td>

                                <a class="btn btn-primary mg-b-6" href="{{url("admin/category/save_cat/$item->cat_type/$item->cat_id")}}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href='#confirmModal'
                                   data-toggle="modal"
                                   data-effect="effect-super-scaled"
                                   class="btn btn-danger mg-b-6 modal-effect confirm_remove_item"
                                   data-tablename="App\models\category\category_m"
                                   data-deleteurl="{{url("/admin/category/delete_cat")}}"
                                   data-itemid="{{$item->cat_id}}">
                                    <i class="fa fa-remove"></i>
                                </a>

                            </td>
                        </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>

                    @include("admin.components.cat_btn_order")

                    <?php else : ?>

                    @include('admin.components.no_results_found')

                    <?php endif; ?>

                </div><!-- table-wrapper -->
            </div><!-- section-wrapper -->

        </div><!-- container -->
    </div><!-- slim-mainpanel -->

@endsection

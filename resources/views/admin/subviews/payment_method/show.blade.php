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
                    <li class="breadcrumb-item active" aria-current="page">وسائل الدفع</li>
                </ol>
                <h6 class="slim-pagetitle">وسائل الدفع</h6>
            </div><!-- slim-pageheader -->

            <div class="section-wrapper">

                <p class="mg-b-20 mg-sm-b-40"></p>

                <div class="table-wrapper">
                    <?php if(is_array($results->all()) && count($results->all())): ?>

                        <table id="datatable1" class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p"><span>#</span></th>
                                    <th class="wd-15p"><span>الصورة</span></th>
                                    <th class="wd-20p"><span>الإسم</span></th>
                                    <th class="wd-20p"><span>نشط ؟</span></th>
                                    <th class="wd-15p"><span>العملية</span></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($results as $key => $item): ?>
                            <tr id="row{{$item->payment_method_id}}">
                                <td>
                                    {{$key+1}}
                                </td>
                                <td>
                                    <img src="{{get_image_or_default($item->payment_image_path)}}-50,50" width="50" height="50">
                                </td>
                                <td>
                                    {{$item->payment_method_name}}
                                </td>
                                <td>
                                    <?php
                                    echo generate_multi_accepters(
                                        $accepturl              = "",
                                        $item_obj               = $item,
                                        $item_primary_col       = "payment_method_id",
                                        $accept_or_refuse_col   = "is_active",
                                        $model                  = 'App\models\payment_method\payment_method_m',
                                        $accepters_data         =
                                            [
                                                "1"             => "<i class='fa fa-check'></i>",
                                                "0"             => "<i class='fa fa-times'></i>"
                                            ]
                                    );
                                    ?>
                                </td>
                                <td>
                                    <a class="btn btn-primary mg-b-6" href="{{url("admin/payment_methods/save/$item->payment_method_id")}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
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

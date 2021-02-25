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

                    <li class="breadcrumb-item active" aria-current="page"> تحويلات المحفظة</li>
                </ol>
                <h6 class="slim-pagetitle"> المحفظة</h6>
            </div><!-- slim-pageheader -->

            <div class="section-wrapper">
                <p class="mg-b-20 mg-sm-b-40"></p>

                <div class="table-wrapper">

                    <?php if(is_array($results->all()) && count($results->all())): ?>

                    <table id="datatable2" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p"><span>#</span></th>
                            <th class="wd-15p"><span>الصورة</span></th>
                            <th class="wd-15p"><span>من</span></th>
                            <th class="wd-15p"><span>الى</span></th>
                            <th class="wd-15p"><span>القيمة</span></th>
                            <th class="wd-15p"><span>قيمة ل</span></th>
                        </tr>
                        </thead>
                        <tbody id="sortable">
                        <?php foreach ($results as $key => $item): ?>
                        <tr id="row{{$item->wallet_trans_id}}" data-fieldname="wallet_trans_id"
                        >
                            <td>
                                {{$key+1}}
                            </td>
                            <td>
                                <img src="{{get_image_or_default($item->wallet_image_path)}}-50,50" width="50" height="50">
                            </td>
                            <td>
                                {{$item->from_date}}
                            </td>
                            <td>
                                {{$item->to_date}}
                            </td>
                            <td>
                                {{$item->value}}
                            </td>
                            <td>
                                <button type="button" class="btn btn-secondary support-message-seen"
                                        data-toggle="popover"
                                        data-container="body"
                                        data-popover-color="primary" data-placement="top"
                                        data-content="{{$item->value_for}}">
                                    <span>مشاهدة</span>
                                </button>

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

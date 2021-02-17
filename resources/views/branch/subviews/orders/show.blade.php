@extends('branch.main_layout')

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
                    <li class="breadcrumb-item"><a href="{{url("branch/dashboard")}}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">الطلبات</li>
                </ol>
                <h6 class="slim-pagetitle">الطلبات</h6>
            </div><!-- slim-pageheader -->

            <div class="section-wrapper">
                <?php if(true):?>
                <label class="section-title">
                    <a class="btn btn-primary mg-b-6" href="{{url("branch/orders/save")}}"> جديد <i class="fa fa-plus"></i></a>
                </label>
                <?php endif; ?>
                <p class="mg-b-20 mg-sm-b-40"></p>

                <div class="table-wrapper">

                    <?php if(is_array($results->all()) && count($results->all())): ?>

                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p"><span>#</span></th>
                            <th class="wd-15p"><span>رقم الطلب</span></th>
                            <th class="wd-15p"><span>اسم المستخدم</span></th>
                            <th class="wd-15p"><span>عنوان العرض</span></th>
                            <th class="wd-15p"><span>المبلغ المستخدم من المحفظة</span></th>
                            <?php if(false):?>
                            <th class="wd-15p"><span>العملية</span></th>
                            <?php endif;?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($results as $key => $item): ?>
                        <tr id="row{{$item->order_id}}">
                            <td>
                                {{$key+1}}
                            </td>

                            <td>
                                {{$item->order_id}}
                            </td>
                            <td>
                                {{$item->full_name}}
                            </td>

                            <td>
                                {{$item->offer_title}}
                            </td>

                            <td>
                                {{$item->money_used_from_wallet}}
                            </td>
                            <?php if(false):?>
                            <td>

                                <a class="btn btn-primary mg-b-6" href="{{url("branch/offers/save/$item->branch_offer_id")}}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href='#confirmModal'
                                   data-toggle="modal"
                                   data-effect="effect-super-scaled"
                                   class="btn btn-danger mg-b-6 modal-effect confirm_remove_item"
                                   data-tablename="App\models\branches\branches_offers_m"
                                   data-deleteurl="{{url("/branch/offers/delete")}}"
                                   data-itemid="{{$item->branch_offer_id}}">
                                    <i class="fa fa-remove"></i>
                                </a>

                            </td>
                            <?php endif;?>
                        </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>

                    <?php else : ?>

                    @include('branch.components.no_results_found')

                    <?php endif; ?>
                </div><!-- table-wrapper -->
            </div><!-- section-wrapper -->

        </div><!-- container -->
    </div><!-- slim-mainpanel -->

@endsection

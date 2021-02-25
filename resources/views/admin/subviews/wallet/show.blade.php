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
                    <li class="breadcrumb-item active" aria-current="page"> المحفظة</li>
                </ol>
                <h6 class="slim-pagetitle"> المحفظة</h6>
            </div><!-- slim-pageheader -->

            <div class="section-wrapper">
                <?php
                $get_wallet = \App\models\wallet_history_m::where("doctor_id",$doctor_id)->where("is_done",0)->whereNull("deleted_at")->first();
                ?>
                @if(is_object($get_wallet))
                <label class="section-title">
                    <a class="btn btn-primary mg-b-6" href="{{url("admin/wallet_transaction/doctors/$doctor_id/save")}}"> تحويل </a>
                </label>
                @endif
                <p class="mg-b-20 mg-sm-b-40"></p>

                <div class="table-wrapper">

                    <?php if(is_array($results->all()) && count($results->all())): ?>

                    <table id="datatable2" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p"><span>#</span></th>
                            <th class="wd-15p"><span>الاسم</span></th>
                            <th class="wd-15p"><span>الايميل</span></th>
                            <th class="wd-15p"><span>القيمة</span></th>
                            <th class="wd-15p"><span>قيمة ل</span></th>
                            <th class="wd-15p"><span>الحالة</span></th>
                        </tr>
                        </thead>
                        <tbody id="sortable">
                        <?php foreach ($results as $key => $item): ?>
                        <tr id="row{{$item->wallet_id}}" data-fieldname="wallet_id"
                            >
                            <td>
                                {{$key+1}}
                            </td>
                            <td>
                                {{$item->username}}
                            </td>
                            <td>
                                {{$item->email}}
                            </td>
                            <td>
                                {{$item->value}}
                            </td>
                            <td>
                                {{$item->value_for}}
                            </td>
                            <td>

                               @if($item->is_done == 0)
                                   <span style="color: #7f500c">لم يتم التحويل</span>
                                   @else
                                    <span style="color: #0cca4a"> تم التحويل</span>
                                @endif

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

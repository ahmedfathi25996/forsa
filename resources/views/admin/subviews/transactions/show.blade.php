@extends('admin.main_layout')

@section('additional_css')

    <link href="{{url("/")}}/public/admin/lib/datatables/css/jquery.dataTables.css" rel="stylesheet">
    <link href="{{url("/")}}/public/admin/lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="{{url("/")}}/public/admin/lib/bootstrap-datetimepicker2/bootstrap-datetimepicker.css" rel="stylesheet">

@endsection

@section('additional_js')

    <script src="{{url("/")}}/public/admin/lib/datatables/js/jquery.dataTables.js"></script>
    <script src="{{url("/")}}/public/admin/lib/datatables-responsive/js/dataTables.responsive.js"></script>
    <script src="{{url("/")}}/public/admin/lib/select2/js/select2.min.js"></script>
    <script src="{{url("/")}}/public/admin/lib/bootstrap-datetimepicker2/bootstrap-datetimepicker.min.js"></script>
    <script src="{{url("/")}}/public/admin/lib/moment/js/moment.js"></script>
    <script src="{{url("/")}}/public/admin/lib/jquery-ui/js/jquery-ui.js"></script>

@endsection

@section('subview')

    <div class="slim-mainpanel">
        <div class="container">
            <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">التحويلات</li>
                </ol>
                <h6 class="slim-pagetitle">التحويلات</h6>
            </div><!-- slim-pageheader -->


            <div class="section-wrapper">

                <form id="save_form" action="{{url("admin/transactions")}}" method="GET" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-12">

                            <p class="mg-b-20 mg-sm-b-40"></p>

                            <div class="row">

                                <?php

                                    $normal_tags            =
                                        [
                                            "from", "to"
                                        ];

                                    $attrs                    = generate_default_array_inputs_html(
                                        $fields_name          = $normal_tags,
                                        $data                 = $search_data,
                                        $key_in_all_fields    = "yes",
                                        $required             = "",
                                        $grid_default_value   = 4
                                    );

                                    $attrs[0]["from"]           = " تاريخ من ";
                                    $attrs[0]["to"]             = "تاريخ الي ";

                                    $attrs[3]["from"]           = "date";
                                    $attrs[3]["to"]             = "date";

                                    echo
                                    generate_inputs_html(
                                        reformate_arr_without_keys($attrs[0]),
                                        reformate_arr_without_keys($attrs[1]),
                                        reformate_arr_without_keys($attrs[2]),
                                        reformate_arr_without_keys($attrs[3]),
                                        reformate_arr_without_keys($attrs[4]),
                                        reformate_arr_without_keys($attrs[5]),
                                        reformate_arr_without_keys($attrs[6])
                                    );
                                    echo
                                    generate_select_tags(
                                        $field_name         = "transaction_type",
                                        $label_name         =  "نوع التحويل ؟",
                                        $text               = ['الكل','دفع','إرجاع'],
                                        $values             = ['','paid','refund'],
                                        $selected_value     = "",
                                        $class              = "form-control",
                                        $multiple           = "",
                                        $required           = "",
                                        $disabled           = "",
                                        $data               = $search_data ,
                                        $grid               = "col-md-2"
                                    );

                                ?>

                                <div>
                                    <input id="submit" type="submit" value="بحث" class="btn btn-primary bd-0 btn-search-date">
                                </div>

                            </div>

                        </div>
                    </div>

                </form>

                <p class="mg-b-20 mg-sm-b-40"></p>

                <div class="table-wrapper">
                    <?php if(is_array($results->all()) && count($results->all())): ?>

                        <table id="datatable2" class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p"><span>#</span></th>
                                    <th class="wd-15p"><span>اسم المستخدم</span></th>
                                    <th class="wd-20p"><span>رقم الطلب</span></th>
                                    <th class="wd-20p"><span>الكمية</span></th>
                                    <th class="wd-20p"><span>الوصف</span></th>
                                    <th class="wd-20p"><span>نوع وسيلة الدفع</span></th>
                                    <th class="wd-20p"><span>اسم وسيلة الدفع</span></th>
                                    <th class="wd-20p"><span>نوع التحويل</span></th>
                                    <th class="wd-20p"><span>التاريخ</span></th>
                                    <th class="wd-15p"><span>العملية</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($results as $key => $item): ?>
                                    <tr id="row{{$item->transaction_id}}">
                                        <td>
                                            {{$key+1}}
                                        </td>
                                        <td>
                                            <a href="{{url("admin/users/profile/$item->user_id")}}">{{$item->full_name}}</a>
                                        </td>
                                        <td>
                                            <a href="{{url("admin/orders/get/$item->order_id")}}">{{$item->order_id}}</a>

                                        </td>
                                        <td>
                                            <?php
                                            echo number_format($item->amount,2);
                                            ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-secondary"
                                                    data-toggle="popover"
                                                    data-container="body"
                                                    data-popover-color="primary" data-placement="top"
                                                    data-content="{{$item->description}}">
                                                <span>مشاهدة</span>
                                            </button>
                                        </td>
                                        <td>
                                            {{$item->payment_type}}
                                        </td>

                                        <td>
                                            {{$item->payment_method_name}}
                                        </td>


                                        <td>
                                            {{$item->transaction_type}}
                                        </td>

                                        <td>
                                            {{$item->created_at}}
                                        </td>

                                        <td>
                                            <a href='#confirmModal'
                                               data-toggle="modal"
                                               data-effect="effect-super-scaled"
                                               class="btn btn-danger mg-b-6 modal-effect confirm_remove_item"
                                               data-tablename="App\models\transactions_m"
                                               data-deleteurl="{{url("/admin/transactions/$item->order_id/delete")}}"
                                               data-itemid="{{$item->transaction_id}}">
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
            </div><!-- section-wrapper -->

        </div><!-- container -->
    </div><!-- slim-mainpanel -->

@endsection

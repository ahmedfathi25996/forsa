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
                    <li class="breadcrumb-item active" aria-current="page">رسائل الدعم</li>
                </ol>
                <h6 class="slim-pagetitle">رسائل الدعم</h6>
            </div><!-- slim-pageheader -->
            <form id="save_form" action="{{url("admin/support_messages")}}" enctype="multipart/form-data">

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
                                    $data                 = $request_data,
                                    $key_in_all_fields    = "yes",
                                    $required             = "required",
                                    $grid_default_value   = 4
                                );

                                $attrs[0]["from"]    = " من ";
                                $attrs[3]["from"]    = "date";
                                $attrs[0]["to"]      = " الي ";
                                $attrs[3]["to"]      = "date";



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


                            ?>

                            <div>
                                <input id="submit" type="submit" value="بحث" class="btn btn-primary bd-0 btn-search-date">
                            </div>

                        </div>

                    </div>
                </div>

            </form>

            <div class="section-wrapper">

                <p class="mg-b-20 mg-sm-b-40"></p>

                <div class="table-wrapper">

                <?php if(is_array($results->all()) && count($results->all())): ?>
                    <table id="datatable2" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-15p"><span>#</span></th>
                                <th class="wd-20p"><span>الاسم</span></th>
                                <th class="wd-20p"><span>رقم الهاتف</span></th>
                                <th class="wd-20p"><span>البريد الالكتروني</span></th>
                                <th class="wd-20p"><span>التاريخ</span></th>
                                <th class="wd-20p"><span>الرسالة</span></th>
                                <th class="wd-15p"><span>العملية</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($results as $key => $item): ?>
                                <?php if($item->is_seen == 1): ?>
                                    <tr id="row{{$item->id}}">
                                        <?php else: ?>
                                            <tr id="row{{$item->id}}" class="support-message-seen">
                                 <?php endif; ?>
                                <td>
                                    {{$key+1}}
                                </td>

                                <td>
                                    {{$item->full_name}}
                                </td>
                                <td>
                                    {{$item->phone}}
                                </td>
                                <td>
                                    {{$item->email}}
                                </td>
                                <td>
                                    {{$item->created_at}}
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary support-message-seen"
                                            data-toggle="popover"
                                            data-container="body"
                                            data-id ="{{$item->id}}"
                                            data-is-seen ="{{$item->is_seen}}"
                                            data-popover-color="primary" data-placement="top"
                                            title="{{$item->full_name}}"
                                            data-content="{{$item->message}}">
                                        <span>مشاهدة</span>
                                    </button>

                                </td>

                                <td>

                                    <a href='#confirmModal'
                                       data-toggle="modal"
                                       data-effect="effect-super-scaled"
                                       class="btn btn-danger mg-b-6 modal-effect confirm_remove_item"
                                       data-tablename="App\models\support_messages_m"
                                       data-deleteurl="{{url("/admin/support_messages/delete")}}"
                                       data-itemid="{{$item->id}}">
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

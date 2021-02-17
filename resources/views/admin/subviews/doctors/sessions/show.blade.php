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
                    <li class="breadcrumb-item active" aria-current="page">الجلسات</li>
                </ol>
                <h6 class="slim-pagetitle">الجلسات</h6>
            </div><!-- slim-pageheader -->

            <div class="section-wrapper">

                <p class="mg-b-20 mg-sm-b-40"></p>

                <div class="table-wrapper">

                    <?php if(is_array($results->all()) && count($results->all())): ?>

                    <table id="datatable2" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p"><span>#</span></th>
                            <th class="wd-15p"><span>تاريخ الجلسة</span></th>
                            <th class="wd-15p"><span>الوقت من</span></th>
                            <th class="wd-15p"><span>الوقت إلى</span></th>
                            <th class="wd-15p"><span>محجوزة؟</span></th>
                            <th class="wd-15p"><span>مفعل ؟</span></th>
                            <th class="wd-15p"><span>العملية</span></th>
                        </tr>
                        </thead>
                        <tbody id="sortable">
                        <?php foreach ($results as $key => $item): ?>
                        <tr id="row{{$item->session_id}}" data-fieldname="social_order"
                            data-itemid="<?= $item->session_id ?>" data-tablename="App\models\doctors\doctors_sessions_m">
                            <td>
                                {{$key+1}}
                            </td>
                            <td>
                                {{$item->session_date}}
                            </td>

                            <td>
                                {{$item->time_from}}
                            </td>

                            <td>
                                {{$item->time_to}}
                            </td>
                            <td>
                               @if($item->is_booked)
                                    <span>الجلسة محجوزة</span>
                               @else
                                    <span>غير محجوزة</span>
                               @endif
                            </td>
                            <td>
                                <?php
                                echo generate_multi_accepters(
                                    $accepturl              = "",
                                    $item_obj               = $item,
                                    $item_primary_col       = "session_id",
                                    $accept_or_refuse_col   = "is_verified_by_admin",
                                    $model                  = 'App\models\doctors\doctors_sessions_m',
                                    $accepters_data         =
                                        [
                                            "1"             => "<i class='fa fa-check'></i>",
                                            "0"             => "<i class='fa fa-times'></i>"
                                        ]
                                );
                                ?>
                            </td>
                            <td>

                                <a class="btn btn-primary mg-b-6" href="{{url("admin/doctors/$doctor_id/sessions/save/$item->session_id")}}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href='#confirmModal'
                                   data-toggle="modal"
                                   data-effect="effect-super-scaled"
                                   class="btn btn-danger mg-b-6 modal-effect confirm_remove_item"
                                   data-tablename="App\models\doctors\doctors_sessions_m"
                                   data-deleteurl="{{url("/admin/doctors/$doctor_id/sessions/delete")}}"
                                   data-itemid="{{$item->session_id}}">
                                    <i class="fa fa-remove"></i>
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

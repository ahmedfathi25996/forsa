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
                            <th class="wd-15p"><span> يوم الجلسة</span></th>
                            <th class="wd-15p"><span>الوقت من</span></th>
                            <th class="wd-15p"><span>الوقت إلى</span></th>
                            <th class="wd-15p"><span>العملية</span></th>
                        </tr>
                        </thead>
                        <tbody id="sortable">
                        <?php foreach ($results as $key => $item): ?>
                        <tr id="row{{$item->session_id}}" data-fieldname="social_order"
                            data-itemid="<?= $item->session_id ?>" data-tablename="App\models\doctors\new_doctors_sessions_m">
                            <td>
                                {{$key+1}}
                            </td>
                            <td>
                                {{$item->session_day}}
                            </td>

                            <td>
                                {{$item->time_from}}
                            </td>

                            <td>
                                {{$item->time_to}}
                            </td>

                            <td>

                                <a class="btn btn-primary mg-b-6" href="{{url("admin/doctors/$doctor_id/sessions/save/$item->session_id")}}">
                                    <i class="fa fa-edit"></i>
                                </a>


                            </td>
                        </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                        {{$results->links()}}

                    <?php else : ?>

                    @include('admin.components.no_results_found')

                    <?php endif; ?>

                </div><!-- table-wrapper -->
            </div><!-- section-wrapper -->

        </div><!-- container -->
    </div><!-- slim-mainpanel -->

@endsection

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
                    <li class="breadcrumb-item active" aria-current="page">الحجوزات</li>
                </ol>
                <h6 class="slim-pagetitle">الحجوزات</h6>
            </div><!-- slim-pageheader -->

            <div class="section-wrapper">

                <p class="mg-b-20 mg-sm-b-40"></p>

                <div class="table-wrapper">

                    <?php if(is_array($results->all()) && count($results->all())): ?>

                    <table id="datatable2" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p"><span>#</span></th>
                            <th class="wd-15p"><span> تاريخ الجلسة</span></th>
                            <th class="wd-15p"><span>الوقت من</span></th>
                            <th class="wd-15p"><span>الوقت إلى</span></th>
                            <th class="wd-15p"><span>حالة الدفع</span></th>
                        </tr>
                        </thead>
                        <tbody id="sortable">
                        <?php foreach ($results as $key => $item): ?>
                        <tr id="row{{$item->book_id}}" data-fieldname="social_order"
                            data-itemid="<?= $item->book_id ?>" data-tablename="App\models\doctors\new_doctors_sessions">
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
                                @if($item->is_paid == 0)
                                    <span>لم يتم الدفع</span>
                                @else
                                    <span>تم الدفع</span>
                                @endif
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

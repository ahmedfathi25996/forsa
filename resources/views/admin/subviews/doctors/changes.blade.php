@extends('admin.main_layout')

@section('additional_css')

    <link href="{{url("/")}}/public/admin/lib/datatables/css/jquery.dataTables.css" rel="stylesheet">
    <link href="{{url("/")}}/public/admin/lib/jquery-ui/css/jquery-ui.css" rel="stylesheet">

@endsection

@section('additional_js')

    <script src="{{url("/")}}/public/admin/lib/jquery-ui/js/jquery-ui.js"></script>
    <script src="{{url("/")}}/public/admin/lib/datatables/js/jquery.dataTables.js"></script>
    <script src="{{url("/")}}/public/admin/lib/datatables-responsive/js/dataTables.responsive.js"></script>

@endsection

@section('subview')

    <div class="slim-mainpanel">
        <div class="container">
            <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">الرئيسية</a></li>
                </ol>
                <h6 class="slim-pagetitle">التعديلات</h6>
            </div><!-- slim-pageheader -->

            <div class="section-wrapper">
                <label class="section-title">
                    <form id="save_form" action="{{url("admin/doctor/approve/$doctor_id")}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <input id="submit" type="submit" value="Approve" class="btn btn-primary bd-0">
                    </form>
                </label>
                <p class="mg-b-20 mg-sm-b-40"></p>

                <div class="table-wrapper">

                    <?php if(is_array($results->all()) && count($results->all())): ?>

                    <table id="datatable2" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p"><span>#</span></th>
                            <th class="wd-15p"><span>الإسم</span></th>
                            <th class="wd-15p"><span>الايميل</span></th>
                            <th class="wd-15p"><span>التليفون</span></th>
                            <th class="wd-15p"><span>السن</span></th>
                            <th class="wd-15p"><span>النوع</span></th>
                        </tr>
                        </thead>
                        <tbody id="sortable">
                        <?php foreach ($results as $key => $item): ?>
                        <tr id="row{{$item->doctor_id}}">
                            <td>
                                {{$key+1}}
                            </td>
                            <td>
                                {{$item->temp_username}}
                            </td>
                            <td>
                                {{$item->temp_email}}
                            </td>
                            <td>
                                {{$item->temp_mobile_number}}
                            </td>
                            <td>
                                {{$item->temp_age}}
                            </td>
                            <td>
                                {{$item->temp_gender}}
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

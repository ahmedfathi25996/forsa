@extends('admin.main_layout')

@section('additional_css')

    <link href="{{url("/")}}/public/admin/lib/datatables/css/jquery.dataTables.css" rel="stylesheet">

@endsection

@section('additional_js')

    <script src="{{url("/")}}/public/admin/lib/datatables/js/jquery.dataTables.js"></script>
    <script src="{{url("/")}}/public/admin/lib/datatables-responsive/js/dataTables.responsive.js"></script>

@endsection

@section('subview')

    <div class="slim-mainpanel">
        <div class="container">
            <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">المدن</li>
                </ol>
                <h6 class="slim-pagetitle">المدن</h6>
            </div><!-- slim-pageheader -->

            <div class="section-wrapper">
                <label class="section-title">
                    <a class="btn btn-primary mg-b-6" href="{{url("admin/cityList/save")}}"> جديد <i class="fa fa-plus"></i></a>
                </label>
                <p class="mg-b-20 mg-sm-b-40"></p>

                <div class="table-wrapper">
                    <?php if(is_array($results->all()) && count($results->all())): ?>

                        <table id="datatable1" class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p"><span>#</span></th>
                                    <th class="wd-15p"><span>الإسم</span></th>
                                    <th class="wd-15p"><span>العملية</span></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($results as $key => $item): ?>
                                <tr id="row{{$item->city_id}}">
                                    <td>
                                        {{$key+1}}
                                    </td>
                                    <td>
                                        <a href="{{url("admin/districtList/$item->city_id")}}">
                                            {{$item->city_name}}
                                        </a>
                                    </td>
                                    <td>

                                        <a class="btn btn-primary mg-b-6" href="{{url("admin/cityList/save/$item->city_id")}}">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a href='#confirmModal'
                                           data-toggle="modal"
                                           data-effect="effect-super-scaled"
                                           class="btn btn-danger mg-b-6 modal-effect confirm_remove_item"
                                           data-tablename="App\models\city\city_list_m"
                                           data-deleteurl="{{url("/admin/cityList/delete")}}"
                                           data-itemid="{{$item->city_id}}">
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
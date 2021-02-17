@extends('admin.main_layout')

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
                    <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">اللغات</li>
                </ol>
                <h6 class="slim-pagetitle">اللغات</h6>
            </div><!-- slim-pageheader -->

            <div class="section-wrapper">
                <label class="section-title">
                    <a class="btn btn-primary mg-b-6" href="{{url("admin/langs/save")}}"> جديد <i class="fa fa-plus"></i></a>
                </label>
                <p class="mg-b-20 mg-sm-b-40"></p>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-15p"><span>#</span></th>
                                <th class="wd-15p"><span>الصورة</span></th>
                                <th class="wd-20p"><span>الإسم</span></th>
                                <th class="wd-15p"><span>العملية</span></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($results as $key => $item): ?>
                            <tr id="row{{$item->lang_id}}">
                                <td>
                                    {{$key+1}}
                                </td>
                                <td>
                                    <img src="{{get_image_or_default($item->lang_img_path)}}-50,50" width="50" height="50">
                                </td>
                                <td>
                                    {{$item->lang_text}}
                                </td>
                                <td>

                                    <a class="btn btn-primary mg-b-6" href="{{url("admin/langs/save/$item->lang_id")}}">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <?php if($key > 0): ?>
                                        <a href='#confirmModal'
                                           data-toggle="modal"
                                           data-effect="effect-super-scaled"
                                           class="btn btn-danger mg-b-6 modal-effect confirm_remove_item"
                                           data-tablename="App\models\langs_m"
                                           data-deleteurl="{{url("/admin/langs/delete")}}"
                                           data-itemid="{{$item->lang_id}}">
                                            <i class="fa fa-remove"></i>
                                        </a>
                                    <?php endif; ?>

                                </td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- section-wrapper -->

        </div><!-- container -->
    </div><!-- slim-mainpanel -->

@endsection

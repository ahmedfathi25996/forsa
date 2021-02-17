@extends('admin.main_layout')

@section('additional_css')

    <link href="{{url("/")}}/public/admin/lib/jquery.steps/css/jquery.steps.css" rel="stylesheet">

@endsection

@section('additional_js')

    <script src="{{url("/")}}/public/admin/lib/jquery.steps/js/jquery.steps.js"></script>
    <script src="{{url("/")}}/public/admin/lib/parsleyjs/js/parsley.js"></script>

@endsection

@section('subview')

    <?php

    $header_text           = "جديد";
    $doc_spe_id        = "";
    $required_sign         = ' <span style="color: red;font-weight: bold;">*</span>';

    if (is_object($item_data)) {
        $header_text            = $item_data->spe_title;
        $doc_spe_id         = $item_data->doc_spe_id;
    }

    ?>

    <div class="slim-mainpanel">
        <div class="container">
            <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="{{url("admin/doctors/$doctor_id/spec")}}">التخصصات</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$header_text}}</li>
                </ol>
                <h6 class="slim-pagetitle">التخصصات</h6>
            </div><!-- slim-pageheader -->

            <div class="section-wrapper">
                <label class="section-title">
                    <a class="btn btn-primary mg-b-6" href="{{url("admin/doctors/$doctor_id/spec/save")}}"> جديد <i class="fa fa-plus"></i></a>
                </label>
                <p class="mg-b-20 mg-sm-b-40"></p>

                <div class="table-wrapper">

                    <form id="save_form" action="{{url("admin/doctors/$doctor_id/spec/save/$doc_spe_id")}}" method="POST" enctype="multipart/form-data">

                        <div class="row">

                            <div class="col-md-12">
                                <div class="section-wrapper mg-t-20">

                                    <label class="section-title">البيانات الأساسية</label>
                                    <p class="mg-b-20 mg-sm-b-40"></p>

                                    <div class="row">

                                        <?php
                                        echo generate_select_tags(
                                            'spe_id',
                                            'اختار التخصص',
                                            collect($specialites)->pluck('title')->all(),
                                            collect($specialites)->pluck('spe_id')->all(),
                                            "",
                                            $class="form-control select_2_class",
                                            $multiple="",
                                            $required="",
                                            $disabled = "",
                                            $data = $item_data,
                                            $grid = "col-md-6",
                                            $hide_label=false,
                                            $remove_multiple = false
                                        );

                                        ?>

                                    </div>

                                </div>

                            </div>

                        </div>

                        {{csrf_field()}}

                        <div class="form-layout-footer">
                            <input id="submit" type="submit" value="حفظ" class="btn btn-primary bd-0">
                        </div>

                    </form>

                </div><!-- table-wrapper -->
            </div><!-- section-wrapper -->

        </div><!-- container -->
    </div><!-- slim-mainpanel -->

@endsection




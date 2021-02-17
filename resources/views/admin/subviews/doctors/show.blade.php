@extends('admin.main_layout')

@section('additional_css')

    <link href="{{url("/")}}/public/admin/lib/jquery-ui/css/jquery-ui.css" rel="stylesheet">

@endsection

@section('additional_js')

    <script src="{{url("/")}}/public/admin/lib/jquery-ui/js/jquery-ui.js"></script>

@endsection

@section('subview')

    <div class="slim-mainpanel">
        <div class="container">
            <div class="manager-header">
                <div class="slim-pageheader">
                    <ol class="breadcrumb slim-breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">الاطباء</li>
                    </ol>
                    <h6 class="slim-pagetitle">الاطباء</h6>
                </div><!-- slim-pageheader -->
                <a id="contactNavicon"  href="" class="contact-navicon"><i class="icon ion-navicon-round"></i></a>
            </div><!-- manager-header -->

            <div class="manager-wrapper">

                <div class="manager-right">

                    <?php if(is_array($results->all()) && count($results->all())): ?>

                    <div class="row row-sm" id="sortable">

                        <?php foreach ($results as $key => $item): ?>

                        @include('admin.subviews.doctors.components.user_block')

                        <?php endforeach; ?>

                    </div>

                    <?php else : ?>

                    @include('admin.components.no_results_found')

                    <?php endif; ?>

                </div><!-- manager-right -->

                <div class="manager-left">

                    <a href="{{url("admin/doctors/save")}}" class="btn btn-contact-new">جديد</a>


                </div><!-- manager-left -->

            </div><!-- manager-wrapper -->

        </div><!-- container -->
    </div><!-- slim-mainpanel -->

@endsection

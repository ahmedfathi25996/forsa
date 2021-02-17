<?php
    $user_id = \Illuminate\Support\Facades\Auth::user()->user_id;
    $branch_id = 0;
    $branch = \App\models\branches\branch_m::where('user_id',Auth::user()->user_id)->first();
    if(is_object($branch))
    {
        $branch_id = $branch->branch_id;

    }

?>
<div class="slim-sidebar">
    <label class="sidebar-label"></label>

    <ul class="nav nav-sidebar">

        <li class="sidebar-nav-item">
            <a href="{{url("branch/dashboard")}}" class="sidebar-nav-link"><i class="icon ion-ios-home-outline"></i> الرئيسية</a>
        </li>

        <li class="sidebar-nav-item">
            <a href="{{url("branch/branches")}}" class="sidebar-nav-link"><i class="icon ion-paperclip"></i>بيانات الفرع</a>
        </li>

        <li class="sidebar-nav-item">
            <a href="{{url("branch/offers/?branch_id=$branch_id")}}" class="sidebar-nav-link"><i class="icon ion-paperclip"></i>العروض </a>
        </li>

        <li class="sidebar-nav-item">
            <a href="{{url("branch/working_days/?branch_id=$branch_id")}}" class="sidebar-nav-link"><i class="icon ion-paperclip"></i>ايام العمل</a>
        </li>

        <li class="sidebar-nav-item">
            <a href="{{url("branch/orders/?branch_id=$branch_id")}}" class="sidebar-nav-link"><i class="icon ion-paperclip"></i>الطلبات</a>
        </li>

        <li class="sidebar-nav-item">
            <a href="{{url("branch/qrcode/?branch_id=$branch_id")}}" class="sidebar-nav-link"><i class="icon ion-paperclip"></i>QR Code</a>
        </li>


    </ul>
</div><!-- slim-sidebar -->

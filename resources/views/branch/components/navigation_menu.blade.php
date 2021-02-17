<?php
$user_id = \Illuminate\Support\Facades\Auth::user()->user_id;
$branch_id = 0;
$branch = \App\models\branches\branch_m::where('user_id',$user_id)->first();
if(is_object($branch))
{
    $branch_id = $branch->branch_id;

}

?>
<div class="slim-navbar">
    <div class="container">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{url("/branch/dashboard")}}">
                    <i class="icon ion-ios-home-outline"></i>
                    <span>الرئيسية</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{url("branch/branches")}}">
                    <i class="icon ion-paperclip"></i>
                    <span>بيانات الفرع</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="{{url("branch/offers/?branch_id=$branch_id")}}">
                    <i class="icon ion-paperclip"></i>
                    <span>العروض</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{url("branch/working_days/?branch_id=$branch_id")}}">
                    <i class="icon ion-paperclip"></i>
                    <span>ايام العمل</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{url("branch/orders/?branch_id=$branch_id")}}">
                    <i class="icon ion-paperclip"></i>
                    <span>الطلبات</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{url("branch/qrcode/?branch_id=$branch_id")}}">
                    <i class="icon ion-paperclip"></i>
                        <span>QR Code</span>
                </a>
            </li>

        </ul>
    </div><!-- container -->
</div><!-- slim-navbar -->

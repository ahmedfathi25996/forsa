<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Basic Communication</title>
    <link rel="stylesheet" href="{{url("/")}}/public/assets/common.css" />
</head>
<body class="agora-theme">
<div class="navbar-fixed">
    <nav class="agora-navbar">
        <div class="nav-wrapper agora-primary-bg valign-wrapper">
            <h5 class="left-align">Basic Communication</h5>
            <a href="https://github.com/AgoraIO/Basic-Video-Call/tree/master/One-to-One-Video/Agora-Web-Tutorial-1to1" class="agora-github-pin"></a>
        </div>
    </nav>
</div>
<form id="form" class="row col l12 s12" action="{{url("video/$channel_name/$appid/$token")}}" method="GET" enctype="multipart/form-data">
    <div class="row container col l12 s12">
        <div class="col" style="min-width: 433px; max-width: 443px">
            <div class="card" style="margin-top: 0px; margin-bottom: 0px;">
                <div class="row card-content" style="margin-bottom: 0px;">
                    <input type="submit" value="session">

                </div>
            </div>
        </div>

    </div>
</form>
<script src="{{url("/")}}/public/vendor/jquery.min.js"></script>
<script src="{{url("/")}}/public/vendor/materialize.min.js"></script>
<script src="{{url("/")}}/public/assets/AgoraRTCSDK.js"></script>
</html>

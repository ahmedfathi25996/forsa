<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="">
    <meta name="author" content="{{site_data['name']}}">

    <title>{{site_data['name']}} | تسجيل الدخول</title>

    <link rel="shortcut icon" href="{{get_image_or_default(site_data['icon_path'])}}" type="image/x-icon">

    <!-- vendor css -->
    <link href="{{url("/")}}/public/admin/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{url("/")}}/public/admin/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="{{url("/")}}/public/admin/lib/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">

    <!-- Slim CSS -->
    <link rel="stylesheet" href="{{url("/")}}/public/admin/css/slim.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="{{url("/")}}/public/css/toastr.css">

</head>
<body>

@include('global_components.hidden_inputs')

@include('global_components.toastr_msg')



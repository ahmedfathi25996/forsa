<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="{{site_data['name']}}">
    <meta name="description" content="{{site_data['name']}}">
    <meta name="author" content="{{site_data['name']}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{site_data['name']}}</title>

    <!-- favicon icon -->
    <link rel="shortcut icon" href="{{get_image_or_default(site_data['icon_path'])}}">

    <!-- inject css start -->

    <!--== bootstrap -->
    <link href="{{url("/")}}/public/front/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!--== animate -->
    <link href="{{url("/")}}/public/front/css/animate.css" rel="stylesheet" type="text/css">

    <!--== fontawesome -->
    <link href="{{url("/")}}/public/front/css/fontawesome-all.css" rel="stylesheet" type="text/css">

    <!--== line-awesome -->
    <link href="{{url("/")}}/public/front/css/line-awesome.min.css" rel="stylesheet" type="text/css">

    <!--== magnific-popup -->
    <link href="{{url("/")}}/public/front/css/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!--== owl-carousel -->
    <link href="{{url("/")}}/public/front/css/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css">

    <!--== base -->
    <link href="{{url("/")}}/public/front/css/base.css" rel="stylesheet" type="text/css">

    <!--== shortcodes -->
    <link href="{{url("/")}}/public/front/css/shortcodes.css" rel="stylesheet" type="text/css">

    <!--== default-theme -->
    <link href="{{url("/")}}/public/front/css/style.css" rel="stylesheet" type="text/css">

    <!--== responsive -->
    <link href="{{url("/")}}/public/front/css/responsive.css" rel="stylesheet" type="text/css">

    <!--== color-customizer -->
    <link href="#" data-style="styles" rel="stylesheet">
    <link href="{{url("/")}}/public/front/css/color-customize/color-customizer.css" rel="stylesheet" type="text/css">

    <!-- inject css end -->

    <!-- Toastr -->
    <link rel="stylesheet" href="{{url("/")}}/public/css/toastr.css">

</head>

<body>

@include('global_components.hidden_inputs')

@include('global_components.toastr_msg')



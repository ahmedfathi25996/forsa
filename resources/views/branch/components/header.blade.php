<!DOCTYPE html>
<html dir="{{(config('locale') == "en")?"ltr":"rtl"}}" data-dark_mode="{{config('dark_mode')}}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{$meta_title}}</title>

    <link rel="shortcut icon" href="{{get_image_or_default(site_data['icon_path'])}}" type="image/x-icon">

    <!-- vendor css -->
    <link href="{{url("/")}}/public/admin/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{url("/")}}/public/admin/lib/Ionicons/css/ionicons.css" rel="stylesheet">

    <!-- Custom general CSS -->
    <link rel="stylesheet" href="{{url("/")}}/public/admin/lib/jquery-toggles/css/toggles-full.css">

    <!-- Custom general CSS -->
    <link rel="stylesheet" href="{{url("/")}}/public/admin/css/custom.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="{{url("/")}}/public/css/toastr.css">

    <!-- other includes -->
    @yield('additional_css')


    <!-- Fonts CSS -->
    <link rel="stylesheet" href="{{url("/")}}/public/admin/css/slim_fonts.css">

    <!-- Slim CSS -->
    <link rel="stylesheet" href="{{url("/")}}/public/admin/css/slim.css">

    <!-- active below to enable dark mode -->
    <?php if(config('dark_mode') == "on"): ?>
        <link rel="stylesheet" href="{{url("/")}}/public/admin/css/slim.one.css">
    <?php endif; ?>

    <script src="{{url("/")}}/public/admin/lib/jquery/js/jquery.js"></script>

</head>
<body>

    @include("branch.components.navigation_header")

    <?php if(config('menu_display') == "navbar"): ?>
        @include("branch.components.navigation_menu")
    <?php endif; ?>

    @include('global_components.hidden_inputs')

    @include('global_components.toastr_msg')

    <?php if($current_user->user_id == 1): ?>
        @include('branch.components.update_is_available')
        @include('branch.components.modals.confirm_update_version_modal')
    <?php endif; ?>

    @include('branch.components.modals.confirm_modal')
    @include('branch.components.modals.thanks_modal')
    @include('branch.components.modals.errors_modal')
    @include('branch.components.circle_spinner')
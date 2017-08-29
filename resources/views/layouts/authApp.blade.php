<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name') }} | Tutor DashBoard </title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- END META -->
    <!-- http://felicianoprochera.com/simple-task-app-with-laravel-5-3-and-vuejs/ -->

    <!-- BEGIN STYLESHEETS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/bootstrap.css?1422792965') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/font-awesome.min.css?1422792965') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/materialadmin.css?1425466319') }}" />
    @yield('specifiedCss')
    <!-- END STYLESHEETS -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1403934957"></script>
    <script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1403934956"></script>
    <![endif]-->
</head>
<body class="menubar-hoverable header-fixed  menubar-pin">

<!-- BEGIN HEADER-->
@include('includes.authHeader');
<!-- END HEADER-->

<!-- BEGIN BASE-->
<div id="base">
    <!-- BEGIN OFFCANVAS LEFT -->
    <div class="offcanvas"></div>
    <!-- END OFFCANVAS LEFT -->

    <!-- BEGIN CONTENT-->
    <div id="content" >
        @yield('content')
    </div>
    <!-- END CONTENT -->

    <!-- BEGIN MENUBAR-->
    @include('includes.authMenu')
    <!-- END MENUBAR -->

    <!-- BEGIN OFFCANVAS RIGHT -->
    @include('includes.authOffcanvas')
    <!-- END OFFCANVAS RIGHT -->

</div>
<!-- END BASE -->

<!-- BEGIN JAVASCRIPT -->
<script src="{{ asset('/js/libs/jquery/jquery-1.11.2.min.js') }}"></script>
{{--<script src="{{ asset('/js/app.js') }}"></script>--}}
<script src="{{ asset('/js/libs/jquery/jquery-migrate-1.2.1.min.js') }}"></script>
<script src="{{ asset('/js/libs/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/libs/spin.js/spin.min.js') }}"></script>
<script src="{{ asset('/js/libs/autosize/jquery.autosize.min.js') }}"></script>
<script src="{{ asset('/js/libs/nanoscroller/jquery.nanoscroller.min.js') }}"></script>
<script src="{{ asset('/js/libs/jquery-knob/jquery.knob.js') }}"></script>
<script src="{{ asset('/js/core/source/App.js') }}"></script>
<script src="{{ asset('/js/core/source/AppNavigation.js') }}"></script>
<script src="{{ asset('/js/core/source/AppOffcanvas.js') }}"></script>
<script src="{{ asset('/js/core/source/AppCard.js') }}"></script>
<script src="{{ asset('/js/core/source/AppForm.js') }}"></script>
<script src="{{ asset('/js/core/source/AppNavSearch.js') }}"></script>
<script src="{{ asset('/js/core/source/AppVendor.js') }}"></script>
<script src="{{ asset('/js/core/demo/Demo.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {
       $.get('/offer/bar_notification').done(function (data) {
           $('#offer').text(data);
       }).fail(function () {
           $('#offer').text('error');
       });
       $.get('/bar_notification').done(function (data) {
           $('#secretInfo').text(data);
       }).fail(function () {
           $('#secretInfo').text('error');
       });

       // offer notification button click event
        $('#offerButton').click(function () {

            var show = $('#offerNotification');
            show.html('loading');
            var result = '';
            $.get('/offer/drop_notification').done(function (data) {
                if (data.length == 0) {
                    result += '<li>No notification<li>';
                } else {
                    $.each(data, function () {
                        result +='<li><a style="display: inline-block;" class="alert alert-callout alert-warning" href="">';
                        result +='<strong> Job ID - <span id="jobId"> ' + this.offer_id + '</span> </strong><br/>';
                        result += '<small  class="text-light"> post at ' + this.created_at + '</small>';
                        result += '</a></li>';
                    });
                }
                show.html(result);
            }).fail(function () {
                alert('server error');
            });
        });

       // tutor or admin notification button click event
        $('#NotificatonButton').click(function () {

            var show = $('#AdminNotification');
            result = 'loading';
            var result = '';
            $.get('/drop_notification').done(function (data) {
                if (data.length == 0) {
                    result += '<li>No notification<li>';
                } else {
                    $.each(data, function () {
                        result +='<li><a style="display: inline-block;" class="alert alert-callout alert-warning" href="">';
                        result +='<strong> Job ID - <span id="jobId"> ' + this.offer_id + '</span> </strong><br/>';
                        result += '<small  class="text-light"> post at ' + this.created_at + '</small>';
                        result += '</a></li>';
                    });
                }
                show.html(result);
            }).fail(function () {
                alert('server error');
            });
        });
    });

</script>
@yield('specifiedJs')
<!-- END JAVASCRIPT -->

</body>
</html>

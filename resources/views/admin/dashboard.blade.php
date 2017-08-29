@extends('layouts.authApp')

@section('specifiedCss')
    <style>
        .panel_icon > i{
            font-size: 59px;
            margin-top: 10%;
            color: #c9caca;
        }
    </style>

@endsection()

@section('content')
    <section>
        <div class="section-body">
            <div class="row">
                <!-- BEGIN ALERT - Tutor's -->
                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-body no-padding">
                            <div class="alert alert-callout alert-primary no-margin">
                                <strong class="pull-right text-lg panel_icon"><i class="fa fa-user-secret"></i></strong>
                                <strong class="text-xl">8749</strong><br/>
                                <span class="opacity-75">Tutors</span>
                            </div>
                        </div><!--end .card-body -->
                    </div><!--end .card -->
                </div><!--end .col -->
                <!-- END ALERT - tutor -->

                <!-- BEGIN ALERT - Offers's -->
                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-body no-padding">
                            <div class="alert alert-callout alert-primary no-margin">
                                <strong class="pull-right text-lg panel_icon"><i class="fa fa-briefcase"></i></strong>
                                <strong class="text-xl">8749</strong><br/>
                                <span class="opacity-75">Active Offers</span>
                            </div>
                        </div><!--end .card-body -->
                    </div><!--end .card -->
                </div><!--end .col -->
                <!-- END ALERT - offers -->

                <!-- BEGIN ALERT - Offers's -->
                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-body no-padding">
                            <div class="alert alert-callout alert-primary no-margin">
                                <strong class="pull-right text-lg panel_icon"><i class="fa fa-map-marker"></i></strong>
                                <strong class="text-xl">8749</strong><br/>
                                <span class="opacity-75">Location's</span>
                            </div>
                        </div><!--end .card-body -->
                    </div><!--end .card -->
                </div><!--end .col -->
                <!-- END ALERT - offers -->

                <!-- BEGIN ALERT - Offers's -->
                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-body no-padding">
                            <div class="alert alert-callout alert-primary no-margin">
                                <strong class="pull-right text-lg panel_icon"><i class="fa fa-line-chart"></i></strong>
                                <strong class="text-xl">98%</strong><br/>
                                <span class="opacity-75">Hired Tutor</span>
                            </div>
                        </div><!--end .card-body -->
                    </div><!--end .card -->
                </div><!--end .col -->
                <!-- END ALERT - offers -->

            </div><!--end .row -->
            <div class="row">

                <!-- BEGIN SITE ACTIVITY -->
                <div class="col-md-9">
                    <div class="card ">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card-head">
                                    <header>Site activity</header>
                                </div><!--end .card-head -->
                                <div class="card-body height-8">
                                    <div id="flot-visitors-legend" class="flot-legend-horizontal stick-top-right no-y-padding"></div>
                                    <div id="flot-visitors" class="flot height-7" data-title="Activity entry" data-color="#7dd8d2,#0aa89e"></div>
                                </div><!--end .card-body -->
                            </div><!--end .col -->
                            <div class="col-md-4">
                                <div class="card-head">
                                    <header>Today's stats</header>
                                </div>
                                <div class="card-body height-8">
                                    <strong>214</strong> members
                                    <span class="pull-right text-success text-sm">0,18% <i class="md md-trending-up"></i></span>
                                    <div class="progress progress-hairline">
                                        <div class="progress-bar progress-bar-primary-dark" style="width:43%"></div>
                                    </div>
                                    756 pageviews
                                    <span class="pull-right text-success text-sm">0,68% <i class="md md-trending-up"></i></span>
                                    <div class="progress progress-hairline">
                                        <div class="progress-bar progress-bar-primary-dark" style="width:11%"></div>
                                    </div>
                                    291 bounce rates
                                    <span class="pull-right text-danger text-sm">21,08% <i class="md md-trending-down"></i></span>
                                    <div class="progress progress-hairline">
                                        <div class="progress-bar progress-bar-danger" style="width:93%"></div>
                                    </div>
                                    32,301 visits
                                    <span class="pull-right text-success text-sm">0,18% <i class="md md-trending-up"></i></span>
                                    <div class="progress progress-hairline">
                                        <div class="progress-bar progress-bar-primary-dark" style="width:63%"></div>
                                    </div>
                                    132 pages
                                    <span class="pull-right text-success text-sm">0,18% <i class="md md-trending-up"></i></span>
                                    <div class="progress progress-hairline">
                                        <div class="progress-bar progress-bar-primary-dark" style="width:47%"></div>
                                    </div>
                                </div><!--end .card-body -->
                            </div><!--end .col -->
                        </div><!--end .row -->
                    </div><!--end .card -->
                </div><!--end .col -->
                <!-- END SITE ACTIVITY -->

                <!-- BEGIN SERVER STATUS -->
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-head">
                            <header class="text-primary">Latest status</header>
                        </div><!--end .card-head -->

                        <div class="card-body height-4 no-padding">
                            <div class="stick-bottom-left-right">
                                <div id="rickshawGraph" class="height-4" data-color1="#0aa89e" data-color2="rgba(79, 89, 89, 0.2)"></div>
                            </div>
                        </div><!--end .card-body -->
                    </div><!--end .card -->
                </div><!--end .col -->
                <!-- END SERVER STATUS -->
            </div><!--end .row -->
        </div><!--end .section-body -->
    </section>
@endsection

@section('specifiedJs')

    <script src="{{ asset('/js/libs/moment/moment.min.js') }}"></script>
    <script src="{{ asset('/js/libs/flot/jquery.flot.min.js') }}"></script>
    <script src="{{ asset('/js/libs/flot/jquery.flot.time.min.js') }}"></script>
    <script src="{{ asset('/js/libs/flot/jquery.flot.resize.min.js') }}"></script

    <script src="{{ asset('/js/core/demo/DemoDashboard.js') }}"></script>
@endsection


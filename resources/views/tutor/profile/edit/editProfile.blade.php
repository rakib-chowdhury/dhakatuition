@extends('layouts.authApp')

@section('specifiedCss')
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/materialadmin.css?1425466319') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/select2.min.css?1425466319') }}" />
    <style>
        .alert.alert-callout:before {
            width: 2px;
        }
        .top_badge .card-body{
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.33);
            border-bottom: 1px solid #aaa;
        }
        .top_badge .top_badge_picture img{
            box-shadow: 0px 2px 6px #333;

        }
        .top_badge_discription h2{
            margin: 0;
        }
        .top_badge_discription em{
            margin: 0 8px 0 0;
        }
        .activity li a{
            padding: 10px 15px 10px 0px;
        }
        .alert{
            line-height: 14px;
            font-size: 14px;
        }
        .singleBlock{
            margin-bottom: 40px;
        }
    </style>
@endsection

@section('content')
    <section>
        {{--<div class="section-body contain-lg">--}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-tiles style-default-light">

                    <!-- BEGIN BLOG POST HEADER -->
                    <div class="row style-primary">
                        <div class="col-sm-9 top_badge  style-default-light">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-2 top_badge_picture">
                                        <img src="{{ asset('/images/profile.jpg') }}" alt="profile" class="img-responsive">
                                    </div>
                                    <div class="col-sm-10 top_badge_discription">
                                        <h2>{{ Auth::user()->first_name .' '.Auth::user()->last_name }}</h2>
                                        <h4 class="text-light">{{ Auth::user()->overview['title'] }}</h4>
                                        <div class="text-default-light">
                                            <em>Bangle</em>
                                            <em>English</em>
                                            <em>Math</em>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end .col -->
                        <div class="col-sm-3">
                            <div class="card-body">
                                <div class="hidden-xs">
                                    <h3 class="text-light"><strong>35</strong></h3>
                                    <em>Applied this month</em>
                                </div>
                            </div>
                        </div><!--end .col -->
                    </div><!--end .row -->
                    <!-- END BLOG POST HEADER -->

                    <div class="row">
                        <!-- BEGIN BLOG POST TEXT -->
                        <div class="col-md-9">
                            <article class="style-default-bright">
                                <!-- BEGIN LAYOUT OF FORM CONTENT WETH TAB -->
                                <div class="tabs-left style-default-light">
                                    <ul class="card-head nav nav-tabs text-center" data-toggle="tabs">
                                        <li class="active"><a href="#tutoring"><i class="fa fa-lg fa-leanpub"></i><br/><h4>Tutoring<br/><small>Tutoring Info</small></h4></a></li>
                                        <li class="educational"><a href="#education"><i class="fa fa-lg fa-certificate"></i><br/><h4>Education<br/><small>Educational Info</small></h4></a></li>
                                        <li class="personalInfo"><a href="#personal"><i class="fa fa-lg fa-file-text-o"></i><br/><h4>Personal<br/><small>Personal Info</small></h4></a></li>
                                        <li class="overview"><a href="#overView"><i class="fa fa-lg fa-star"></i><br/><h4>Personal<br/><small>Overview</small></h4></a></li>
                                    </ul>
                                    <div class="card-body tab-content style-default-bright">
                                        <div class="tab-pane active" id="tutoring">
                                            <h2><i class="fa fa-leanpub text-primary"></i> Tutoring Information</h2><hr>
                                            <div id="tutoringInfo"></div>
                                            @include('tutor.profile.edit.basicInfo')
                                        </div>
                                        <div class="tab-pane" id="education">
                                            <h2><i class="fa fa-leanpub text-primary"></i> Educational Information</h2><hr>
                                            <div id="educationalInfo"></div>
                                        </div>
                                        <div class="tab-pane" id="personal">
                                            <h2><i class="fa fa-file-text-o text-primary"></i> Personal Information</h2><hr>
                                            @include('tutor.profile.edit.personalInfo')
                                        </div>
                                        <div class="tab-pane" id="overView">
                                            <h2><i class="fa fa-star text-primary"></i> OverView</h2><hr>
                                            @include('tutor.profile.edit.personalOverview')
                                        </div>
                                    </div>
                                </div>
                                <!-- BEGIN LAYOUT OF FORM CONTENT WETH TAB -->
                            </article>
                        </div><!--end .col -->
                        <!-- END BLOG POST TEXT -->
                        <div class="col-md-3">
                            @include('includes.authRightbar')
                        </div>
                    </div><!--end .row -->
                </div><!--end .card -->
            </div><!--end .col -->
        </div><!--end .row -->
        {{--</div><!--end .section-body -->--}}
    </section>
@endsection

@section('specifiedJs')
    <script src="{{ asset('/js/select2.min.js') }}"></script>
    <script src="{{ asset('/js/tutoringInfo.js') }}"></script>
    <script src="{{ asset('/js/editBasicInfo.js') }}"></script>
    <script src="{{ asset('/js/editOverview.js') }}"></script>
    <script src="{{ asset('/js/editPersonalInfo.js') }}"></script>
    <script src="{{ asset('/js/editEducation.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(".dial").knob();
            var anotherClickCount = 0;
            $('#experienceCheckBox').click(function () {
                ++anotherClickCount;
                if (anotherClickCount%2 == 0)
                {
                    $('#experienceCheckinfo').css('display', 'none');
                } else {
                    $('#experienceCheckinfo').css('display', 'block');
                }
            });
            var clickCount = 0;
            $('#onlineCheckBox').click(function () {
                ++clickCount;
                if (clickCount%2 == 0)
                {
                    $('#onlineCheckInfo').css('display', 'none');
                } else {
                    $('#onlineCheckInfo').css('display', 'block');
                }
            });
        });
    </script>
@endsection
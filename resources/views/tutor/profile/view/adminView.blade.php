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
                                        <h4 class="text-light">Specialist at Both Bangla & English Medium</h4>
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
                                        </div>
                                        <div class="tab-pane" id="education">
                                            <h2><i class="fa fa-leanpub text-primary"></i> Educational Information</h2><hr>
                                            <div id="educationalInfo"></div>
                                        </div>
                                        <div class="tab-pane" id="personal">
                                            <h2><i class="fa fa-file-text-o text-primary"></i> Personal Information</h2><hr>
                                            <div id="personalInfo"></div>
                                        </div>
                                        <div class="tab-pane" id="overView">
                                            <h2><i class="fa fa-star text-primary"></i> OverView</h2><hr>
                                            <div id="overViewInfo"></div>
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
    <script>
        $(document).ready(function () {
            var tutor = '<?php echo $id ?>';
            $(".dial").knob();
            /*
             * basic info
             */
            $(window).load(function() {
                var display_results = $("#tutoringInfo");
                display_results.html("loading...");
                var results = '';
                $.get('/admin/tutor/' + tutor + '/profile/basic_info').done(function( data ) {
                    console.log(data);
                    if (data === undefined || !$.trim(data)) {
                        results += 'No basic Info data';
                    } else {
                        results +='<div class="singleBlock">';
                        results +='<div class="alert alert-callout alert-default"><b>Tutoring info</b> </div>';
                        results +='<div class=""> Medium </div>';
                        results +='<div class="">';
                        $.each(data.tutor_medium, function() {
                            results += this.medium.medium_category_name;
                        });
                        results +='</div>'; // end medium
                        results +='<div class=""> Classes </div>';
                        results +='<div class="">';
                        $.each(data.tutor_class, function() {
                            results += this.info_class.class_name;
                        });
                        results +='</div>'; // end classes
                        results +='<div class=""> Subjects </div>';
                        results +='<div class="">';
                        $.each(data.tutor_subject, function() {
                            results += this.subject.subject_name;
                        });
                        results +='</div>'; // end classes
                        results +='</div>'; // end info
                        results +='<div class="singleBlock">';
                        results +='<div class="alert alert-callout alert-default"><b>Tutoring Location</b> </div>';
                        results +='<div class=""> <b>Country :</b>' + data.country + '</div>';
                        results +='<div class=""> <b>Division :</b>' + data.district.name + '</div>';
                        results +='<div class=""> <b>District :</b>' + data.division.name + '</div>';
                        results +='<div class=""> <b>City/Upozilla :</b>' + data.location.name + '</div>';
                        results +='<div class=""> Preferred Location </div>';
                        results +='<div class="">';
                        $.each(data.preferred_location, function () {
                            results += this.location.name;
                        });
                        results +='</div>'; // end preferred location
                        results +='</div>'; // end info
                        results +='<div class="singleBlock">';
                        results +='<div class="alert alert-callout alert-default"><b>Tutoring Ability</b> </div>';
                        results +='<div class=""> <b>Days</b> </div>';
                        results +='<div class="">';
                        $.each(data.tutoring_days, function () {
                            results += this.days;
                        });
                        results +='</div>'; // end days
                        results +='<div class=""> <b>From :</b>' + data.available_from + ' - <b> To</b>' + data.available_to + '</div>';
                        results +='</div>'; // end info
                        results +='<div class="singleBlock">';
                        results +='<div class="alert alert-callout alert-default"><b>Tutoring Contact Number</b> </div>';
                        results +='<div class="">' + data.tutoring_contact_no + '</div>';
                        results +='</div>'; // end info
                        results +='<div class="singleBlock">';
                        results +='<div class="alert alert-callout alert-default"><b>Tutoring Experience</b> </div>';
                        results +='<div class=""> ';
                        if (data.experience !== null)
                        {
                            results += data.experience;
                        } else {
                            results +='No Experience';
                        }
                        results += '</div>';
                        results +='</div>'; // end info
                        results +='<div class="singleBlock">';
                        results +='<div class="alert alert-callout alert-default"><b>Tutoring Type</b> </div>';
                        results +='<div class=""> Tutoring in ';
                        results += (data.personal_tutoring ===1) ? ' <b> Personal </b> ':'';
                        results += (data.group_tutoring ===1) ? ' <b> Group</b> ':'';
                        results += (data.online_home ===1) ? ' <b> Online</b>':'';
                        results += '</div>';
                        results +='</div>'; // end info
                        results +='<div class="singleBlock">';
                        results +='<div class="alert alert-callout alert-default"><b>Tutoring Host</b> </div>';
                        results +='<div class=""> Like To ';
                        results += (data.student_home ===1) ? ' <b> Home</b> ':'';
                        results += (data.tutor_home ===1) ? ' <b> My Home</b> ':'';
                        results += (data.online_home ===1) ? ' <b> Online</b>':'';
                        results += ' <b> Tutoring</b>';
                        if (data.online_home === 1)
                        {
                            results += data.online_tutoring_info;
                        }
                        results += '</div>';
                        results +='</div>'; // end info
                        results +='<div class="singleBlock">';
                        results +='<div class="alert alert-callout alert-default"><b>Salary</b> </div>';
                        results +='<div class="">' + data.salary;
                        results += (data.salary_negotiable ===1) ? ' <b> It\'s May Negotiate</b>':'';
                        results += '</div>';
                        results +='</div>'; // end info
                    }

                    display_results.html(results);

                }).fail(function() {
                    alert( "error" );
                });
            });

            $('.educational').click(function () {
                var display_results = $("#educationalInfo");
                display_results.html("loading...");
                var results = '';
                $.get('/admin/tutor/'+ tutor +'/profile/education_info').done(function( data ) {
                    console.log(data);
                    if (data === undefined || !$.trim(data)) {
                        results += 'No  Info data';
                    } else {
                        $.each(data, function () {
                            results += '<div class="card">';
                            results += '<div class="card-head">';
                            results += '<header><h4><i class="fa fa-graduation-cap"></i><span class="small-padding">' + this.label + '</span></h4></header>';
                            results += '<div class="tools">';
                            results += '<div class="btn-group">';
                            results += '<a class="btn btn-icon-toggle btn-refresh text-info"><i class="fa fa-pencil"></i></a>';
                            results += '<a class="btn btn-icon-toggle btn-close text-danger"><i class="fa fa-trash"></i></a>';
                            results += '<a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>';
                            results += '</div>';
                            results += '</div>';
                            results += '</div>';
                            results += '<div class="card-body">';
                            results += '<div class="">';
                            results += '<b>Exam Title: </b>'+ this.exam_title +'with - ' + this.major;
                            results += '</div>';
                            results += '<div class="">';
                            results += '<b>From : </b>'+ this.from + ' To: ' + this.until;
                            results += '</div>';
                            results += '<div class="">';
                            results += '<b>Institute : </b>'+ this.institute + ' CGPA: ' + this.cGpa;
                            results += '</div>';
                            if(this.id_card !== null){
                                results += '<div class="">';
                                results += '<b>Id Number : </b>'+ this.id_card;
                                results += '</div>';
                            }
                            results += '<div class="">';
                            results += '<b>Passing Year : </b>'+ this.passed;
                            results += '</div>';
                            results += '<div class="">';
                            results += '<b>Passing Year : </b>'+ this.curriculum;
                            results += '</div>';
                            results += '</div>';
                            results += '</div>';
                        });
                    }
                    display_results.html(results);
                }).fail(function() {
                    alert( "error" );
                });
            });

            $('.personalInfo').click(function () {
                var display_results = $("#personal");
                display_results.html("loading...");
                var results = '';
                $.get('/admin/tutor/'+ tutor +'/profile/personal_info').done(function( data ) {
                    console.log(data);
                    if (!$.trim(data)) {
                        results += 'No  Info data';
                    } else {
                        results += '<div class="alert alert-callout alert-default"><b>Gender :</b> ' + data.gender + '</div>';
                        results += '<div class="alert alert-callout alert-default"><b>Marital Status :</b> ' + data.marital_status + '</div>';
                        results += '<div class="singleBlock">';
                        results += '<div class="alert alert-callout alert-default"><b>Location Info :</b></div>';
                        results += '<div class="row no-margin">';
                        results += '<div class="col-sm-3"><b>Country: </b> ' + data.country + '</div>';
                        results += '<div class="col-sm-3"><b>Division: </b> ' + data.division + '</div>';
                        results += '<div class="col-sm-3"><b>District: </b> ' + data.district + '</div>';
                        results += '<div class="col-sm-3"><b>Upazila/City: </b> ' + data.upazila + '</div>';
                        results += '<div class="col-sm-3"><b>ZipCode: </b> ' + data.zip_code + '</div>';
                        results += '<div class="col-sm-9"><b>Location: </b> ' + data.location + '</div>';
                        results += '</div>'; // end row
                        results += '</div>'; // end info
                        results += '<div class="singleBlock">';
                        results += '<div class="alert alert-callout alert-default"><b>Location Info :</b></div>';
                        if (data.id_card_type === 1){
                            $idType = 'National Card ';
                        } else if(data.id_card_type === 2){
                            $idType = 'Passport';
                        } else if(data.id_card_type === 3){
                            $idType = 'Birth Certificate ';
                        } else {
                            $idType = 'Driving Licence ';
                        }
                        results += '<div class="row no-margin">';
                        results += '<div class="col-sm-12"><b>'+ $idType +' Number: </b> ' + data.id_card_number + '</div>';
                        results += '<div class="col-sm-6"><b>Facebook Id: </b> ' + data.fb_link + '</div>';
                        if (data.linkdin_link !== null) {
                            results += '<div class="col-sm-6"><b>Linkdin Id: </b> ' + data.linkdin_link + '</div>';
                        }
                        results += '</div>'; // end row
                        results += '</div>'; // end info
                        results += '<div class="singleBlock">';
                        results += '<div class="alert alert-callout alert-default"><b>Parent Information :</b></div>';
                        results += '<div class="row no-margin">';
                        results += '<div class="col-sm-6"><b>Father Name: </b> ' + data.father_name + '</div>';
                        if (data.father_phone !== null) {
                            results += '<div class="col-sm-6"><b>Father Contact: </b> ' + data.father_phone + '</div>';
                        }
                        results += '<div class="col-sm-6"><b>Mother Name: </b> ' + data.mother_name + '</div>';
                        if (data.mother_phone !== null) {
                            results += '<div class="col-sm-6"><b>Mother Contact: </b> ' + data.mother_phone + '</div>';
                        }
                        results +='</div>'; // end row
                        results +='</div>'; // end info
                        results +='<div class="singleBlock">';
                        results +='<div class="alert alert-callout alert-default"><b>Emergency Contact Info :</b></div>';
                        results += '<div class="row no-margin">';
                        results +='<div class="col-sm-4"><b>Name: </b> ' + data.emergency_contact_name + '</div>';
                        results +='<div class="col-sm-4"><b>Relation: </b> ' + data.emergency_contact_relation + '</div>';
                        results +='<div class="col-sm-4"><b>Contact: </b> ' + data.emergency_contact_phone + '</div>';
                        results +='</div>'; // end row
                        results +='</div>'; // end info
                    }
                    display_results.html(results);
                }).fail(function() {
                    alert( "error" );
                });
            });

            $('.overview').click(function () {
                var display_results = $("#overViewInfo");
                display_results.html("loading...");
                var results = '';
                $.get('/admin/tutor/'+ tutor +'/profile/over_view').done(function( data ) {
                    console.log(data);
                    if (!$.trim(data)) {
                        results += 'No  Info data';
                    } else {
                        results += '<div class="singleBlock">';
                        results += '<div class="alert alert-callout alert-default"><b>Title :</b></div>';
                        results += '<div class="">' + data.title + '</div>';
                        results += '</div>'; // end info
                        results += '<div class="singleBlock">';
                        results += '<div class="alert alert-callout alert-default"><b>About Me:</b></div>';
                        results += '<div class="">' + data.over_view + '</div>';
                        results += '</div>'; // end info
                    }
                    display_results.html(results);
                }).fail(function() {
                    alert( "error" );
                });
            });

        });
    </script>
@endsection
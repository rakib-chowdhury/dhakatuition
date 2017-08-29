@extends('layouts.app')

@section('customCss')
    <link rel="stylesheet" href="{{ asset('/css/select2.min.css') }}">
    <style>
        .filter_button {
            margin-top: -25px;
        }

        .select2-container--default .select2-selection--single {
            border: 0px solid transparent;
        }

        .select2-results__option {
            padding: 0 15px;
        }

        .select2-search--dropdown .select2-search__field {
            padding: 0 4px;
        }

        #tutors {
            min-height: 300px;
        }
    </style>
@endsection

@section('content')
    <section class="tutorFilter">
        <div class="small-padding"></div>
        <div class="card alert alert-callout no-margin">
            <h3 align="center">About Us</h3>
        </div>
        <div class="col-md-12">
            <h2><?= $about_info->content?></h2>
        </div>
    </section>

    <section class="tutors">
        <div class="row">
            <div id="tutors"></div>
        </div>

    </section>
@endsection

@section('customJs')
    <script src="{{ asset('/js/select2.min.js') }}"></script>
    <script src="{{ asset('/js/coreData.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.selectbox').select2();
            $(window).load(function () {
                var showId = $('#tutors');
                showId.html('loading...');
                var results = '';
                $.get('/tutors_json').done(function (data) {
                    console.log(data);
                    if (!$.trim(data)) {
                        results += 'No  Info data';
                    } else {
                        $.each(data, function () {
                            results += '<article class="tutor card-body col-sm-6">';
                            results += '<div class="profilePic col-sm-4">';
                            results += '<img src="{{ asset('/images/profile.jpg') }}" class="img-responsive" alt="profile">';
                            results += '<div class="content">';

                            results += '</div>';
                            results += '</div>';
                            results += '<div class="profileContent col-sm-8">';
                            results += '<h4 class="title text-light">' + this.user.first_name + ' ' + this.user.last_name + '</h4>';
                            results += '<h5 class="name text-default"> <span class="text-primary">Is </span>' + this.user.overview.title + '</h5>';
                            results += '<div class="skills text-light">';
                            results += '<b class="text-primary"> Tutoring </b>';
                            $.each(this.tutor_subject, function () {
                                results += ' ' + '<em>' + this.subject.subject_name + '</em>';
                            });
                            results += '</div>';
                            results += '<div class="class text-bold">';
                            results += '<span class="text-primary">In</span>';
                            results += '<span class="text-default"> ';
                            $.each(this.tutor_class, function () {
                                results += this.info_class.class_name + ',';
                            });
                            results += '</span>';
                            results += '<span class="text-primary"> Students</span>';
                            results += '</div>';
                            results += '<div class="location">';
                            results += '<i class="fa fa-map-marker"></i>';
                            $.each(this.preferred_location, function () {
                                results += '<span> ' + this.location.name + ' </span>';
                            });
                            results += '</div>';
                            results += '</div>';
                            results += '</article>';
                        });
                    }
                    showId.html(results);
                }).fail(function () {
                    alert('server error');
                })
            });
            $('#offerFilter').click(function () {
                var showId = $('#tutors');
                showId.html('loading');
                var results = '';
                $.get('/tutors_filter').done(function (data) {
                    console.log(data);
                    if (!$.trim(data)) {
                        results += 'No  Info data';
                    } else {
                        $.each(data, function () {
                            results += '<article class="tutor card-body col-sm-6">';
                            results += '<div class="profilePic col-sm-4">';
                            results += '<img src="{{ asset('/images/profile.jpg') }}" class="img-responsive" alt="profile">';
                            results += '<div class="content">';

                            results += '</div>';
                            results += '</div>';
                            results += '<div class="profileContent col-sm-8">';
                            results += '<h4 class="title text-light">' + this.user.first_name + ' ' + this.user.last_name + '</h4>';
                            results += '<h5 class="name text-default"> <span class="text-primary">Is </span>' + this.user.overview.title + '</h5>';
                            results += '<div class="skills text-light">';
                            results += '<b class="text-primary"> Tutoring </b>';
                            $.each(this.tutor_subject, function () {
                                results += ' ' + '<em>' + this.subject.subject_name + '</em>';
                            });
                            results += '</div>';
                            results += '<div class="class text-bold">';
                            results += '<span class="text-primary">In</span>';
                            results += '<span class="text-default"> ';
                            $.each(this.tutor_class, function () {
                                results += this.info_class.class_name + ',';
                            });
                            results += '</span>';
                            results += '<span class="text-primary"> Students</span>';
                            results += '</div>';
                            results += '<div class="location">';
                            results += '<i class="fa fa-map-marker"></i>';
                            $.each(this.preferred_location, function () {
                                results += '<span> ' + this.location.name + ' </span>';
                            });
                            results += '</div>';
                            results += '</div>';
                            results += '</article>';
                        });
                    }
                    showId.html(results);
                }).fail(function () {
                    alert('server error');
                })
            });
        });
    </script>
@endsection
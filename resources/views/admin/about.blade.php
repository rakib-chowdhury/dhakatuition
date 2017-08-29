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
                <!-- BEGIN SITE ACTIVITY -->
                <div class="col-md-12">
                    <div class="card ">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-head">
                                    <header>About Us</header>
                                    <form method="post" action="{{url('admin/about/details')}}">
                                        {{csrf_field()}}
                                        <div class="col-md-12">
                                            <textarea id="summernote" name="summernote">{{$about->content}}</textarea>
                                        </div>
                                        <div class="col-sm-12 col-xs-12 form-group">
                                            <button style="height: 50px; font-size: 20px; margin-left: 400px" type="submit" class="btn btn-success label-btn">Submit</button>
                                        </div>
                                    </form>
                                </div><!--end .card-head -->

                            </div><!--end .col -->
                            <div class="col-md-4">

                            </div><!--end .col -->
                        </div><!--end .row -->
                    </div><!--end .card -->
                </div><!--end .col -->
                <!-- END SITE ACTIVITY -->

                <!-- BEGIN SERVER STATUS -->
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
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                width:1050,
                focus: true
            });
        });
    </script>
@endsection


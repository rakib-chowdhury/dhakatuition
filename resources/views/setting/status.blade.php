@extends('layouts.authApp')

@section('specifiedCss')
    <style>

        /* only for check box */
        .onoffswitch {
            position: relative; width: 90px;
            -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
        }
        .onoffswitch-checkbox {
            display: none;
        }
        .onoffswitch-label {
            display: block; overflow: hidden; cursor: pointer;
            border: 2px solid #1A8F89; border-radius: 20px;
        }
        .onoffswitch-inner {
            display: block; width: 200%; margin-left: -100%;
            transition: margin 0.3s ease-in 0s;
        }
        .onoffswitch-inner:before, .onoffswitch-inner:after {
            display: block; float: left; width: 50%; height: 30px; padding: 0; line-height: 30px;
            font-size: 14px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
            box-sizing: border-box;
        }
        .onoffswitch-inner:before {
            content: "BUSY";
            padding-left: 10px;
            background-color: #0AA89E; color: #FFFFFF;
        }
        .onoffswitch-inner:after {
            content: "FREE";
            padding-right: 10px;
            background-color: #EEEEEE; color: #999999;
            text-align: right;
        }
        .onoffswitch-switch {
            display: block; width: 27px; margin: 1.5px;
            background: #FFFFFF;
            position: absolute; top: 0; bottom: 0;
            right: 56px;
            border: 2px solid #1A8F89; border-radius: 20px;
            transition: all 0.3s ease-in 0s;
        }
        .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
            margin-left: 0;
        }
        .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
            right: 0px;
        }
    </style>
@endsection()

@section('content')
    <section>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-tiles style-default-light">
                    <div class="row">
                        <!-- BEGIN BLOG POST TEXT -->
                        <div class="col-md-9">
                            <article class="style-default-bright">
                                <div class="card-body">
                                    <div class="alert alert-callout">
                                        My Status
                                    </div>
                                    <form action="" class="form">
                                        <div class="onoffswitch">
                                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
                                            <label class="onoffswitch-label" for="myonoffswitch">
                                                <span class="onoffswitch-inner"></span>
                                                <span class="onoffswitch-switch"></span>
                                            </label>
                                        </div>
                                    </form>
                                </div>
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
    </section>
@endsection

@section('specifiedJs')
    <script>
        $(document).ready(function () {
            $(".dial").knob();
        });

    </script>
@endsection
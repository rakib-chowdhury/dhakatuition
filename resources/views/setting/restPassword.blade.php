@extends('layouts.authApp')

@section('specifiedCss')
    <style>
        .profileImage{
            margin: 15px 0 0 0;
            background: url("/../images/upload.png")no-repeat center;
            width: 300px;
            min-height: 300px;
            position: relative;
            z-index: 0;
            border: 1px dashed #b1b1b1;
            overflow: auto;
        }
        .profileImage::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
        }

        .profileImage::-webkit-scrollbar
        {
            width: 10px;
            background-color: #F5F5F5;
        }

        .profileImage::-webkit-scrollbar-thumb
        {
            background-color: #0aa89e;
            border: 2px solid #0bd8cd;
        }

        .profileImage input{
            position: absolute;
            top: 0%;
            left: 0%;
            z-index: 10;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }
        .profileImage img{
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
            width: 100%;
            height: 100%;
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
                                        Rest Password
                                    </div>
                                    <form action="{{ url('/reset_password') }}" class="form" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group {{ $errors->has('currentPass') ? 'has-error':'' }}">
                                            <input type="password" class="form-control" name="currentPass" id="currentPass">
                                            <label for="currentPass">Current Password</label>
                                            @include('errors.formValidateError', ['inputName' => 'currentPass'])
                                        </div>
                                        <div class="form-group {{ $errors->has('newPassword') ? 'has-error':'' }}">
                                            <input type="password" class="form-control" name="newPassword" id="newPassword">
                                            <label for="newPassword">New Password</label>
                                            @include('errors.formValidateError', ['inputName' => 'newPassword'])
                                        </div>
                                        <div class="form-group {{ $errors->has('newPassword') ? 'has-error':'' }}">
                                            <input type="password" class="form-control" name="newPassword_confirmation" id="confirmPassword">
                                            <label for="confirmPassword">Confirm Password</label>
                                            @include('errors.formValidateError', ['inputName' => 'newPassword'])
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="pull-right btn btn-primary ">Reset Password</button>
                                        </div>

                                    </form>
                                </div>
                                <div class="card-body">
                                    <div class="alert alert-callout">
                                        Input Profile Picture
                                    </div>
                                    <form action="{{ url('/'.(Auth::user()->role == 1)?'admin':'tutor'.'/reset_password') }}" class="form">
                                        <div class="row">
                                            <div class="form-group {{ $errors->has('profilePic') ? 'has-error':'' }} col-sm-8">
                                                <div class="profileImage">
                                                    <input type="file" name="profilePic" value="{{ old('profilePic') }} " accept=".jpeg, .jpg, .jpe, .jfif, .jif">
                                                    <img src="" alt="" width="200" style="display:none;">
                                                </div>
                                                <label for="profilePic">Click Bellow Botton To Upload Picture</label>
                                                @include('errors.formValidateError', ['inputName' => 'profilePic'])
                                            </div>
                                            <div class="col-sm-4 {{ $errors->has('profilePic') ? 'has-error':'' }}">
                                                <p><b>Type: </b> <span id="fileType"></span></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="pull-right btn btn-primary ">upload Profile</button>
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
        $(document).ready(function(){
            var _URL = window.URL || window.webkitURL;
            $('.profileImage input').change( function() {
                var file, img, containerWidth = 300, containerHeight = 300;
                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function() {
//                        alert(this.width + " " + this.height);
                        if (this.width > containerWidth){
                            $('.profileImage img').css('width',this.width);
                            $('.profileImage').css('width','100%');
                        }else {
                            $('.profileImage img').css('width','100%');
                            $('.profileImage').css('width',containerWidth);
                        }
                        if (this.height > containerHeight){
                            $('.profileImage').css('height',containerHeight);
                            $('.profileImage img').css('height',this.height);
                        }else {
                            $('.profileImage img').css('height','100%');
                            $('.profileImage').css('height','auto');
                        }
                        $('#fileType').html(this.type);
                    };
                    img.onerror = function() {
                        alert( "not a valid file: " + file.type);
                    };
                    var fileSrc =img.src = _URL.createObjectURL(file);
                    $(".profileImage img").fadeIn("fast").attr('src',fileSrc);
                }
            });
        });
    </script>
@endsection
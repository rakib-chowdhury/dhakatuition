@extends('layouts.app')

@section('customCss')
    <style>
        .loginPaddin {
            margin : 60px 0;
        }
    </style>
@endsection

@section('content')
    <div class="col-sm-6 loginPaddin">
        @include('includes.flashMessage')
        <div class="">
            <div class="card-header alert alert-callout alert-default">
                <span class="text-lg text-bold text-primary"><i class="fa fa-user-plus"></i><span class="small-padding">Sign Up Form</span></span>
            </div>
            <div class="card-body">
                <form class="form"  method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('firstName') ? ' has-error' : '' }}">
                        <input id="firstName" type="text" class="form-control" name="firstName" value="{{ old('firstName') }}" required autofocus>
                        <label for="firstName">First Name</label>
                        @include('errors.formValidateError',['inputName' => 'firstName'])
                    </div>
                    <div class="form-group {{ $errors->has('lastName') ? ' has-error' : '' }}">
                        <input id="lastName" type="text" class="form-control" name="lastName" value="{{ old('lastName') }}" required autofocus>
                        <label for="lastName">Last Name</label>
                        @include('errors.formValidateError',['inputName' => 'lastName'])
                    </div>
                    <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                        <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>
                        <label for="phone">Phone</label>
                        @include('errors.formValidateError',['inputName' => 'phone'])
                    </div>
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        <label for="email">Email</label>
                        @include('errors.formValidateError',['inputName' => 'email'])
                    </div>
                    <div class="form-group  {{ $errors->has('password') ? 'has-error':'' }}">
                        <input id="password" type="password" class="form-control" name="password" required>
                        <label for="password">Password</label>
                        @include('errors.formValidateError',['inputName' => 'password'])
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-error':'' }}">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        <label for="password-confirm">Confirm Password</label>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-xs-6 text-left form-group {{ $errors->has('policy') ? 'has-error':'' }}">
                            <div class="checkbox checkbox-inline checkbox-styled">
                                <label>
                                    <input type="checkbox" name="policy" value="1"> <span>Accept our <a href="#" class="text-primary">policy</a></span>
                                </label>
                            </div>
                            @include('errors.formValidateError',['inputName' => 'policy'])
                        </div><!--end .col -->
                        <div class="col-xs-6 text-right">
                            <button class="btn btn-primary btn-raised" type="submit">Sign Up</button>
                        </div><!--end .col -->
                    </div><!--end .row -->
                </form>
            </div>
        </div>

    </div><!--end .col -->

    <div class="col-sm-5 col-sm-offset-1 text-center loginPaddin">
        <div class="">
            <div class="card-body">
                <h3 class="text-light">
                    Register Before?
                </h3>
                <a class="btn btn-block btn-raised btn-primary" href={{ url('/login') }}>Sign-in here</a>
                <br><br>
                <h3 class="text-light">
                    or
                </h3>
                <p>
                    <a data-toggle="modal" data-target="#myModal" class="btn btn-block btn-raised btn-info"><i class="fa fa-facebook pull-left"></i>Login with Facebook</a>
                </p>
            </div>
        </div>
    </div><!--end .col -->
@include('includes.err_msg')
@endsection

@section('customJs')

@endsection

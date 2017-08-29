@extends('layouts.app')

@section('customCss')
    <style>
        .loginPaddin {
            margin : 80px 0;
        }
    </style>
@endsection

@section('content')
    <div class="col-sm-6 loginPaddin">
        @include('includes.flashMessage')
        <div class="">
            <div class="card-header alert alert-callout alert-default">
                <span class="text-lg text-bold text-primary"><i class="fa fa-sign-in"></i><span class="small-padding">Login</span></span>
            </div>
            <div class="card-body">
                <form class="form"  method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        <label for="email">Email</label>
                        @include('errors.formValidateError',['inputName' => 'email'])
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" class="form-control" name="password" required>
                        <label for="password">Password</label>
                        @include('errors.formValidateError',['inputName' => 'password'])
                        <p class="help-block"><a href="{{ url('/password/reset') }}">Forgotten?</a></p>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-xs-6 text-left">
                            <div class="checkbox checkbox-inline checkbox-styled">
                                <label>
                                    <input type="checkbox" name="remember"> <span>Remember me</span>
                                </label>
                            </div>
                        </div><!--end .col -->
                        <div class="col-xs-6 text-right">
                            <button class="btn btn-primary btn-raised" type="submit">Login</button>
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
                    No account yet?
                </h3>
                <a class="btn btn-block btn-raised btn-primary" href={{ url('/register') }}>Sign up here</a>
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

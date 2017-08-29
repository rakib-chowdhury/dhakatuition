@extends('layouts.authApp')

@section('specifiedCss')
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/materialadmin.css?1425466319') }}" />


@endsection()

@section('content')
    <section>
        Tutor Board
    </section>
@endsection

@section('specifiedJs')
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
@endsection


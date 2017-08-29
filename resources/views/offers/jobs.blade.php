@extends('layouts.authApp')

@section('specifiedCss')
    <link rel="stylesheet" href="{{ asset('/css/select2.min.css') }}">
    <style>
        .filter_button{
            margin-top: -25px;
        }
        .select2-container--default .select2-selection--single{
            border: 0px solid transparent;
        }
        .select2-results__option{
            padding: 0 15px;
        }
        .select2-search--dropdown .select2-search__field {
            padding: 0 4px;
        }
    </style>
@endsection

@section('content')
<section>
    @include('includes.flashMessage')
    <div class="card alert alert-callout  no-margin">
        <form action="" class="form form-inline">
            <div class="form-group"><b>Location</b>
                <select name="location" class="form-control selectbox" id="location">
                    <option value="1">Wyoming</option>
                    <option value="AL">Alabama</option>
                </select>
            </div>
            <div class="form-group"><b>Medium</b>
                <select name="medium" class="form-control selectbox" id="medium">
                    <option value="WY">Wyoming</option>
                    <option value="AL">Alabama</option>
                </select>
            </div>
            <div class="form-group"><b>Classes</b>
                <select name="classes" class="form-control selectbox" id="classes">
                    <option value="WY">Wyoming</option>
                    <option value="AL">Alabama</option>
                </select>
            </div>
            <div class="form-group"><b>Subject</b>
                <select name="subject" class="form-control selectbox" id="subject">
                    <option value="WY">Wyoming</option>
                    <option value="AL">Alabama</option>
                </select>
            </div>
            <div class="form-group"><b>Gender</b>
                <select name="subject" class="form-control selectbox" id="gender">
                    <option value="">Select</option>
                    <option value="any">Any</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-group pull-right filter_button">
                <button class="btn btn-primary" id="offerFilter">Filter Offers</button>
            </div>
        </form>
    </div>
    <div id="offers"></div>
</section>
@endsection

@section('specifiedJs')
    <script src="{{ asset('/js/coreData.js') }}"></script>
    <script src="{{ asset('/js/getAllOffers.js') }}"></script>
    <script src="{{ asset('/js/offerFilter.js') }}"></script>
    <script src="{{ asset('/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function () {
           $('.selectbox').select2();
        });
    </script>
@endsection
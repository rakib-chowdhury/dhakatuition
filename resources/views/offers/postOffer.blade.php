@extends('layouts.app')

@section('customCss')
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/select2.min.css?1425466319') }}" />
<style>

</style>
@endsection

@section('content')
    <article class="col-sm-8">
        <div class="offer_form card-body">
            <h2><i class="fa fa-hand-o-up text-primary"></i> Post Your Offer</h2><hr>
            <form action="{{ url('/offers_store') }}" class="form" method="post">
            {{ csrf_field() }}
            <!-- Gardian info
            !------------------------------------------->
                <div class="alert alert-callout alert-sm alert-default">
                    <b>Tuition Title</b>
                </div>
                <div class="form-group {{ $errors->has('') ? 'has-error':'' }}">
                    <input type="text" class="form-control" id="title" name="title" required>
                    <label for="title">Give a Title For Your Tuition (It max 100 letters)</label>
                </div>
                <div class="alert alert-callout alert-sm alert-default">
                    <b>Guardian Info</b>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group {{ $errors->has('firstName')? 'has-error':'' }}">
                            <input type="text" class="form-control" name="firstName" id="firstName" required>
                            <label for="firstName">First Name</label>
                            @include('errors.formValidateError',['inputName' => 'firstName'])
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group {{ $errors->has('lastName') ? 'has-error':'' }}">
                            <input type="text" class="form-control" name="lastName" id="lastName" required>
                            <label for="lastName">Last Name</label>
                            @include('errors.formValidateError',['inputName' => 'lastName'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group {{ $errors->has('phone') ? 'has-error':'' }}">
                            <input type="text" class="form-control" name="phone" id="phone" required>
                            <label for="phone">Phone Number</label>
                            @include('errors.formValidateError',['inputName' => 'phone'])
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group {{ $errors->has('relation') ? 'has-error':'' }}">
                            <input type="text" class="form-control" name="relation" id="relation" required>
                            <label for="relation">Relation with Student</label>
                            @include('errors.formValidateError',['inputName' => 'relation'])
                        </div>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error':'' }}">
                    <input type="text" class="form-control" name="email" id="email">
                    <label for="email">Email <span class="text-info">(if has)</span></label>
                    @include('errors.formValidateError',['inputName' => 'email'])
                </div>
                <!-- Student info
                !------------------------------------------->
                <div class="alert alert-callout alert-sm alert-default">
                    <b>Student Info</b>
                </div>
                <div class="form-group {{ $errors->has('studentAmount') ? 'has-error':'' }}">
                    <input type="text" class="form-control" name="studentAmount" id="studentAmount" required>
                    <label for="studentAmount">How Much Student Do You Want To Tutoring</label>
                    @include('errors.formValidateError',['inputName' => 'studentAmount'])
                </div>
                <div class="form-group {{ $errors->has('medium') ? 'has-error':'' }}">
                    <select class="form-control multiSelect" name="medium[]" id="medium"  multiple="multiple" required></select>
                    <label for="medium">Student Medium</label>
                    @include('errors.formValidateError',['inputName' => 'medium'])
                </div>
                <div class="form-group {{ $errors->has('Class') ? 'has-error':'' }}">
                    <select class="form-control multiSelect" name="Class[]" id="classDisplay" multiple="multiple" required></select>
                    <label for="classDisplay">Student Class</label>
                    @include('errors.formValidateError',['inputName' => 'Class'])
                </div>
                <div class="form-group {{ $errors->has('Subject') ? 'has-error':'' }}">
                    <select class="form-control multiSelect" name="Subject[]" id="subjectDisplay" multiple="multiple" required></select>
                    <label for="subjectDisplay">Student Subject</label>
                    @include('errors.formValidateError',['inputName' => 'Subject'])
                </div>
                <!-- Tutor info
                !------------------------------------------->
                <div class="alert alert-callout alert-sm alert-default">
                    <b>Tutor Info</b>
                </div>
                <div class="form-group {{ $errors->has('gender') ? 'has-error':'' }}">
                    <label for="">Tutor preference Gender </label><br>
                    <div class="radio radio-styled">
                        <label>
                            <input type="radio" name="gender" value="male" required>
                            <span>Male</span>
                        </label> &nbsp; &nbsp;&nbsp;&nbsp;
                        <label>
                            <input type="radio" name="gender" value="female">
                            <span>Female</span>
                        </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>
                            <input type="radio" name="gender" value="any">
                            <span>Any</span>
                        </label>
                        @include('errors.formValidateError',['inputName' => 'gender'])
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group {{ $errors->has('salary') ? 'has-error':'' }}">
                            <input type="text" class="form-control" name="salary" id="salary" required>
                            <label for="salary">Salary</label>
                            @include('errors.formValidateError',['inputName' => 'salary'])
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="checkbox checkbox-styled">
                            <label>
                                <input type="checkbox" value="1" name="negotiable">
                                <span>Negotiable</span>
                            </label>
                            @include('errors.formValidateError',['inputName' => 'negotiable'])
                        </div>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('days') ? 'has-error':'' }}">
                    <input type="text" class="form-control" id="days" name="days" required>
                    <label for="days">Days Per-week</label>
                    @include('errors.formValidateError',['inputName' => 'days'])
                </div>
                <!-- Locaiton info
                !------------------------------------------->
                <div class="alert alert-callout alert-sm alert-default">
                    <b>Location</b>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group {{ $errors->has('country') ? 'has-error':'' }}">
                            <select name="country" id="country" class="form-control singleSelect" required>
                                <option value="bangladesh">Bangladesh</option>
                            </select>
                            <label for="country">Country</label>
                            @include('errors.formValidateError',['inputName' => 'country'])
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group {{ $errors->has('division') ? 'has-error':'' }}">
                            <select name="division" id="division" class="form-control singleSelect" required></select>
                            <label for="division">Division</label>
                            @include('errors.formValidateError',['inputName' => 'division'])
                        </div>
                    </div>
                    <div class="col-sm-4 {{ $errors->has('district') ? 'has-error':'' }}">
                        <div class="form-group">
                            <select name="district" id="district" class="form-control singleSelect" required></select>
                            <label for="district">District</label>
                            @include('errors.formValidateError',['inputName' => 'district'])
                        </div>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('location') ? 'has-error':'' }}">
                    <select name="location" id="location" class="form-control location singleSelect" required></select>
                    <label for="location">location</label>
                    @include('errors.formValidateError',['inputName' => 'location'])
                </div>
                <div class="form-group {{ $errors->has('speceficLocaiotn') ? 'has-error':'' }}">
                    <textarea name="speceficLocaiotn" id="speceficLocaiotn" class="form-control" required></textarea>
                    <label for="speceficLocaiotn">Specified Your Location</label>
                    @include('errors.formValidateError',['inputName' => 'speceficLocaiotn'])
                </div>

                <!-- Requirement
                !------------------------------------------->
                <div class="alert alert-callout alert-sm alert-default">
                    <b>Describe Your Requirement</b>
                </div>
                <div class="form-group {{ $errors->has('offerRequirement') ? 'has-error':'' }}">
                    <textarea name="offerRequirement" id="offerRequirement" class="form-control" required></textarea>
                    <label for="offerRequirement">Requirement</label>
                    @include('errors.formValidateError',['inputName' => 'offerRequirement'])
                </div>

                <div class="card-actionbar">
                    <div class="card-actionbar-row">
                        <button type="submit" class="btn btn-primary btn-raised"><i class="fa fa-inbox"></i>&nbsp;&nbsp;&nbsp;Post Your Offer</button>
                    </div>
                </div>
            </form>
        </div>
    </article>

    <article class="col-sm-4 instruction card-body">
        <h3 class="alert alert-callout alert-sm alert-default"><i class="fa fa-info-circle"></i><span class="small-padding">Offers Instraction</span></h3>
        <div class="instruction_content">
            <p>For the Guardians:<br/>
******************************************************<br/>
For the PARENTS WHO NEED HOME TUTORS from us please feel free to contact with us at <strong>01710544500</strong> or message us. Write <strong>'' TUTOR'' SMS to 01710544500</strong>. We are giving tutor in Dhaka city. We do not allow any kind of unethical activity of tutors. Inform us If you face any kind of problems about tutors.
</p>
            <!--p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad distinctio, eligendi itaque nam voluptates?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad distinctio, eligendi itaque nam voluptates?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad distinctio, eligendi itaque nam voluptates?</p-->
        </div>
    </article>
@endsection

@section('customJs')
    <script src="{{ asset('/js/select2.min.js') }}"></script>
    <script src="{{ asset('/js/tutoringInfo.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.multiSelect').select2();
        });
    </script>
@endsection

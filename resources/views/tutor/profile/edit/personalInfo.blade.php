<form action="{{ url('/tutor/profile/personal_info/update') }}" method="POST" class="form">
    {{ csrf_field() }}
    <div class="singleBlock">
        <div class="alert alert-callout alert-default">
            <b>Gender Info</b>
        </div>
        <div class="radio radio-styled {{ $errors->has('gender') ? 'has-error':'' }}">
            <label>
                <input type="radio" id="male" name="gender" value="male">
                <span>Male</span>
            </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>
                <input type="radio" id="female" name="gender" value="female">
                <span>Female</span>
            </label>
            @include('errors.formValidateError',['inputName' => 'gender'])
        </div>
    </div>
    <div class="singleBlock">
        <div class="alert alert-callout alert-default">
            <b>Marital Status </b>
        </div>
        <div class="radio radio-styled {{ $errors->has('maritalStatus') ? 'has-error':'' }}">
            <label>
                <input type="radio" id="single" name="maritalStatus" value="single">
                <span>Single</span>
            </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>
                <input type="radio" id="married" name="maritalStatus" value="married">
                <span>Married</span>
            </label>
            @include('errors.formValidateError',['inputName' => 'maritalStatus'])
        </div>
    </div>
    <div class="singleBlock">
        <div class="alert alert-callout alert-default">
            <b>Location Info</b>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('tutorCountry') ? 'has-error':'' }}">
                    <input type="text"  name="tutorCountry" class="form-control" id="tutorCountry">
                    <label for="tutorCountry">Country</label>
                    @include('errors.formValidateError',['inputName' => 'tutorCountry'])
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('tutorDivision') ? 'has-error':'' }}">
                    <input type="text"  name="tutorDivision" class="form-control" id="tutorDivision">
                    <label for="tutorDivision">Division</label>
                    @include('errors.formValidateError',['inputName' => 'tutorDivision'])
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('tutorDistrict') ? 'has-error':'' }}">
                    <input type="text"  name="tutorDistrict" class="form-control" id="tutorDistrict">
                    <label for="tutorDistrict">District</label>
                    @include('errors.formValidateError',['inputName' => 'tutorDistrict'])
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('tutorLocation') ? 'has-error':'' }}">
                    <input type="text"  name="tutorLocation" class="form-control" id="tutorLocation">
                    <label for="tutorLocation">Upazila</label>
                    @include('errors.formValidateError',['inputName' => 'tutorLocation'])
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('zipCode') ? 'has-error':'' }}">
                    <input type="text"  name="zipCode" class="form-control" id="zipCode">
                    <label for="zipCode">Zip Code</label>
                    @include('errors.formValidateError',['inputName' => 'zipCode'])
                </div>
            </div>
        </div>

        <div class="form-group {{ $errors->has('location') ? 'has-error':'' }}">
            <textarea name="location" id="locationInfo" class="form-control"></textarea>
            <label for="locationInfo">Location</label>
            @include('errors.formValidateError',['inputName' => 'location'])
        </div>
    </div>

    <div class="singleBlock">
        <div class="alert alert-callout alert-default">
            <b>Identity Info</b>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group {{ $errors->has('identityCardType') ? 'has-error':'' }}">
                    <select name="identityCardType" id="identityCardType" class="form-control">
                        <option value="">Identity Card Type</option>
                        <option value="1">National Id</option>
                        <option value="2">Passport Id</option>
                        <option value="3">BirthDay Id</option>
                        <option value="4">Driving Licence</option>
                    </select>
                    @include('errors.formValidateError',['inputName' => 'identityCardType'])
                </div>
            </div>
            <div class="col-sm-9">
                <div class="form-group {{ $errors->has('identityId') ? 'has-error':'' }}">
                    <input type="text" name="identityId" class="form-control" id="identityId">
                    <label for="identityId">Id Number</label>
                    @include('errors.formValidateError',['inputName' => 'identityId'])
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('fbId') ? 'has-error':'' }}">
                    <input type="text" name="fbId" class="form-control" id="fbId">
                    <label for="fbId">Facebook Id Link (if has)</label>
                    @include('errors.formValidateError',['inputName' => 'fbId'])
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('linkdinId') ? 'has-error':'' }}">
                    <input type="text" name="linkdinId" class="form-control" id="linkdinId">
                    <label for="linkdinId">Linkdin Id Link (if has)</label>
                    @include('errors.formValidateError',['inputName' => 'linkdinId'])
                </div>
            </div>
        </div>
    </div>

    <div class="singleBlock">
        <div class="alert alert-callout alert-default">
            <b>Parent Information</b>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('fatherName') ? 'has-error':'' }}">
                    <input type="text"  name="fatherName" class="form-control" id="fatherName">
                    <label for="fatherName">Father's Name</label>
                    @include('errors.formValidateError',['inputName' => 'fatherName'])
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('fatherContact') ? 'has-error':'' }}">
                    <input type="text"  name="fatherContact" class="form-control" id="fatherContact">
                    <label for="fatherContact">Father's Contact Number</label>
                    @include('errors.formValidateError',['inputName' => 'fatherContact'])
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('MotherName') ? 'has-error':'' }}">
                    <input type="text"  name="MotherName" class="form-control" id="MotherName">
                    <label for="MotherName">Mother's Name</label>
                    @include('errors.formValidateError',['inputName' => 'MotherName'])
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('MotherContact') ? 'has-error':'' }}">
                    <input type="text"  name="MotherContact" class="form-control" id="MotherContact">
                    <label for="MotherContact">Mother's Contact Number</label>
                    @include('errors.formValidateError',['inputName' => 'MotherContact'])
                </div>
            </div>
        </div>
    </div>

    <div class="singleBlock">
        <div class="alert alert-callout alert-default">
            <b>Emergency Contact Info</b>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('relativeName') ? 'has-error':'' }}">
                    <input type="text"  name="relativeName" class="form-control" id="relativeName">
                    <label for="relativeName">Relative's Name</label>
                    @include('errors.formValidateError',['inputName' => 'relativeName'])
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('relation') ? 'has-error':'' }}">
                    <input type="text"  name="relation" class="form-control" id="relation">
                    <label for="relation">Relation </label>
                    @include('errors.formValidateError',['inputName' => 'relation'])
                </div>
            </div>
        </div>
        <div class="form-group {{ $errors->has('relativeContact') ? 'has-error':'' }}">
            <input type="text"  name="relativeContact" class="form-control" id="relativeContact">
            <label for="relativeContact">Relative Contact Number</label>
            @include('errors.formValidateError',['inputName' => 'relativeContact'])
        </div>
    </div>

    <div class="card-actionbar">
        <div class="card-actionbar-row">
            <button type="submit" class="btn btn-flat btn-primary ink-reaction">Update Personal info & Continue </button>
        </div>
    </div>
</form>
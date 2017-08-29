<form action="{{ url('/tutor/profile/basic_info/store') }}" method="POST" class="form">
    {{ csrf_field() }}
    <div class="singleBlock">
        <div class="alert alert-callout alert-default">
            <b>Tutoring Medium</b>
        </div>
        <div class="form-group  {{ $errors->has('mediumId') ? 'has-error' : '' }}">
            <select name="mediumId[]" id="medium" class="form-control multiSelect" data-tags="true"  multiple="multiple"></select>
            <label for="medium">select Medium Name</label>
            @include('errors.formValidateError',['inputName' => 'mediumId'])
        </div>
        <div class="form-group  {{ $errors->has('salary') ? ' has-error' : '' }}">
            <select name="classId[]" id="classDisplay" class="form-control multiSelect" data-tags="true"  multiple="multiple"></select>
            <label for="classDisplay">select Class Name</label>
            @include('errors.formValidateError',['inputName' => 'classId[]'])
        </div>
        <div class="form-group  {{ $errors->has('salary') ? ' has-error' : '' }}">
            <select name="subjectId[]" id="subjectDisplay" class="form-control multiSelect" data-tags="true"  multiple="multiple"></select>
            <label for="subjectDisplay">Select Subject's</label>
            @include('errors.formValidateError',['inputName' => 'subjectId[]'])
        </div>
    </div>

    <div class="singleBlock">
        <div class="alert alert-callout alert-default">
            <b>Tutoring Location</b>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group  {{ $errors->has('country') ? ' has-error' : '' }}">
                    <select name="country" id="country" class="form-control js-example-basic-multiple" data-tags="true">
                        <option value="bangladesh">Bangladesh</option>
                    </select>
                    <label for="country">Country</label>
                    @include('errors.formValidateError',['inputName' => 'country'])
                </div>
            </div>
            <div class="col-sm-4  {{ $errors->has('division') ? ' has-error' : '' }}">
                <div class="form-group">
                    <select name="division" id="division" class="form-control"></select>
                    <label for="division">Division</label>
                    @include('errors.formValidateError',['inputName' => 'division'])
                </div>
            </div>
            <div class="col-sm-4  {{ $errors->has('district') ? ' has-error' : '' }}">
                <div class="form-group">
                    <select name="district" id="district" class="form-control"></select>
                    <label for="district">City/District</label>
                    @include('errors.formValidateError',['inputName' => 'district'])
                </div>
            </div>
        </div>
        <div class="form-group  {{ $errors->has('location') ? ' has-error' : '' }}">
            <select name="location" id="location" class="form-control location"></select>
            <label for="location">Your Location</label>
            @include('errors.formValidateError',['inputName' => 'location'])
        </div>
        <div class="form-group  {{ $errors->has('preferredLocation') ? ' has-error' : '' }}">
            <select name="preferredLocation[]" id="preferredLocation" class="form-control location multiSelect" data-tags="true"  multiple="multiple"></select>
            <label for="preferredLocation">Most preferred locations for tutoring</label>
            @include('errors.formValidateError',['inputName' => 'preferredLocation'])
        </div>
    </div>

    <div class="singleBlock">
        <div class="alert alert-callout alert-default">
            <b>Tutoring Ability</b>
        </div>
        <div class="form-group  {{ $errors->has('tutoringDay[]') ? ' has-error' : '' }}">
            <select name="tutoringDay[]" id="tutoringDay" class="form-control multiSelect" data-tags="true" multiple="multiple">
                <option value="friday">friday</option>
                <option value="saturday">Saturday</option>
                <option value="sunday">Sunday</option>
                <option value="Monday">Monday</option>
                <option value="tuesday">Tuesday</option>
                <option value="wednesday">Wednesday</option>
                <option value="thursday">Thursday</option>
            </select>
            <label for="tutoringDay">Days</label>
            @include('errors.formValidateError',['inputName' => 'tutoringDay'])
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="text" class="form-control time" name="availableFrom">
                    <label for="availableFrom">Available From</label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group timearea">
                    <input type="text" class="form-control time" name="availableTo">
                    <label for="availableTo">Available To</label>
                </div>
            </div>
        </div>
    </div>
    <div class="singleBlock">
        <div class="alert alert-callout alert-default">
            <b>Tutoring Contact Number</b>
        </div>
        <div class="form-group {{ $errors->has('contactNo') ? 'has-error':'' }}">
            <input type="text" class="form-control" id="contactNo" name="contactNo">
            <label for="contactNo">Phone Number</label>
            @include('errors.formValidateError',['inputName' => 'contactNo'])
        </div>
    </div>
    <div class="singleBlock">
        <div class="alert alert-callout alert-default">
            <b>Tutoring Experience</b>
        </div>
        <div class="checkbox checkbox-styled">
            <label>
                <input type="radio" id="experienceCheckBox" name="experience" value="1">
                <span>Yes</span>
            </label>
        </div>
        <div id="experienceCheckinfo" style="display: none">
            <div class="form-group {{ $errors->has('experienceYear') ? ' has-error' : '' }}">
                <input type="text" class="form-control" id="regular1" name="experienceYear">
                <label for="experienceYear">Experience Years</label>
                @include('errors.formValidateError',['inputName' => 'experienceYear'])
            </div>
            <div class="form-group {{ $errors->has('experienceDetail') ? ' has-error' : '' }}">
                <textarea name="experienceDetail" id="experienceDetail" class="form-control"></textarea>
                <label for="experienceDetail">Experience Detail</label>
                @include('errors.formValidateError',['inputName' => 'experienceDetail'])
            </div>
        </div>
        <div class="checkbox checkbox-styled">
            <label>
                <input type="radio" value="0" name="experience">
                <span>No</span>
            </label>
        </div>
    </div>

    <div class="singleBlock">
        <div class="alert alert-callout alert-default">
            <b>Tutoring Type</b>
        </div>
        <div class="checkbox checkbox-styled">
            <label>
                <input type="checkbox" value="1" name="groupTutoring">
                <span>Group</span>
            </label>
        </div>

        <div class="checkbox checkbox-styled">
            <label>
                <input type="checkbox" value="1" name="personalTutoring">
                <span>Personal/Single</span>
            </label>
        </div>
    </div>
    <div class="singleBlock">
        <div class="alert alert-callout alert-default">
            <b>Tutoring Host</b>
        </div>
        <div class="">
            <div class="checkbox checkbox-styled">
                <label>
                    <input type="checkbox" value="1" name="studentHome">
                    <span>Student's Home</span>
                </label>
            </div>
            <div class="checkbox checkbox-styled {{ $errors->has('yourHome') ? 'has-error' : '' }}">
                <label>
                    <input type="checkbox" value="1" name="yourHome">
                    <span>Your's Home</span>
                </label>
                @include('errors.formValidateError',['inputName' => 'yourHome'])
            </div>
                <div class="checkbox checkbox-styled {{ $errors->has('online') ? 'has-error' : '' }}">
                    <label>
                        <input type="checkbox" id="onlineCheckBox" value="1" name="online">
                        <span>Online</span>
                    </label>
                    @include('errors.formValidateError',['inputName' => 'online'])
                </div>
            <div class="row" id="onlineCheckInfo"  style="display: none">
                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('skypeId') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" name="skypeId" id="skypeId">
                        <label for="skypeId">Skype ID</label>
                        @include('errors.formValidateError',['inputName' => 'skypeId'])
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('googleId') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" id="googleId" name="googleId">
                        <label for="googleId">Google+ ID</label>
                        @include('errors.formValidateError',['inputName' => 'googleId'])
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="singleBlock">
        <div class="alert alert-callout alert-default">
            <b>Tutoring Salary</b>
        </div>
        <div class="form-group {{ $errors->has('salary') ? ' has-error' : '' }}">
            <input type="text" class="form-control" name="salary" id="salary">
            <label for="salary">Salary</label>
            @include('errors.formValidateError',['inputName' => 'salary'])
        </div>
        <div class="checkbox checkbox-styled">
            <label>
                <input type="checkbox" value="1" name="negotiable">
                <span>Negotiable</span>
            </label>
        </div>
    </div>
    <div class="card-actionbar">
        <div class="card-actionbar-row">
            <button type="submit" class="btn btn-flat btn-primary ink-reaction">Save Tutoring Info & Continue </button>
        </div>
    </div>
</form>
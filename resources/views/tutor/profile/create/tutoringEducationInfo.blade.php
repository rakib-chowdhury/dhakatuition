<div class="card">
    <div class="card-head">
        <header><h4><i class="fa fa-graduation-cap"></i><span class="small-padding">Heigher Secondary</span></h4></header>
        <div class="tools">
            <div class="btn-group">
                <a class="btn btn-icon-toggle btn-refresh text-info"><i class="fa fa-pencil"></i></a>
                <a class="btn btn-icon-toggle btn-close text-danger"><i class="fa fa-trash"></i></a>
                <a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam atque distinctio in maxime pariatur ut vitae. A accusamus accusantium beatae labore quidem rerum sunt temporibus ullam vel voluptate. Error expedita obcaecati perspiciatis placeat provident recusandae, sed sunt tenetur! Consequuntur ea excepturi impedit in libero magnam quasi! Autem consectetur dicta iste!
    </div>
</div>
<div class="card">
    <div class="card-head">
        <header><h4><i class="fa fa-graduation-cap"></i><span class="small-padding"> Secondary</span></h4></header>
        <div class="tools">
            <div class="btn-group">
                <a class="btn btn-icon-toggle btn-refresh text-info"><i class="fa fa-pencil"></i></a>
                <a class="btn btn-icon-toggle btn-close text-danger"><i class="fa fa-trash"></i></a>
                <a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam atque distinctio in maxime pariatur ut vitae. A accusamus accusantium beatae labore quidem rerum sunt temporibus ullam vel voluptate. Error expedita obcaecati perspiciatis placeat provident recusandae, sed sunt tenetur! Consequuntur ea excepturi impedit in libero magnam quasi! Autem consectetur dicta iste!
    </div>
</div>
<div class="addCalcification">
    <div class="card-head alert alert-callout alert-default no-margin">
        <header><h4><i class="fa fa-bookmark-o text-primary"></i><span class="text-primary small-padding"> ADD CERTIFICATE DETAIL</span></h4></header>
    </div>
    <div class="card-body">
        <form action="{{ url('/tutor/profile/education_info/store') }}" method="POST" class="form">
            {{ csrf_field() }}
            <div class="form-group {{ $errors->has('label') ? 'has-error':'' }}">
                <select name="label" id="label" class="form-control"></select>
                <label for="label">Education Label</label>
                @include('errors.formValidateError',['inputName' => 'label'])
            </div>
            <div class="form-group {{ $errors->has('examTitle') ? 'has-error':'' }}">
                <input type="text" class="form-control" id="examTitle" name="examTitle">
                <label for="examTitle">Exam / Degree Title</label>
                @include('errors.formValidateError',['inputName' => 'examTitle'])
            </div>
            <div class="form-group {{ $errors->has('institute') ? 'has-error':'' }}">
                <input type="text" class="form-control" id="institute" name="institute">
                <label for="institute">Institute Name</label>
                @include('errors.formValidateError',['inputName' => 'institute'])
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('major') ? 'has-error':'' }}">
                        <select name="major" id="major" class="form-control"></select>
                        <label for="major">Major / Group</label>
                        @include('errors.formValidateError',['inputName' => 'major'])
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('cgpa') ? 'has-error':'' }}">
                        <input type="text" class="form-control" id="cgpa" name="cgpa">
                        <label for="cgpa">CGPA / GPA</label>
                        @include('errors.formValidateError',['inputName' => 'cgpa'])
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('idNumber') ? 'has-error':'' }}">
                        <input type="text" name="idNumber" id="idNumber" class="form-control">
                        <label for="idNumber">ID-Card Number</label>
                        @include('errors.formValidateError',['inputName' => 'idNumber'])
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('curriculum') ? 'has-error':'' }}">
                        <select name="curriculum" id="curriculum" class="form-control"></select>
                        <label for="curriculum">Curriculum</label>
                        @include('errors.formValidateError',['inputName' => 'curriculum'])
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="input-group  {{ $errors->has('from') ? 'has-error':'' }}">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <div class="input-group-content">
                                <input type="text" class="form-control" name="from" id="from">
                                <label for="from">From</label>
                                @include('errors.formValidateError',['inputName' => 'from'])
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('until') ? 'has-error':'' }}">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <div class="input-group-content">
                                <input type="text" class="form-control" name="until" id="until">
                                <label for="until">Until</label>
                                @include('errors.formValidateError',['inputName' => 'until'])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('passingYear') ? 'has-error':'' }}">
                        <input type="text" class="form-control" name="passingYear" id="passingYear">
                        <label for="passingYear">Passing Year</label>
                        @include('errors.formValidateError',['inputName' => 'passingYear'])
                    </div>
                </div>
                <div class="col-sm-6"><br>
                    <div class="checkbox checkbox-styled  {{ $errors->has('currentStudding') ? 'has-error':'' }}">
                        <label>
                            <input type="checkbox" value="1" name="currentStudding">
                            <span>I am current studding Here</span>
                        </label>
                        @include('errors.formValidateError',['inputName' => 'currentStudding'])
                    </div>
                </div>
            </div>
            <div class="card-actionbar">
                <div class="card-actionbar-row">
                    <button type="submit" class="btn btn-flat btn-primary ink-reaction">Save Education  </button>
                </div>
            </div>
        </form>
    </div>
</div>

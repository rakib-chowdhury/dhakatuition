<form action="{{ url('/tutor/profile/over_view/store') }}" method="POST" class="form">
    {{ csrf_field() }}
    <div class="singleBlock">
        <div class="alert alert-callout alert-default">
            <b>Your Title Info</b>
        </div>
        <div class="form-group {{ $errors->has('title') ? 'has-error':'' }}">
            <input type="text"  name="title" class="form-control" id="title">
            <label for="title">Your Title (max: 10 word)</label>
            @include('errors.formValidateError', ['inputName' => 'title'])
        </div>
    </div>
    <div class="singleBlock">
        <div class="alert alert-callout alert-default">
            <b>Over View Yourself</b>
        </div>
        <div class="form-group {{ $errors->has('over_view') ? 'has-error':'' }}">
            <textarea name="over_view" id="over_view" class="form-control"></textarea>
            <label for="over_view">It about max:250 word</label>
            @include('errors.formValidateError', ['inputName' => 'over_view'])
        </div>
    </div>
    <div class="card-actionbar">
        <div class="card-actionbar-row">
            <button type="submit" class="btn btn-flat btn-primary ink-reaction">Save Info & Complete </button>
        </div>
    </div>
</form>
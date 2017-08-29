@extends('layouts.authApp')
@section('specifiedCss')
    <style>
        .medium_item{}
        .class_item{
            border-left: 2px solid #0aa89e;
            margin-left: 27px;
        }
        .class_item > li {
            position: relative;
            padding-left: 15px;
        }
        .class_item > li:before {
            content: '';
            position: absolute;
            width: 10px;
            height: 2px;
            background-color: #0aa89e;
            top: 46%;
            left: 0;
        }
        .subject_item{
            border-left: 2px solid #e2e2e2;
            margin-left: 30px;
        }
        .subject_item > li {
            position: relative;
            padding-left: 8px;
        }
        .subject_item > li:before {
            content: '';
            position: absolute;
            width: 10px;
            height: 2px;
            background-color: #e2e2e2;
            top: 46%;
            left: 0;
        }
        .form-group .form-control ~ label {
            margin-top: -12px;
        }
    </style>
@endsection

@section('content')
    <section>
        <div class="section-body">
            @include('includes.flashMessage')
            <article id="tutoringInfo">
                <div class="card style-default-bright">
                    <div class="card-head card-head-sm  alert alert-callout card-head-xs no-margin">
                        <header class="text-bold "><i class="fa fa-info-circle"></i><span class="small-padding">TUTORING LOCATIONS</span></header>
                    </div>
                    <div class="card-body">
                        <ul class="list divider-full-bleed medium_item">
                            {{--check district --}}
                            @if($divisions->count() > 0)
                                {{--division loop--}}
                                <?php $divisionSl = 0 ?>
                                <?php $districtSl = 0 ?>
                                <?php $locationSl = 0 ?>
                                @foreach($divisions as $division)
                                    <!-- devision edit Modal -->
                                    <div class="modal fade" id="editDivision{{ $divisionSl }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Edit Medium</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-body">
                                                        <form action="{{ url('/admin/location/division/'. $division->id .'/update') }}" method="post">
                                                            {{ csrf_field() }}
                                                            <div class="col-sm-8">
                                                                <div class="form-group {{ $errors->has('divisionName') ? ' has-error' : '' }}">
                                                                    <input type="text" name="divisionName" class="form-control" value="{{ $division->name }}" id="divisionName">
                                                                    <label for="divisionName">Division Name</label>
                                                                    @include('errors.formValidateError',['inputName' => 'divisionName'])
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-flat btn-primary ink-reaction">Update Division</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <li class="tile">
                                        <a class="tile-content ink-reaction" href="">
                                            <div class="tile-icon"><i class="fa fa-star"></i></div>
                                            <div class="tile-text text-light">{{ $division->name }}</div>
                                        </a>
                                        <a class="btn btn-flat ink-reaction text-primary"  data-toggle="modal" data-target="#editDivision{{ $divisionSl }}">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="" class="btn btn-flat ink-reaction text-danger">
                                            <form action="{{ url('/admin/location/division_delete/'.$division->id) }}" method="post">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-flat ink-reaction text-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </a>
                                    </li>
                                    <?php ++$divisionSl ?>
                                    {{--check district --}}
                                    @if($division->district->count() > 0)
                                        <ul class="list display-block class_item">
                                            {{--district loop--}}
                                            @foreach($division->district as $district)
                                                <!-- district edit Modal -->
                                                <div class="modal fade" id="editDistrict{{ $districtSl }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="myModalLabel">Edit District</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="card-body">
                                                                    <form action="{{ url('/admin/location/district/'. $district->id .'/update') }}" method="post">
                                                                        {{ csrf_field() }}
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group  {{ $errors->has('divisionId') ? 'has-error' : '' }}">
                                                                                <select name="divisionId" id="divisionId" class="form-control">
                                                                                    <option value="">Select Division</option>
                                                                                    @if($divisions->count() > 0)
                                                                                        @foreach($divisions as $division)
                                                                                            <option value="{{ $division->id }}"  {{ ($division->id == $district->tutoring_divisions_id)?'selected':'' }}>{{ $division->name }}</option>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </select>
                                                                                <label for="divisionId">select Division Name</label>
                                                                                @include('errors.formValidateError',['inputName' => 'divisionId'])
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group {{ $errors->has('districtName') ? 'has-error' : '' }}">
                                                                                <input type="text" name="districtName" class="form-control" value="{{ $district->name }}" id="districtName">
                                                                                <label for="districtName">District Name</label>
                                                                                @include('errors.formValidateError',['inputName' => 'districtName'])
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group">
                                                                                <button type="submit" class="btn btn-flat btn-primary ink-reaction">Update District</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <li class="tile">
                                                    <a class="tile-content ink-reaction" href="">
                                                        <div class="tile-text text-light">{{ $district->name }}</div>
                                                    </a>
                                                    <a class="btn btn-flat ink-reaction text-primary"  data-toggle="modal" data-target="#editDistrict{{$districtSl}}">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="" class="btn btn-flat ink-reaction text-danger">
                                                        <form action="{{ url('/admin/location/district_delete/'.$district->id) }}" method="post">
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-flat ink-reaction text-danger"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                    </a>
                                                </li>
                                                <?php ++$districtSl ?>
                                                {{-- check location --}}
                                                @if(!empty($district->location) || $district->location->count() > 0)
                                                    <ul class="list subject_item">
                                                         {{--location loop --}}
                                                        @foreach($district->location as $location)
                                                            <!-- district edit Modal -->
                                                            <div class="modal fade" id="editLocation{{ $locationSl }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                            <h4 class="modal-title" id="myModalLabel">Edit Location</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="card-body">

                                                                                <form action="{{ url('admin/location/location/'. $location->id .'/update') }}" method="post">
                                                                                    {{ csrf_field() }}
                                                                                    <div class="col-sm-4">
                                                                                        <div class="form-group {{ $errors->has('districtId') ? 'has-error' : '' }}">
                                                                                            <select name="districtId" id="districtId" class="form-control">
                                                                                                <option value=''>Select District </option>
                                                                                                @if($divisions->count() > 0)
                                                                                                    @foreach($divisions as $division)
                                                                                                        @if($division->district->count() > 0)
                                                                                                            @foreach($division->district as $district)
                                                                                                                <option value="{{ $district->id }}" {{ ($district->id == $location->tutoring_districts_id)?'selected':'' }}>{{ $district->name }}</option>
                                                                                                            @endforeach
                                                                                                        @endif
                                                                                                    @endforeach
                                                                                                @endif
                                                                                            </select>
                                                                                            <label for="districtId">select Class</label>
                                                                                            @include('errors.formValidateError',['inputName' => 'districtId'])
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <div class="form-group {{ $errors->has('locationName') ? 'has-error' : '' }}">
                                                                                            <input type="text" class="form-control" id="locationName" value="{{ $location->name }}" name="locationName">
                                                                                            <label for="locationName">Location Name</label>
                                                                                            @include('errors.formValidateError',['inputName' => 'locationName'])
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <div class="form-group">
                                                                                            <button type="submit" class="btn btn-flat btn-primary ink-reaction">Update Location</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <li class="tile">
                                                                <a class="tile-content ink-reaction" href="">
                                                                    <div class="tile-text text-light">{{ $location->name }}</div>
                                                                </a>
                                                                <a class="btn btn-flat ink-reaction text-primary" data-toggle="modal" data-target="#editLocation{{ $locationSl }}">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                                <a href="" class="btn btn-flat ink-reaction text-danger">
                                                                    <form action="{{ url('/admin/location/location_delete/'.$location->id) }}" method="post">
                                                                        {{ csrf_field() }}
                                                                        <button type="submit" class="btn btn-flat ink-reaction text-danger"><i class="fa fa-trash"></i></button>
                                                                    </form>
                                                                </a>
                                                            </li>
                                                            <?php ++$locationSl ?>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                @endforeach
                            @else
                                <li class="tile">
                                    <span class="small-padding"></span>
                                    <i class="fa fa-exclamation-triangle small-padding  text-danger"></i>
                                    <span class="text-bold">No Location is created</span>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </article>

            <article id="create_tutoring_medium">
                <div class="tutoring_info_create">
                    <div class="card style-default-bright">
                        <div class="card-head alert alert-callout card-head-xs">
                            <header>Create Tutoring Location - Division</header>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/admin/location/division_create') }}" method="post">
                                {{ csrf_field() }}
                                <div class="col-sm-8">
                                    <div class="form-group {{ $errors->has('divisionName') ? ' has-error' : '' }}">
                                        <input type="text" name="divisionName" class="form-control" id="divisionName">
                                        <label for="divisionName">Division Name</label>
                                        @include('errors.formValidateError',['inputName' => 'divisionName'])
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-flat btn-primary ink-reaction">Create Division</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </article>

            <article id="create_tutoring_class">
                <div class="tutoring_info_create">
                    <div class="card style-default-bright">
                        <div class="card-head alert alert-callout card-head-xs">
                            <header>Create Tutoring City/District </header>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/admin/location/district_create') }}" method="post">
                                {{ csrf_field() }}
                                <div class="col-sm-4">
                                    <div class="form-group  {{ $errors->has('divisionId') ? 'has-error' : '' }}">
                                        <select name="divisionId" id="divisionId" class="form-control">
                                            <option value="">Select Division</option>
                                            {{--check division at District create--}}
                                            @if($divisions->count() > 0)
                                                @foreach($divisions as $division)
                                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <label for="divisionId">select Division Name</label>
                                        @include('errors.formValidateError',['inputName' => 'divisionId'])
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group {{ $errors->has('districtName') ? 'has-error' : '' }}">
                                        <input type="text" name="districtName" class="form-control" id="districtName">
                                        <label for="districtName">District Name</label>
                                        @include('errors.formValidateError',['inputName' => 'districtName'])
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-flat btn-primary ink-reaction">Create District</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </article>

            <article id="create_tutoring_class">
                <div class="tutoring_info_create">
                    <div class="card style-default-bright">
                        <div class="card-head alert alert-callout card-head-xs">
                            <header>Create Tutoring Location</header>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('admin/location/location_create') }}" method="post">
                                {{ csrf_field() }}
                                <div class="col-sm-4">
                                    <div class="form-group {{ $errors->has('districtId') ? 'has-error' : '' }}">
                                        <select name="districtId" id="districtId" class="form-control">
                                            <option value=''>Select District </option>
                                            {{--check district at location create--}}
                                            @if($divisions->count() > 0)
                                                @foreach($divisions as $division)
                                                    @if($division->district->count() > 0)
                                                        @foreach($division->district as $district)
                                                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                        <label for="districtId">select Class</label>
                                        @include('errors.formValidateError',['inputName' => 'districtId'])
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group {{ $errors->has('locationName') ? 'has-error' : '' }}">
                                        <input type="text" class="form-control" id="locationName" name="locationName">
                                        <label for="locationName">Location Name</label>
                                        @include('errors.formValidateError',['inputName' => 'locationName'])
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-flat btn-primary ink-reaction">Create Location</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </article>

        </div>
    </section>
@endsection


@section('specifiedJs')

@endsection
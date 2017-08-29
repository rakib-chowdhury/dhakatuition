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
                        <header class="text-bold "><i class="fa fa-info-circle"></i><span class="small-padding">EDUCATIONAL MAJOR GROUP</span></header>
                    </div>
                    <div class="card-body">
                        <ul class="list divider-full-bleed medium_item">
                            {{--check medium --}}
                            @if($labels->count() > 0)
                                {{--medium loop--}}
                                <?php $majorSl = 0 ?>
                                @foreach($labels as $label)
                                    <li class="tile">
                                        <a class="tile-content ink-reaction" href="">
                                            <div class="tile-icon"><i class="fa fa-star"></i></div>
                                            <div class="tile-text text-light">{{ $label->label_name }}</div>
                                        </a>
                                    </li>
                                    {{--check labels --}}
                                    @if($label->mazarGroup->count() > 0)
                                        <ul class="list display-block class_item">
                                            {{--label loop--}}
                                            @foreach($label->mazarGroup as $major)
                                                <!-- major edit Modal -->
                                                <div class="modal fade" id="editMajor{{ $majorSl }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="myModalLabel">Edit Major Group</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="card-body">
                                                                    <form action="{{ url('/admin/education/major/'. $major->id .'/update') }}" method="post">
                                                                        {{ csrf_field() }}
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group  {{ $errors->has('labelId') ? 'has-error' : '' }}">
                                                                                <select name="labelId" id="labelId" class="form-control">
                                                                                    <option value="">Select Medium</option>
                                                                                    @if($labels->count() > 0)
                                                                                        @foreach($labels as $label)
                                                                                            <option value="{{ $label->id }}" {{ ($label->id == $major->education_label_id)?'selected':'' }}>{{ $label->label_name }}</option>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </select>
                                                                                <label for="labelId">select Label Name</label>
                                                                                @include('errors.formValidateError',['inputName' => 'labelId'])
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group {{ $errors->has('majorName') ? 'has-error' : '' }}">
                                                                                <input type="text" name="majorName" class="form-control" value="{{ $major->group_name }}" id="majorName">
                                                                                <label for="majorName">Major Group Name</label>
                                                                                @include('errors.formValidateError',['inputName' => 'majorName'])
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group">
                                                                                <button type="submit" class="btn btn-flat btn-primary ink-reaction">Update Major Group</button>
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
                                                        <div class="tile-text text-light">{{ $major->group_name }}</div>
                                                    </a>
                                                    <a class="btn btn-flat ink-reaction text-primary" data-toggle="modal" data-target="#editMajor{{$majorSl}}">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="" class="btn btn-flat ink-reaction text-danger">
                                                        <form action="{{ url('/admin/education/major_delete/'.$major->id) }}" method="post">
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-flat ink-reaction text-danger"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                    </a>
                                                </li>
                                                <?php ++$majorSl ?>
                                            @endforeach
                                        </ul>
                                    @else
                                        <ul class="list display-block class_item">
                                            <li class="tile">
                                                <span class="small-padding"></span>
                                                <i class="fa fa-exclamation-triangle small-padding  text-danger"></i>
                                                <span class="text-bold">No Education Label Major is created</span>
                                            </li>
                                        </ul>
                                    @endif
                                @endforeach
                            @else
                                <li class="tile">
                                    <span class="small-padding"></span>
                                    <i class="fa fa-exclamation-triangle small-padding  text-danger"></i>
                                    <span class="text-bold">No Education Labels is created</span>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </article>

            <article id="create_tutoring_class">
                <div class="tutoring_info_create">
                    <div class="card style-default-bright">
                        <div class="card-head alert alert-callout card-head-xs">
                            <header>Create Educational Major Group</header>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/admin/education/major_create') }}" method="post">
                                {{ csrf_field() }}
                                <div class="col-sm-4">
                                    <div class="form-group  {{ $errors->has('labelId') ? 'has-error' : '' }}">
                                        <select name="labelId" id="labelId" class="form-control">
                                            <option value="">Select Label</option>
                                            {{--check medium at class create--}}
                                            @if($labels->count() > 0)
                                                @foreach($labels as $label)
                                                    <option value="{{ $label->id }}">{{ $label->label_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <label for="labelId">select Label Name</label>
                                        @include('errors.formValidateError',['inputName' => 'labelId'])
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group {{ $errors->has('majorName') ? 'has-error' : '' }}">
                                        <input type="text" name="majorName" class="form-control" id="majorName">
                                        <label for="majorName">Major Group Name</label>
                                        @include('errors.formValidateError',['inputName' => 'majorName'])
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-flat btn-primary ink-reaction">Create Major Group</button>
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
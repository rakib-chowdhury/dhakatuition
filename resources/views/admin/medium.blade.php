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
                        <header class="text-bold "><i class="fa fa-info-circle"></i><span class="small-padding">TUTORING MEDIUM</span></header>
                    </div>
                    <div class="card-body">
                        <ul class="list divider-full-bleed medium_item">
                            {{--check medium --}}
                            @if($mediums->count() > 0)
                                {{--medium loop--}}
                                <?php $mediumSl = 0 ?>
                                <?php $classSl = 0 ?>
                                <?php $subjectSl = 0 ?>
                                @foreach($mediums as $medium)
                                    <!-- medium edit Modal -->
                                    <div class="modal fade" id="editMedium{{ $mediumSl }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Edit Medium</h4>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="card-body">
                                                        <form action="{{ url('/admin/medium/'.$medium->id.'/update') }}" method="post">
                                                            {{ csrf_field() }}
                                                            <div class="col-sm-8">
                                                                <div class="form-group {{ $errors->has('mediumName') ? ' has-error' : '' }}">
                                                                    <input type="text" name="mediumName" class="form-control" value="{{ $medium->medium_category_name }}" id="mediumName">
                                                                    <label for="Firstname1">Medium Name</label>
                                                                    @include('errors.formValidateError',['inputName' => 'mediumName'])
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-flat btn-primary ink-reaction">Update Medium</button>
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
                                            <div class="tile-text text-light">{{ $medium->medium_category_name }}</div>
                                        </a>
                                        <a class="btn btn-flat ink-reaction text-primary"  data-toggle="modal" data-target="#editMedium{{ $mediumSl }}">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="" class="btn btn-flat ink-reaction text-danger">
                                            <form action="{{ url('/admin/medium_delete/'.$medium->id) }}" method="post">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-flat ink-reaction text-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </a>
                                    </li>
                                    <?php  ++$mediumSl  ?>
                                        {{--check classes --}}
                                        @if($medium->classes->count() > 0)
                                            <ul class="list display-block class_item">
                                                {{--class loop--}}
                                                @foreach($medium->classes as $class)
                                                    <!-- subject edit Modal -->
                                                    <div class="modal fade" id="editClass{{ $classSl }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="myModalLabel">Edit Classes</h4>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="card-body">
                                                                        <form action="{{ url('/admin/class/'. $class->id .'/update') }}" method="post">
                                                                            {{ csrf_field() }}
                                                                            <div class="col-sm-4">
                                                                                <div class="form-group  {{ $errors->has('mediumId') ? 'has-error' : '' }}">
                                                                                    <select name="mediumId" id="mediumId" class="form-control">
                                                                                        <option value="">Select Medium</option>
                                                                                        @if($mediums->count() > 0)
                                                                                            @foreach($mediums as $medium)
                                                                                                <option value="{{ $medium->id }}"   {{ ($medium->id == $class->medium_id)?'selected':'' }}>{{ $medium->medium_category_name }}</option>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </select>
                                                                                    <label for="mediumName">select Medium Name</label>
                                                                                    @include('errors.formValidateError',['inputName' => 'mediumId'])
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <div class="form-group {{ $errors->has('className') ? 'has-error' : '' }}">
                                                                                    <input type="text" name="className" class="form-control" id="className" value="{{ $class->class_name }}">
                                                                                    <label for="className">Class Name</label>
                                                                                    @include('errors.formValidateError',['inputName' => 'className'])
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <div class="form-group">
                                                                                    <button type="submit" class="btn btn-flat btn-primary ink-reaction">Update Class</button>
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
                                                            <div class="tile-text text-light">{{ $class->class_name }}</div>
                                                        </a>
                                                        <a class="btn btn-flat ink-reaction text-primary" data-toggle="modal" data-target="#editClass{{$classSl}}">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a href="" class="btn btn-flat ink-reaction text-danger">
                                                            <form action="{{ url('/admin/class_delete/'.$class->id) }}" method="post">
                                                                {{ csrf_field() }}
                                                                <button type="submit" class="btn btn-flat ink-reaction text-danger"><i class="fa fa-trash"></i></button>
                                                            </form>
                                                        </a>
                                                    </li>
                                                    <?php ++$classSl ?>
                                                    {{-- check subject --}}
                                                    @if($class->subject->count() > 0)
                                                        <ul class="list subject_item">
                                                            {{-- subject loop --}}
                                                            @foreach($class->subject as $subject)<!-- classes edit Modal -->
                                                                <div class="modal fade" id="editSubject{{ $subjectSl }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                                <h4 class="modal-title" id="myModalLabel">Edit Subject</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="card-body">
                                                                                    <form action="{{ url('admin/subject/'. $subject->id .'/update') }}" method="post">
                                                                                        {{ csrf_field() }}
                                                                                        <div class="col-sm-4">
                                                                                            <div class="form-group {{ $errors->has('classId') ? 'has-error' : '' }}">
                                                                                                <select name="classId" id="classId" class="form-control">
                                                                                                    <option value=''>Slelect Class</option>
                                                                                                    @if($mediums->count() > 0)
                                                                                                        @foreach($mediums as $medium)
                                                                                                            @if($medium->classes->count() > 0)
                                                                                                                @foreach($medium->classes as $class)
                                                                                                                    <option value="{{ $class->id }}"  {{ ($class->id == $subject->class_id)?'selected':'' }}>{{ $class->class_name }}</option>
                                                                                                                @endforeach
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                    @endif
                                                                                                </select>
                                                                                                <label for="classId">select Class</label>
                                                                                                @include('errors.formValidateError',['inputName' => 'classId'])
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-4">
                                                                                            <div class="form-group {{ $errors->has('subjectName') ? 'has-error' : '' }}">
                                                                                                <input type="text" class="form-control" id="subjectName" value="{{ $subject->subject_name }}" name="subjectName">
                                                                                                <label for="subjectName">Subject Name</label>
                                                                                                @include('errors.formValidateError',['inputName' => 'subjectName'])
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-4">
                                                                                            <div class="form-group">
                                                                                                <button type="submit" class="btn btn-flat btn-primary ink-reaction">update Subject</button>
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
                                                                        <div class="tile-text text-light">{{ $subject->subject_name }}</div>
                                                                    </a>
                                                                    <a class="btn btn-flat ink-reaction text-primary"  data-toggle="modal" data-target="#editSubject{{ $subjectSl }}">
                                                                        <i class="fa fa-pencil"></i>
                                                                    </a>
                                                                    <a href="" class="btn btn-flat ink-reaction text-danger">
                                                                        <form action="{{ url('/admin/subject_delete/'.$subject->id) }}" method="post">
                                                                            {{ csrf_field() }}
                                                                            <button type="submit" class="btn btn-flat ink-reaction text-danger"><i class="fa fa-trash"></i></button>
                                                                        </form>
                                                                    </a>
                                                                </li>
                                                                <?php ++$subjectSl ?>
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
                                    <span class="text-bold">No Medium is created</span>
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
                            <header>Create Tutoring Medium</header>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/admin/medium_create') }}" method="post">
                                {{ csrf_field() }}
                                <div class="col-sm-8">
                                    <div class="form-group {{ $errors->has('mediumName') ? ' has-error' : '' }}">
                                        <input type="text" name="mediumName" class="form-control" id="Firstname1">
                                        <label for="Firstname1">Medium Name</label>
                                        @include('errors.formValidateError',['inputName' => 'mediumName'])
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-flat btn-primary ink-reaction">Create Medium</button>
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
                            <header>Create Tutoring Class</header>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/admin/class_create') }}" method="post">
                                {{ csrf_field() }}
                                <div class="col-sm-4">
                                    <div class="form-group  {{ $errors->has('mediumId') ? 'has-error' : '' }}">
                                        <select name="mediumId" id="mediumId" class="form-control">
                                            <option value="">Select Medium</option>
                                            {{--check medium at class create--}}
                                            @if($mediums->count() > 0)
                                                @foreach($mediums as $medium)
                                                    <option value="{{ $medium->id }}">{{ $medium->medium_category_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <label for="mediumName">select Medium Name</label>
                                        @include('errors.formValidateError',['inputName' => 'mediumId'])
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group {{ $errors->has('className') ? 'has-error' : '' }}">
                                        <input type="text" name="className" class="form-control" id="className">
                                        <label for="className">Class Name</label>
                                        @include('errors.formValidateError',['inputName' => 'className'])
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-flat btn-primary ink-reaction">Create Class</button>
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
                            <header>Create Tutoring Subject</header>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('admin/subject_create') }}" method="post">
                                {{ csrf_field() }}
                                <div class="col-sm-4">
                                    <div class="form-group {{ $errors->has('classId') ? 'has-error' : '' }}">
                                        <select name="classId" id="classId" class="form-control">
                                            <option value=''>Slelect Class</option>
                                            check class at subject create
                                            @if($mediums->count() > 0)
                                                @foreach($mediums as $medium)
                                                    @if($medium->classes->count() > 0)
                                                        @foreach($medium->classes as $class)
                                                            <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                        <label for="classId">select Class</label>
                                        @include('errors.formValidateError',['inputName' => 'classId'])
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group {{ $errors->has('subjectName') ? 'has-error' : '' }}">
                                        <input type="text" class="form-control" id="subjectName" name="subjectName">
                                        <label for="subjectName">Subject Name</label>
                                        @include('errors.formValidateError',['inputName' => 'subjectName'])
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-flat btn-primary ink-reaction">Create Subject</button>
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
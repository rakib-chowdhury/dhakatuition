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
                            @if($curriculums->count() > 0)
                                {{--medium loop--}}
                                <?php $curriculumSl = 0 ?>
                                @foreach($curriculums as $curriculum)
                                    <!-- curriculum edit Modal -->
                                    <div class="modal fade" id="editCurriculum{{ $curriculumSl }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Edit Curriculum</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-body">
                                                        <form action="{{ url('/admin/education/curriculum/'. $curriculum->id .'/update') }}" method="post">
                                                            {{ csrf_field() }}
                                                            <div class="col-sm-8">
                                                                <div class="form-group {{ $errors->has('CurriculumName') ? ' has-error' : '' }}">
                                                                    <input type="text" name="CurriculumName" class="form-control" value="{{ $curriculum->curriculum_name }}" id="CurriculumName">
                                                                    <label for="CurriculumName">Curriculum Name</label>
                                                                    @include('errors.formValidateError',['inputName' => 'CurriculumName'])
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-flat btn-primary ink-reaction">update Curriculum</button>
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
                                            <div class="tile-text text-light">{{ $curriculum->curriculum_name }}</div>
                                        </a>
                                        <a class="btn btn-flat ink-reaction text-primary" data-toggle="modal" data-target="#editCurriculum{{ $curriculumSl }}">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="" class="btn btn-flat ink-reaction text-danger">
                                            <form action="{{ url('/admin/education/curriculum_delete/'.$curriculum->id) }}" method="post">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-flat ink-reaction text-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </a>
                                    </li>
                                    <?php ++$curriculumSl ?>
                                @endforeach
                            @else
                                <li class="tile">
                                    <span class="small-padding"></span>
                                    <i class="fa fa-exclamation-triangle small-padding  text-danger"></i>
                                    <span class="text-bold">No Curriculum is created</span>
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
                            <header>Create Educational Curriculum</header>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/admin/education/curriculum_create') }}" method="post">
                                {{ csrf_field() }}
                                <div class="col-sm-8">
                                    <div class="form-group {{ $errors->has('CurriculumName') ? ' has-error' : '' }}">
                                        <input type="text" name="CurriculumName" class="form-control" id="CurriculumName">
                                        <label for="CurriculumName">Curriculum Name</label>
                                        @include('errors.formValidateError',['inputName' => 'CurriculumName'])
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-flat btn-primary ink-reaction">Create Curriculum</button>
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
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
                        <header class="text-bold "><i class="fa fa-info-circle"></i><span class="small-padding">TUTOR EDUCATIONAL LABEL</span></header>
                    </div>
                    <div class="card-body">
                        <ul class="list divider-full-bleed medium_item">
                            {{--check labels --}}
                            @if($labels->count() > 0)
                                <ul class="list display-block class_item">
                                    {{--label loop--}}
                                    <?php $labelSl = 0 ?>
                                    @foreach($labels as $label)
                                        <!-- label edit Modal -->
                                        <div class="modal fade" id="editLabel{{ $labelSl }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Edit label</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card-body">
                                                            <form action="{{ url('/admin/educational/label/'. $label->id .'/update') }}" method="post">
                                                                {{ csrf_field() }}
                                                                <div class="col-sm-8">
                                                                    <div class="form-group {{ $errors->has('labelName') ? 'has-error' : '' }}">
                                                                        <input type="text" name="labelName" class="form-control" value="{{ $label->label_name }}" id="labelName">
                                                                        <label for="labelName">Label Name</label>
                                                                        @include('errors.formValidateError',['inputName' => 'labelName'])
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <button type="submit" class="btn btn-flat btn-primary ink-reaction">Update Label</button>
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
                                                <div class="tile-text text-light">{{ $label->label_name }}</div>
                                            </a>
                                            <a class="btn btn-flat ink-reaction text-primary"  data-toggle="modal" data-target="#editLabel{{$labelSl}}">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="" class="btn btn-flat ink-reaction text-danger">
                                                <form action="{{ url('/admin/educational/label_delete/'.$label->id) }}" method="post">
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-flat ink-reaction text-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </a>
                                        </li>
                                        <?php ++$labelSl ?>

                                    @endforeach
                                </ul>
                            @else
                                <ul class="list display-block class_item">
                                    <li class="tile">
                                        <span class="small-padding"></span>
                                        <i class="fa fa-exclamation-triangle small-padding  text-danger"></i>
                                        <span class="text-bold">No Education Label is created</span>
                                    </li>
                                </ul>
                            @endif
                        </ul>
                    </div>
                </div>
            </article>

            <article id="create_tutoring_class">
                <div class="tutoring_info_create">
                    <div class="card style-default-bright">
                        <div class="card-head alert alert-callout card-head-xs">
                            <header>Create Educational Label</header>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/admin/educational/label_create') }}" method="post">
                                {{ csrf_field() }}
                                <div class="col-sm-8">
                                    <div class="form-group {{ $errors->has('labelName') ? 'has-error' : '' }}">
                                        <input type="text" name="labelName" class="form-control" id="labelName">
                                        <label for="labelName">Label Name</label>
                                        @include('errors.formValidateError',['inputName' => 'labelName'])
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-flat btn-primary ink-reaction">Create Label</button>
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
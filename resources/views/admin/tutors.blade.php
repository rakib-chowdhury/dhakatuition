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
    </style>
@endsection

@section('content')
    <section>
        <div class="section-body">
            @include('includes.flashMessage')
            <article id="tutoringInfo">
                <div class="card style-default-bright">
                    <div class="card-head card-head-sm  alert alert-callout card-head-xs no-margin">
                        <header class="text-bold "><i class="fa fa-user-secret"></i><span class="small-padding">All TUTORS</span></header>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable1" class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Role</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($tutors->count() > 0)
                                    <?php $sl = 0 ?>
                                    @foreach($tutors as $tutor)
                                        <tr class="{{ ( $tutor->status == 1 )? 'warning':'' }}">
                                            <td class="text-center">{{ ++$sl }}</td>
                                            <td>{{ $tutor->id }}</td>
                                            <td>{{ $tutor->first_name. ' ' . $tutor->last_name }}</td>
                                            <td>{{ $tutor->email }}</td>
                                            <td>{{ $tutor->status }}</td>
                                            <td>{{ ($tutor->role) ? 'Admin' : 'User' }}</td>
                                            <td>{{ $tutor->phone }}</td>
                                            <td>
                                                @if($tutor->status == 0)
                                                <form style="display: inline" action="{{ url('/admin/tutor/'.$tutor->id.'/block') }}" method="post">
                                                    {{ csrf_field() }}
                                                    <button class="btn btn-xs btn-danger">Block</button>
                                                </form>
                                                <a href="{{ url('/admin/tutor/'.$tutor->id.'/profile') }}" class="btn btn-xs btn-info">View</a>
                                                <form style="display: inline" action="{{ url('/admin/tutor/'.$tutor->id.'/front') }}" method="post">
                                                    {{ csrf_field() }}
                                                    <button class="btn btn-xs btn-info">Front</button>
                                                </form>
                                                @elseif($tutor->status == 1)
                                                    <form style="display: inline" action="{{ url('/admin/tutor/'.$tutor->id.'/unBlock') }}" method="post">
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-xs btn-danger">UnBlock</button>
                                                    </form>
                                                    <a href="{{ url('/admin/tutor/'.$tutor->id.'/profile') }}" class="btn btn-xs btn-info">View</a>
                                                    <form style="display: inline" action="{{ url('/admin/tutor/'.$tutor->id.'/front') }}" method="post">
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-xs btn-info">Front</button>
                                                    </form>
                                                @elseif($tutor->status == 2)
                                                    <form style="display: inline" action="{{ url('/admin/tutor/'.$tutor->id.'/block') }}" method="post">
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-xs btn-danger">Block</button>
                                                    </form>
                                                    <a href="{{ url('/admin/tutor/'.$tutor->id.'/profile') }}" class="btn btn-xs btn-info">View</a>
                                                    <form style="display: inline" action="{{ url('/admin/tutor/'.$tutor->id.'/redoFront') }}" method="post">
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-xs btn-info">Redo Front</button>
                                                    </form>
                                                @elseif($tutor->status == 3)
                                                    <form style="display: inline" action="{{ url('/admin/tutor/'.$tutor->id.'/block') }}" method="post">
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-xs btn-danger">Block</button>
                                                    </form>
                                                    <a href="{{ url('/admin/tutor/'.$tutor->id.'/profile') }}" class="btn btn-xs btn-info">View</a>
                                                    <form style="display: inline" action="{{ url('/admin/tutor/'.$tutor->id.'/front') }}" method="post">
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-xs btn-info">Front</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr class="gradeX">
                                        <td colspan="8">
                                            <span class="small-padding"></span>
                                            <i class="fa fa-exclamation-triangle small-padding  text-danger"></i>
                                            <span class="text-bold">No Tutor</span>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div><!--end .table-responsive -->
                    </div>
                </div>
            </article>

        </div>
    </section>
@endsection


@section('specifiedJs')

@endsection
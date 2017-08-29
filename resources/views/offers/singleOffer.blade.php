@extends('layouts.authApp')

@section('specifiedCss')
    <link rel="stylesheet" href="{{ asset('/css/select2.min.css') }}">
    <style>
        .filter_button{
            margin-top: -25px;
        }
        .select2-container--default .select2-selection--single{
            border: 0px solid transparent;
        }
        .select2-results__option{
            padding: 0 15px;
        }
        .select2-search--dropdown .select2-search__field {
            padding: 0 4px;
        }
    </style>
@endsection

@section('content')
    <section>
        @include('includes.flashMessage')
        <div class="card">
            <div class="card-body">
                @if($offer == null || empty($offer))
                    <h4>No Offer</h4>
                @else
                <h4 class="card alert alert-callout"><b>Title : </b>{{ $offer->title }}</h4>
                <div class=""><b>Medium :</b>
                    @if(!empty($offer->offerMedium))
                        @foreach($offer->offerMedium as $medium)
                            {{ $medium->medium['medium_category_name']. ' ' }},
                        @endforeach
                    @endif
                </div>
                <div class=""><b>Class :</b>
                    @if(!empty($offer->offerClass))
                        @foreach($offer->offerClass as $subject)
                            {{ $subject->classes['class_name']. ' ' }},
                        @endforeach
                    @endif
                </div>
                <div class=""><b>Subject :</b>
                    @if(!empty($offer->offerSubject))
                        @foreach($offer->offerSubject as $subject)
                            {{ $subject->subject['subject_name']. ' ' }},
                        @endforeach
                    @endif
                </div>

                <div class=""><b>Student :</b> {{ $offer->student_amount }}</div>
                <div class=""><b>Gender :</b> {{ $offer->gender }}</div>
                <div class=""><b>Salary :</b> {{ $offer->salary }}
                    @if($offer->negotiable == 1)
                        [ Negotiable ]
                    @endif
                </div>
                <div class=""><b>Days per Week :</b> {{ $offer->day_week }}</div>
                <div class=""><b>Requirements :</b> {{ $offer->requirement }}</div>
                <div class="row">
                <div class="location col-sm-6">
                    <h5 class="card alert alert-callout"><b>Location</b></h5>
                    <div class=""><b>Division : </b> {{ $offer->division }}</div>
                    <div class=""><b>District : </b> {{ $offer->district }}</div>
                    <div class=""><b>Location : </b> {{ $offer->location }}</div>
                    <div class=""><b>Specified : </b> {{ $offer->specified_location }}</div>
                </div>
                <div class="location col-sm-6">
                    <h5 class="card alert alert-callout"><b>Posted By </b></h5>
                    <div class=""><b>Name : </b> {{ $offer->first_name . ' ' . $offer->last_name }}</div>
                    <div class=""><b>Relation : </b> {{ $offer->relation }}</div>
                    <div class=""><b>Email : </b> {{ $offer->email }}</div>
                    <div class=""><b>Phone : </b> {{ $offer->phone }}</div>
                </div>
                </div><hr>
                <div class="appliedTutor">
                    @if($offer->tutor)
                        <div class="card alert alert-callout"><i class="fa fa-inbox"></i> Applied For This Offer :</div>
                        <?php $i = 0 ?>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>profile</th>
                                <th>Apply</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($offer->tutor as $apply)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $apply->user['first_name'].' '.$apply->user['last_name'] }}</td>
                                    <td>100%</td>
                                    <td>10</td>
                                    <td>free</td>
                                    <td>
                                        @if($apply->status == 1)
                                            <form action="{{ url('/admin/tutor/deselect/apply_id_'.$apply->id.'/for_offer_'.$offer->id) }}" method="post">
                                                {{ csrf_field() }}
                                                <button class="btn btn-primary btn-xs" type="submit">Deselect</button>
                                            </form>
                                        @else
                                            <form action="{{ url('/admin/tutor_'. $apply->user['id'] .'/select/apply_id_'.$apply->id.'/for_offer_'.$offer->id) }}" method="post">
                                                {{ csrf_field() }}
                                                <button class="btn btn-primary btn-xs" type="submit">Select</button>
                                            </form>
                                        @endif
                                        <a class="btn btn-info btn-xs" href="{{ url('/admin/tutor/'.$apply->user['id'].'/profile') }}">View</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class=" alert alert-callout alert-danger"><i class="fa fa-crosshairs"></i> No One Applied Yet:</div>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </section>
@endsection

@section('specifiedJs')
    <script>
        $(document).ready(function () {
        });
    </script>
@endsection
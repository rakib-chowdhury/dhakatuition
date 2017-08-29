@extends('layouts.authApp')

@section('specifiedCss')

@endsection

@section('content')
    <section>
        <div class="card">
            <div class="col-sm-6 small-padding">
                <div class="card alert alert-callout"><b>Offers Notification</b></div>
                <div id="offersNotification"></div>
            </div>
            <div class="col-sm-6 small-padding">
                <div class="card alert alert-callout"><b>Notification From Tutor</b></div>
                <div id="tutorNotification"></div>
            </div>
        </div>
    </section>
@endsection

@section('specifiedJs')
    <script type="text/javascript" src="{{ asset('/js/libs/moment/moment.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(window).load(function () {
                var display_offer_results = $("#offersNotification");
                var display_tutor_results = $("#tutorNotification");
                display_offer_results.html('loading');
                display_tutor_results.html('loading');
                var results = '';
                var results1 = '';

                // for tutor to admin notification
               $.get('/admin/admin_notification').done(function(data){
                   console.log(data.offer.data);
                   if (data.offer.data.length == 0) {
                       results += '<div class="single_notification">';
                       results += '<h4>No Offer Notification</h4>';
                       results += '</div>';
                   } else {
                       $.each(data.offer.data,function() {
                           results += '<div class="single_notification">';
                           results += '<a href="">';
                           results += '<h4>'+ this.offer.title + '</h4>';
                           results += '<p>At ' + moment(this.created_at).startOf().fromNow() + '</p>';
                           results += '</a>';
                           results += '</div>';
                       })
                   }
                   display_offer_results.html(results);

                   // for tutor to admin notification
                   if (data.tutor.data.length == 0) {
                       results1 += '<div class="single_notification">';
                       results1 += '<h4>No Offer Notification</h4>';
                       results1 += '</div>';
                   } else {
                       $.each(data.tutor.data,function() {
                           results1 += '<div class="single_notification">';
                           results1 += '<a href="">';
                           results1 += '<h4> In '+ this.offer.title + '</h4>';
                           results1 += '<p> <span>Applied</span> ' + this.user.first_name + ' ' + this.user.last_name + '<span> At '+ moment(this.created_at).startOf().fromNow() +'</span></p>';
                           results1 += '</a>';
                           results1 += '</div>';
                       })
                   }
                   display_tutor_results.html(results1);
               }).fail(function () {
                  alert('server error');
               });
            })
        });
    </script>
@endsection

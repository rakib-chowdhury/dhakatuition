$(document).ready( function () {
    $(window).load(function() {
        var display_results = $("#offers");
        display_results.html("loading...");
        var results = '';
        $.get('/offers_json').done(function( data ) {
            if (data.length == 0) {
                results += '<div class="card style-default-bright">';
                results += '<div class="card-body">';
                results += 'No offers';
                results +='</div>';
                results +='</div>';
            } else {
                console.log(data);
                $.each(data, function() {
                    results += '<div class="card style-default-bright">';
                    results += '<div class="card-body">';
                    // offer title
                    results +='<h3 class="text-light small-padding">'+ this.title +' <span class="small small-padding no-y-padding">ID -- [ '+ this.id +' ]</span></h3>';
                    results +='<div class="row">';
                    //medium
                    results +='<div class="col-xs-3 text-left">';
                    results += '<i class="fa fa-sliders text-primary small-padding"></i>';
                    results +='<span class="text-bold">Medium :</span>';
                    $.each(this.offer_medium, function() {
                        results += '<span class="text-light"> ' + this.medium.medium_category_name + ' </span>';
                    });
                    results +='</div>'; // medium
                    // classes
                    results +='<div class="col-xs-3 text-left">';
                    results += '<i class="fa fa-cloud text-primary small-padding"></i>';
                    results +='<span class="text-bold">Class :</span>';
                    $.each(this.offer_class, function() {
                        results += '<span class="text-light"> ' + this.classes.class_name + ' </span>';
                    });
                    results +='</div>'; // classes
                    // subjects
                    results +='<div class="col-xs-3 text-left">';
                    results += '<i class="fa fa-book text-primary small-padding"></i>';
                    results +='<span class="text-bold">Subject :</span>';
                    $.each(this.offer_subject, function() {
                        results += '<span class="text-light"> ' + this.subject.subject_name + ' </span>';
                    });
                    results +='</div>'; // subjects
                    // student amounts
                    results +='<div class="col-xs-3 text-left">';
                    results +='<i class="fa fa-user-secret text-primary small-padding"></i>';
                    results +='<span class="text-bold">Students :</span>';
                    results +='<span class="text-light">' + this.student_amount + '</span>';
                    results +='</div>'; //students amount
                    // location
                    results +='<div class="col-xs-3 text-left">';
                    results +='<i class="fa fa-map-marker text-primary small-padding"></i>';
                    results +='<span class="text-bold">Location :</span>';
                    results +='<span class="text-light">' + this.location + '</span>';
                    results +='</div>'; //location
                    // gender
                    results +='<div class="col-xs-3 text-left">';
                    results +='<i class="fa fa-genderless text-primary small-padding"></i>';
                    results +='<span class="text-bold">Tutor preference Gender :</span>';
                    results +='<span class="text-light"> ' + this.gender + '</span>';
                    results +='</div>'; //gender
                    // salary
                    results +='<div class="col-xs-3 text-left">';
                    results +='<i class="fa fa-money text-primary small-padding"></i>';
                    results +='<span class="text-bold">Salary :</span>';
                    results +='<span class="text-light"> ' + this.salary + '</span>';
                    results +='</div>'; //salary
                    // days per week
                    results +='<div class="col-xs-3 text-left">';
                    results +='<i class="fa fa-fighter-jet text-primary small-padding"></i>';
                    results +='<span class="text-bold">Days Per Week :</span>';
                    results +='<span class="text-light"> ' + this.day_week + '</span>';
                    results +='</div>'; //days per week
                    results +='</div>'; // row
                    // requirements
                    results +='<div class="small-padding">';
                    results +='<span class="text-bold">Other Requirements :</span>';
                    results +=this.requirement;
                    results +='</div>'; // requirements
                    results +='<div class="">';
                    results +='<div class="col-sm-10 row">';
                    if (this.status == 0){
                        // results +='<form class="col-xs-5" id="publish" action="" method="post">';
                        // results +='<div class="form-group">';
                        // results +='<button type="submit" class="btn btn-primary">';
                        // results +='<span class="pull-left"><i class="fa fa-check"></i></span>';
                        // results +='<span style="padding: 15px">Publish</span>';
                        // results +='</button>';
                        // results +='</div>';
                        // results +='</form>';
                        results +='<a href="/admin/offer/' +this.id + '/publish"  class="btn btn-primary">';
                        results +='<span class="pull-left"><i class="fa fa-check"></i></span>';
                        results +='<span style="padding: 15px">Publish</span>';
                        results +='</a>';
                    } else {
                        // results +='<form class="col-xs-5" action="/admin/offer/' +this.id + '/block" method="post">';
                        // results +='<div class="form-group">';
                        // results +='<button type="submit" class="btn btn-danger">';
                        // results +='<span class="pull-left"><i class="fa fa-crosshairs"></i></span>';
                        // results +='<span style="padding: 15px">Block</span>';
                        // results +='</button>';
                        // results +='</div>';
                        // results +='</form>';
                        results +='<a href="/admin/offer/' +this.id + '/block"  class="btn btn-danger">';
                        results +='<span class="pull-left"><i class="fa fa-check"></i></span>';
                        results +='<span style="padding: 15px">Block</span>';
                        results +='</a>';

                    }
                    results +='<div class="col-xs-5">';
                    results +='<a href="/admin/offer/' +this.id + '/view" class="btn btn-info">';
                    results +='<span class="pull-left"><i class="fa fa-eye-slash"></i></span>';
                    results +='<span style="padding: 15px">View</span>';
                    results +='</a>';
                    results +='</div>';
                    results +='</div>';
                    results +='<div class="col-sm-2">';
                    results +='<div class="btn-group text-right pull-right">';
                    results +='<button type="button" class="btn btn-flat dropdown-toggle" data-toggle="dropdown">';
                    results +='<i class="fa fa-ellipsis-v"></i>';
                    results +='</button>';
                    results +='<ul class="dropdown-menu animation-expand" role="menu">';
                    results +='<li><span class="small-padding no-y-padding text-primary text-light">Share At</span></li>';
                    results +='<li><a href="#"><i class="fa fa-facebook"></i> Facebook</a></li>';
                    results +='<li><a href="#"><i class="fa fa-google-plus"> Gooogle Plus</i></a></li>';
                    results +='<li><a href="#"><i class="fa fa-twitter"></i> Twitter</a></li>';
                    results +='</ul>';
                    results +='</div>';
                    results +='</div>';
                    results +='</div>';
                    results +='</div>'; // card body
                    results +='</div>'; // card
                });
            }
            display_results.html(results);

        }).fail(function() {
            alert( "error" );
        });
    });
});
$(document).ready(function () {


    $('.educational').click(function () {
        var display_results = $("#educationalInfo");
        display_results.html("loading...");
        var results = '';
        $.get('/tutor/profile/education_info').done(function( data ) {
            console.log(data);
            if (!$.trim(data)) {
                results += 'No  Info data';
            } else {
                $.each(data, function () {
                    results += '<div class="card">';
                    results += '<div class="card-head">';
                    results += '<header><h4><i class="fa fa-graduation-cap"></i><span class="small-padding">' + this.label + '</span></h4></header>';
                    results += '<div class="tools">';
                    results += '<div class="btn-group">';
                    results += '<a class="btn btn-icon-toggle btn-refresh text-info"><i class="fa fa-pencil"></i></a>';
                    results += '<a class="btn btn-icon-toggle btn-close text-danger"><i class="fa fa-trash"></i></a>';
                    results += '<a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>';
                    results += '</div>';
                    results += '</div>';
                    results += '</div>';
                    results += '<div class="card-body">';
                    results += '<div class="">';
                    results += '<b>Exam Title: </b>'+ this.exam_title +'with - ' + this.major;
                    results += '</div>';
                    results += '<div class="">';
                    results += '<b>From : </b>'+ this.from + ' To: ' + this.until;
                    results += '</div>';
                    results += '<div class="">';
                    results += '<b>Institute : </b>'+ this.institute + ' CGPA: ' + this.cGpa;
                    results += '</div>';
                    if(this.id_card !== null){
                        results += '<div class="">';
                        results += '<b>Id Number : </b>'+ this.id_card;
                        results += '</div>';
                    }
                    results += '<div class="">';
                    results += '<b>Passing Year : </b>'+ this.passed;
                    results += '</div>';
                    results += '<div class="">';
                    results += '<b>Passing Year : </b>'+ this.curriculum;
                    results += '</div>';
                    results += '</div>';
                    results += '</div>';
                });
            }
            display_results.html(results);
        }).fail(function() {
            console.log( "error" );
        });
    });
});
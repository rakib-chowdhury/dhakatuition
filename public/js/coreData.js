/**
 * Created by azim on 2/11/17.
 */

$(window).load(function () {
    var showId = $('#medium');
    showId.html('loading');
    var result = '';
    $.get('/mediums').done(function (data) {
//                console.log(data);
        result +='<option value="">Select Medium</option>';
        if (!$.trim(data)) {
            result = 'No  Info data';
        } else {
            $.each(data, function () {
                result +='<option value="'+ this.id +'">' + this.medium_category_name +'</option>';
            });
        }
        showId.html(result);
    }).fail(function () {
        alert('server error');
    })
});
$(window).load(function () {
    var showId = $('#classes');
    showId.html('loading');
    var result = '';
    $.get('/classes').done(function (data) {
//                console.log(data);
        result +='<option value="">Select Classes</option>';
        if (!$.trim(data)) {
            result = 'No  Info data';
        } else {
            $.each(data, function () {
                result +='<option value="'+ this.id +'">' + this.class_name +'</option>';
            });
        }
        showId.html(result);
    }).fail(function () {
        alert('server error');
    })
});
$(window).load(function () {
    var showId = $('#subject');
    showId.html('loading');
    var result = '';
    $.get('/subject').done(function (data) {
//                console.log(data);
        result +='<option value="">Select Subject</option>';
        if (!$.trim(data)) {
            result = 'No  Info data';
        } else {
            $.each(data, function () {
                result +='<option value="'+ this.id +'">' + this.subject_name +'</option>';
            });
        }
        showId.html(result);
    }).fail(function () {
        alert('server error');
    })
});
$(window).load(function () {
    var showId = $('#location');
    showId.html('loading');
    var result = '';
    $.get('/location').done(function (data) {
//                console.log(data);
        result +='<option value="">Select Location</option>';
        if (!$.trim(data)) {
            result = 'No  Info data';
        } else {
            $.each(data, function () {
                result +='<option value="'+ this.id +'">' + this.name +'</option>';
            });
        }
        showId.html(result);
    }).fail(function () {
        alert('server error');
    })
});
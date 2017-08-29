$(document).ready(function () {
    /*
     *  update medium
     */
    $(window).load(function() {
        var display_results = $("#medium");
        display_results.html("<option>loading...</option>");
        var results = '';
        $.get('/medium_update').done(function( data ) {
            console.log(data);
            if (data.length == 0) {
                results += '<option value="">No Medium</option>';
            } else {
                $.each(data, function() {
                    results += '<option value="'+ this.id +'">'+ this.medium_category_name +'</option>';
                });
            }
            display_results.html(results);

        }).fail(function() {
            alert( "error" );
        });
    });
    /*
     *  update class select by medium
     */
    $("#medium").on("select2:select select2:unselect", function () {
        var items= $(this).val();
        var display_results = $("#classDisplay");
        display_results.html("<option>loading...</option>");
        var results = '';
        $.get('/class_update/by_medium',{
            mediumId : items
        }).done(function( data ) {
//                    console.log(data);
            if (data.length == 0) {
                results += '<option>No Class</option>';
            } else {
                for(var i=0;i<data.length;i++){
                    $.each(data[i], function() {
                        console.log(data);
                        results += '<option value="'+ this.id +'">'+ this.class_name +'</option>';
                    });
                }
            }
            display_results.html(results);

        }).fail(function() {
            alert( "error" );
        });
    });
    /*
     *  update subject select by class
     */
    $("#classDisplay").on("select2:select select2:unselect", function () {
        var items= $(this).val();
        var display_results = $("#subjectDisplay");
        display_results.html("<option>loading...</option>");
        var results = '';
        $.get('/subject_update/by_class',{
            classId : items
        }).done(function( data ) {
            console.log(data);
            if (data.length == 0) {
                results += '<option>No Subject</option>';
            } else {
                for(var i=0;i<data.length;i++){
                    $.each(data[i], function() {
                        results += '<option value="'+ this.id +'">'+ this.subject_name +'</option>';
                    });
                }
            }
            display_results.html(results);

        }).fail(function() {
            alert( "error" );
        });
    });
    /*
     *  update Division
     */
    $(window).load(function() {
        var display_results = $("#division");
        display_results.html("<option>loading...</option>");
        var results = '';
        $.get('/division_update').done(function( data ) {
            console.log(data);
            if (data.length == 0) {
                results += '<option value="">No Division</option>';
            } else {
                results += '<option value="">select Division</option>';
                $.each(data, function() {
                    results += '<option value="'+ this.id +'">'+ this.name +'</option>';
                });
            }
            display_results.html(results);

        }).fail(function() {
            alert( "error" );
        });
    });
    /*
     *  update district select by division
     */
    $('#division').click(function(e) {
        e.preventDefault();
        var id = $(this).val();
        var display_results = $("#district");
        display_results.html("<option value=''>loadingggg</option>");
        var results  = '';
        $.get('/district_update/by_division/'+id,function(data) {
            if (data.length == 0) {
                results += '<option value="">no district</option>';
            } else {
                results += '<option value="">select district</option>';
                $.each(data, function() {
                    results += '<option value="'+ this.id +'">'+ this.name +'</option>';
                });
            }
            display_results.html(results);
        });
    });

    /*
     *  update location select by district
     */
    $('#district').click(function(e) {
        e.preventDefault();
        var id = $(this).val();
        var display_results = $(".location");
        display_results.html("<option value=''>loading...</option>");
        var results  = '';
        $.get('/location_update/by_district/'+id,function(data) {
            if (data.length == 0) {
                results += '<option value="">no location</option>';
            } else {
                results += '<option value="">select location</option>';
                $.each(data, function() {
                    results += '<option value="'+ this.id +'">'+ this.name +'</option>';
                });
            }
            display_results.html(results);
        });
    });
});
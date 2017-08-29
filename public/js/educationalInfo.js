$(document).ready( function () {
    $(window).load(function() {
        var display_results = $('#label');
        display_results.html("<option value=''>loading...</option>");
        var results  = '';
        results += '<option value="">select Label</option>';
        $.get('/labels' ,function(data) {
            if (data.length == 0) {
                results += '<option value="">no Labels</option>';
            } else {
                $.each(data, function() {
                    results += '<option data-id="'+this.id+'" value="'+ this.label_name +'">'+ this.label_name +'</option>';
                });
            }
            display_results.html(results);
        });
    });
    $('#label').change(function() {
        // get all major with label id
        var labelId = $(this).find(':selected').data('id');

        alert(labelId);
        if (labelId === null) {
            alert('first select education label');
            return;
        }
        var display_results = $('#major');
        display_results.html("<option value=''>loading...</option>");
        var results  = '';
        $.get('/majors/' + labelId ,function(data) {
            console.log(data);
            if (data.length == 0) {
                results += '<option value="">no Major</option>';
            } else {
                $.each(data, function() {
                    results += '<option value="'+ this.group_name +'">'+ this.group_name +'</option>';
                });
            }
            display_results.html(results);
        });

        // get education curriculum
        var curriculum_results = $('#curriculum');
        curriculum_results.html("<option value=''>loading...</option>");
        var curriculum  = '';
        $.get('/curriculum' ,function(data) {
            if (data.length == 0) {
                curriculum += '<option value="">no Curriculum</option>';
            } else {
                $.each(data, function() {
                    curriculum += '<option value="'+ this.curriculum_name +'">'+ this.curriculum_name +'</option>';
                });
            }
            curriculum_results.html(curriculum);
        });
    });
});
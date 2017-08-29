$(document).ready(function () {
    // for info data load
    var medium = [];
    $(window).load(function() {
        // $.get('/medium_update').done(function( data ) {
        //     console.log(data);
        //     if (data.length == 0) {
        //         medium += 'No Medium';
        //     } else {
        //         var i = 0;
        //         $.each(data, function() {
        //             $('#medium').append($('<option>', {
        //                 value: this.id,
        //                 text : this.medium_category_name
        //             }));
        //             medium[i++]  = {id:this.id, text:this.medium_category_name};
        //         });
        //     }
        //
        // }).fail(function() {
        //     alert( "error" );
        // });


        $.get('/tutor/profile/basic_info').done(function( data ) {
            console.log(data);
            if (!$.trim(data)) {
                results += 'No basic Info data';
            } else {
                var $element = $('#medium').select2({tags: true});
                // var i = 0;
                $.each(data.tutor_medium, function() {
                    var option = new Option(this.medium.medium_category_name, this.medium.id, true, true);
                    $element.append(option);
                });
                $element.trigger('change');
                // class
                var $element = $('#classDisplay').select2();
                $.each(data.tutor_class, function() {
                    var option = new Option(this.info_class.class_name, this.info_class.id, true, true);
                    $element.append(option);
                });
                $element.trigger('change');
                // subjects
                var $element = $('#subjectDisplay').select2();
                $.each(data.tutor_subject, function() {
                    var option = new Option(this.subject.subject_name, this.subject.id, true, true);
                    $element.append(option);
                });
                $element.trigger('change');
                // country
                $('#country').val(data.country);
                $('#division').val(data.district.name);
                $('#district').val(data.division.name);
                $('#location').val(data.location.name);
                // preferred location
                var $element = $('#preferredLocation').select2();
                $.each(data.preferred_location, function () {
                    var option = new Option(this.location.name, this.location.id, true, true);
                    $element.append(option);
                });
                $element.trigger('change');
                // tutoring days
                var $element = $('#tutoringDay').select2();
                $.each(data.tutoring_days, function () {
                    var option = new Option(this.days, this.id, true, true);
                    $element.append(option);
                });
                $element.trigger('change');
                // available from
                $('#availableFrom').val(data.available_from);
                $('#availableTo').val(data.available_to);
                $('#contactNo').val(data.tutoring_contact_no);
                // experience
                if (data.experience === 1){
                    $('#experienceCheckBox').prop('checked', true);
                } else {
                    $('#noExperience').prop('checked', true);
                }
                if (data.experience !== null)
                {
                    // $('#contactNo').val(data.tutoring_contact_no);
                }
                if (data.group_tutoring ===1) {
                    $('#groupTutoring').prop('checked', true);
                }
                if (data.personal_tutoring ===1) {
                    $('#personalTutoring').prop('checked', true);
                }
                if (data.student_home ===1) {
                    $('#studentHome').prop('checked', true);
                }
                if (data.tutor_home ===1) {
                    $('#yourHome').prop('checked', true);
                }
                if (data.online_home ===1) {
                    $('#online').prop('checked', true);
                    data.online_tutoring_info;
                }

                // salary
                $('#salary').val(data.salary);
                if (data.salary_negotiable ===1) {
                    $('#yourHome').prop('checked', true);
                }
            }

        }).fail(function() {
            alert( "internal server error" );
        });
    });

    // multiselect info data delete
    $(window).load(function () {
        $('#medium').on("select2:unselecting", function(e){
            console.log(e.params.args.data);

            $.post('/tutor/medium/delete/' + e.params.args.data.id).done(function (data) {
                alert('Are you Really Permanently  Delete this');
                console.log(data);
            }).fail(function () {
                alert('server error');
            })
        });
        $('#classDisplay').on("select2:unselecting", function(e){
            console.log(e.params.args.data);
        });
        $('#subjectDisplay').on("select2:unselecting", function(e){
            console.log(e.params.args.data);
        });
        $('#preferredLocation').on("select2:unselecting", function(e){
            console.log(e.params.args.data);
        });
        $('#tutoringDay').on("select2:unselecting", function(e){
            console.log(e.params.args.data);
        });
    });
});

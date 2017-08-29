
$(document).ready(function () {
    $('.personalInfo').click(function () {
        $.get('/tutor/profile/personal_info').done(function( data ) {
            console.log(data);
            if (data.gender === 'male'){
                $('#male').prop('checked', true)
            } else {
                $('#female').prop('checked', true)
            }
            if (data.marital_status === 'single'){
                $('#single').prop('checked', true)
            } else {
                $('#married').prop('checked', true)
            }

            // location
            $('#tutorCountry').val(data.country);
            $('#tutorDivision').val(data.division);
            $('#tutorDistrict').val(data.district);
            $('#tutorLocation').val(data.upazila);
            $('#zipCode').val(data.zip_code);
            $('#locationInfo').val(data.location);
            $('#identityCardType').val(data.id_card_type);
            $('#identityId').val(data.id_card_number);
            $('#fbId').val(data.fb_link);
            $('#linkdinId').val(data.linkdin_link);
            $('#fatherName').val(data.father_name);
            $('#fatherContact').val(data.father_phone);
            $('#MotherName').val(data.mother_name);
            $('#MotherContact').val(data.mother_phone);
            $('#relativeName').val(data.emergency_contact_name);
            $('#relation').val(data.emergency_contact_relation);
            $('#relativeContact').val(data.emergency_contact_phone);
        }).fail(function() {
            console.log( "error" );
        });
    });
});
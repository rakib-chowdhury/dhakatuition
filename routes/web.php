<?php
Auth::routes();
Route::post('/app_login','Auth\LoginController@postLogin');
/*
|--------------------------------------------------------------------------
| Anemones Routes
|--------------------------------------------------------------------------
*/
Route::group([],function () {
    Route::get('/', function () { return view('welcome'); });
    Route::get('/#contact', function () { return view('welcome'); });
    // Activate user From confirmation email
    Route::get('/confirm/{token}', 'ActivationController@activateUser');
    // select update in tutoring info
    Route::get('/medium_update', 'AdminController\Info\TutorMediumController@mediumUpdate' );
    Route::get('/class_update/by_medium', 'AdminController\Info\TutorClassController@classUpdate' );
    Route::get('/subject_update/by_class', 'AdminController\Info\TutorSubjectController@subjectUpdate' );
    // select update in tutoring location
    Route::get('/division_update', 'AdminController\location\TutoringDivisionController@divisionUpdate');
    Route::get('/district_update/by_division/{divisionId}', 'AdminController\location\TutoringDistrictController@districtUpdate');
    Route::get('/location_update/by_district/{divisionId}', 'AdminController\location\TutoringLocationController@locationUpdate');
    // offers Routes
    Route::get('/offer_post', function () { return view('offers.postOffer'); });
    Route::post('/offers_store', 'Offers\TutoringController@store');
    Route::get('/offers', 'Offers\OfferViewController@publicView');
    Route::get('/offers_json', 'Offers\OfferViewController@offers');
    Route::get('/offer/filer', 'Offers\OfferViewController@filter');
//    /offer/filer?location={location}+medium={medium}+class={classes}+subject={subject}+gender={gender}

    // educational Routes
    Route::get('/labels', 'AdminController\Educational\LabelController@allLabel');
    Route::get('/majors/{labelId}', 'AdminController\Educational\MajorGroupController@getMajor');
    Route::get('/curriculum', 'AdminController\Educational\CurriculumController@allCurriculum');
    Route::get('/medium/by_{id}', 'AdminController\Info\TutorMediumController@getName' );
    Route::get('/classes/by_{id}', 'AdminController\Info\TutorClassController@getName' );
    Route::get('/subject/by_{id}', 'AdminController\Info\TutorSubjectController@getName' );

    // tutors
    Route::get('/tutors', function () { return view('tutor.public'); });
    Route::get('/tutors_json', 'TutorController\ProfileViewController@getInfoForPublic');
    Route::get('/tutors_filter', 'TutorController\ProfileViewController@getFilterData');
    // for tutor filter input data
    Route::get('mediums','TutorController\ProfileViewController@getMedium');
    Route::get('classes','TutorController\ProfileViewController@getClass');
    Route::get('subject','TutorController\ProfileViewController@getSubject');
    Route::get('location','TutorController\ProfileViewController@getLocation');
    // about
    Route::get('/about', function () { return view('tutor.public'); });
    // contact mail send
    Route::get('/send_contact_mail', 'ContactMailSendController@sendContactMail');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin','middleware' => ['auth','admin'] ], function ()
{
    Route::get('/panel', 'AdminController\AdminPanelController@panel' );
    /* -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
     *  Info Routers
     * -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
    // tutor medium
    Route::get('/info', 'AdminController\Info\TutorMediumController@index' );
    Route::post('/medium_create', 'AdminController\Info\TutorMediumController@create' );
    Route::post('/medium/{id}/update', 'AdminController\Info\TutorMediumController@update' );
    Route::post('/medium_delete/{mediumId}', 'AdminController\Info\TutorMediumController@destroy' );
    // tutor class
    Route::post('/class_create', 'AdminController\Info\TutorClassController@create' );
    Route::post('/class/{id}/update', 'AdminController\Info\TutorClassController@update' );
    Route::post('/class_delete/{classId}', 'AdminController\Info\TutorClassController@destroy' );
    // tutor subject
    Route::post('/subject_create', 'AdminController\Info\TutorSubjectController@create');
    Route::post('/subject/{id}/update', 'AdminController\Info\TutorSubjectController@update');
    Route::post('/subject_delete/{subjectId}', 'AdminController\Info\TutorSubjectController@destroy');

    /* -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
     *  Location Routers
     * -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
    // tutor tutoring location
    Route::get('/location', 'AdminController\location\TutoringDivisionController@index');
    // tutoring division
    Route::Post('/location/division_create', 'AdminController\location\TutoringDivisionController@store');
    Route::Post('/location/division/{id}/update', 'AdminController\location\TutoringDivisionController@update');
    Route::Post('/location/division_delete/{id}', 'AdminController\location\TutoringDivisionController@destroy');
    // tutoring district
    Route::Post('/location/district_create', 'AdminController\location\TutoringDistrictController@store');
    Route::Post('/location/district/{id}/update', 'AdminController\location\TutoringDistrictController@update');
    Route::Post('/location/district_delete/{id}', 'AdminController\location\TutoringDistrictController@destroy');
    // tutoring location
    Route::Post('/location/location_create', 'AdminController\location\TutoringLocationController@store');
    Route::Post('/location/location/{id}/update', 'AdminController\location\TutoringLocationController@update');
    Route::Post('/location/location_delete/{id}', 'AdminController\location\TutoringLocationController@destroy');

    /* -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
     *  Educational Routers
     * -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
    // label Router
    Route::get('/education/label', 'AdminController\Educational\LabelController@index');
    Route::post('/educational/label_create', 'AdminController\Educational\LabelController@store');
    Route::post('/educational/label/{id}/update', 'AdminController\Educational\LabelController@update');
    Route::post('/educational/label_delete/{id}', 'AdminController\Educational\LabelController@destroy');
    // Major Group Router
    Route::get('/education/major', 'AdminController\Educational\MajorGroupController@index');
    Route::post('/education/major_create', 'AdminController\Educational\MajorGroupController@store');
    Route::post('/education/major/{id}/update', 'AdminController\Educational\MajorGroupController@update');
    Route::post('/education/major_delete/{id}', 'AdminController\Educational\MajorGroupController@destroy');
    // Curriculum Router
    Route::get('/education/curriculum', 'AdminController\Educational\CurriculumController@index');
    Route::post('/education/curriculum_create', 'AdminController\Educational\CurriculumController@store');
    Route::post('/education/curriculum/{id}/update', 'AdminController\Educational\CurriculumController@update');
    Route::post('/education/curriculum_delete/{id}', 'AdminController\Educational\CurriculumController@destroy');

    /* -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
     *  Offers Routers
     * -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
    Route::get('/offers', function () { return view('offers.adminJobs'); });
    Route::get('/offer/{offerId}/view', 'Offers\OffersApplyController@show');
    Route::get('/offer/{offerId}/publish', 'Offers\OffersApplyController@publish');
    Route::get('/offer/{offerId}/block', 'Offers\OffersApplyController@block');
    Route::post('/tutor_{userId}/select/apply_id_{applyId}/for_offer_{offerId}', 'Offers\OffersApplyController@selectTutor');
    Route::post('/tutor/deselect/apply_id_{applyId}/for_offer_{offerId}', 'Offers\OffersApplyController@deSelectTutor');

    /* -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
     *  Tutor Routers
     * -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
    Route::get('/tutors', 'AdminController\TutorsController@index');
    Route::post('/tutor/{id}/block', 'AdminController\TutorsController@block');
    Route::post('/tutor/{id}/unBlock', 'AdminController\TutorsController@unBlock');
    Route::post('/tutor/{id}/front', 'AdminController\TutorsController@front');
    Route::post('/tutor/{id}/redoFront', 'AdminController\TutorsController@redoFront');
    Route::get('/tutor/{id}/profile', 'TutorController\ProfileViewController@showAdmin' );
    Route::get('/tutor/{id}/profile/basic_info', 'TutorController\ProfileViewController@basicInfoAdmin' );
    Route::get('/tutor/{id}/profile/education_info', 'TutorController\EducationalInfoController@getEducationAllAdmin' );
    Route::get('/tutor/{id}/profile/personal_info', 'TutorController\PersonalInfoController@getPersonalInfoAdmin' );
    Route::get('/tutor/{id}/profile/over_view', 'TutorController\OverViewController@getOverviewAdmin' );

    /*---------------------------------------------------------------------
     * Notification Routes
     * --------------------------------------------------------------------*/
    Route::get('/notification','Notification\NotificationController@index');
    Route::get('/admin_notification','Notification\NotificationController@AdminNotification');
    /*---------------------------------------------------------------------
    * About Us Routes by rakib
    * --------------------------------------------------------------------*/
    Route::get('/about','AdminController\AboutController@index');
    Route::post('/about/details','AdminController\AboutController@store');
});
/*
|--------------------------------------------------------------------------
| tutor Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'tutor','middleware' => ['auth'] ], function ()
{
    Route::get('/panel', 'AdminController\AdminPanelController@tutorPanel' );

    /* -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
     *  profile Routers
     * -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
    Route::get('/profile_create', 'TutorController\ProfileViewController@create' );
    // basic info
    Route::post('/profile/basic_info/store', 'TutorController\TutoringInfoController@store' );
    Route::get('/profile', 'TutorController\ProfileViewController@index' );
    Route::get('/profile/basic_info', 'TutorController\ProfileViewController@basicInfo' );
    Route::get('/profile/update/basic_info', 'TutorController\ProfileEditController@update' );
   // education info
    Route::post('/profile/education_info/store', 'TutorController\EducationalInfoController@store' );
    Route::get('/profile/education_info', 'TutorController\EducationalInfoController@getEducationAll' );
    Route::get('/profile/education/{educationId}', 'TutorController\EducationalInfoController@show' );
    // personal info
    Route::post('/profile/personal_info/store', 'TutorController\PersonalInfoController@store' );
    Route::post('/profile/personal_info/update', 'TutorController\PersonalInfoController@update' );
    Route::get('/profile/personal_info', 'TutorController\PersonalInfoController@getPersonalInfo' );
    // overview info
    Route::post('/profile/over_view/store', 'TutorController\OverViewController@store' );
    Route::post('/profile/over_view/update', 'TutorController\OverViewController@update' );
    Route::get('/profile/over_view', 'TutorController\OverViewController@getOverview' );
    // profile edit
    Route::get('/profile/edit', function () { return view('tutor.profile.edit.editProfile'); });
    Route::post('/profile/update/basic_info','TutorController\ProfileEditController@update');
    Route::post('/medium/delete/{id}','TutorController\ProfileEditController@mediumDelete');
    /* -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
     *  Offers Routers
     * -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
    Route::get('/offers', 'Offers\OfferViewController@index');
    Route::get('/offer/{id}/applied', 'Offers\OffersApplyController@apply');
    // settings route
    Route::get('/settings', 'SettingsController@show');
    // status
    Route::get('/status',function () { return view('setting.status'); });
    // notification
    Route::get('/notification', 'Notification\NotificationController@tutorNotificationView');
    Route::get('/tutor_notification', 'Notification\NotificationController@tutorNotificaiton');
});

Route::group(['middleware' => ['auth']], function () {
    // bar notification
    Route::get('/offer/bar_notification','NotificationController@Offer');
    Route::get('/bar_notification','NotificationController@academic');
    // drop notification
    Route::get('/offer/drop_notification','NotificationController@offerDown');
    Route::get('/drop_notification','NotificationController@academicDown');
    Route::post('/reset_password','SettingsController@passwordUpdate');
});


Route::get('/About_us','AdminController\AboutController@show');
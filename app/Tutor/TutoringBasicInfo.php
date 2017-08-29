<?php

namespace App\Tutor;

use Illuminate\Database\Eloquent\Model;

class TutoringBasicInfo extends Model
{
    protected $id = 'id';

    protected $table = 'tutoring_basic_info';

    protected $fillable = [
        'user_id','tutoring_contact_no',
        'student_home','tutor_home','online_home',
        'country','division','district','location',
        'available_from','available_to', 'experience',
        'salary','salary_negotiable',
        'personal_tutoring','group_tutoring'
    ];

    public function user()
    {
        return $this->belongsTo('App\User')->select('id','first_name','last_name');
    }

    public function tutorMedium()
    {
        return $this->hasMany('App\Tutor\TutoringMedium');
    }

    public function tutorClass()
    {
        return $this->hasMany('App\Tutor\TutoringClasses');
    }

    public function tutorSubject()
    {
        return $this->hasMany('App\Tutor\TutoringSubjects');
    }

    public function preferredLocation()
    {
        return $this->hasMany('App\Tutor\TutoringLocation');
    }

    public function tutoringDays()
    {
        return $this->hasMany('App\Tutor\TutoringDays');
    }

    public function onlineTutoringInfo()
    {
        return $this->hasOne('App\Tutor\TutoringOnlineInfo');
    }

    public function experience()
    {
        return $this->hasOne('App\Tutor\TutoringExperience');
    }

    public function division()
    {
        return $this->belongsTo('App\Admin\Locations\TutoringDivisions','division','id');
    }

    public function district()
    {
        return $this->belongsTo('App\Admin\Locations\TutoringDistricts','district','id');
    }

    public function location()
    {
        return $this->belongsTo('App\Admin\Locations\TutoringLocation','location','id');
    }
}
